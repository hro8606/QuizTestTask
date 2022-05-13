// @todo disable question buttons after first click
import { useGlobalContext } from "./context";
import Form from "./Components/Form";
import Loading from "./Components/Loading";
import Modal from "./Components/Modal";
import ReactCountdownClock from 'react-countdown-clock';

const App = () => {
  const {
    waiting,
    loading,
    index,
    questions,
    nextQuestion,
    quiz,
    checkAnswer,
    selectAnswer,
    selectedAnswer,
    submitLastStep,
    changeQuizMode,
    isTheLastStep
  } = useGlobalContext();

  if (waiting) {
    return <Form />;
  }
  if (loading) {
    return <Loading />;
  }

  const { incorrect_answers, correct_answer, question } = questions[index];
  const answers = [...incorrect_answers];
  answers.push(correct_answer)
  const isCorrectAnswer = selectedAnswer === correct_answer;
  const answerStyle = isCorrectAnswer ? 'text-green-600' : 'text-red-600';

  return (
      <>
        <select
            id="quizMode"
            name="quizMode"
            className="bg-gray-200 p-2 rounded-md outline-0 focus:bg-gray-300"
            value={quiz.quizMode}
            onChange={changeQuizMode}
        >
          <option value="multiple">Multiple choice</option>
          <option value="boolean">Binary (Yes/No)</option>
        </select>
        <div className=" p-28 flex items-center justify-center box-back">
          <ReactCountdownClock
              seconds={300}
              color="#3b82f6"
              alpha={0.9}
              size={100}
              onComplete={submitLastStep}
              paused={isTheLastStep}
          />
        </div>
      <main className=" pb-60 flex items-center justify-center box-back">
        <Modal />
        <div className="p-3 py-5 md:p-8 bg-white shadow rounded-lg max-w-[800px] w-11/12 min-h-[300px]">
          <p className="text-right pb-2 text-green-600">
            Number:{" "}
            <span>
              {index + 1}/{questions.length}
            </span>
          </p>
          <div className="mt-3">
            <p
              className="text-center font-medium text-2xl lg:text-3xl leading-loose"
              dangerouslySetInnerHTML={{ __html: question }}
            />
            <div className="grid grid-cols-1 my-5 space-y-2 place-content-center">
              {answers.map((answer, index) => {
                return (
                  <button
                      disabled={!!selectedAnswer}
                      onClick={() => {
                        selectAnswer(answer);
                        checkAnswer(answer === correct_answer);
                      }}
                      key={index}
                      className="options-button w-4/5 rounded-lg mx-auto p-2 hover:bg-indigo-500"
                      dangerouslySetInnerHTML={{
                        __html: answer,
                      }}
                  />
                );
              })}
            </div>
          </div>
          <div className="flex justify-center pt-4">
            <p className={`text-base mt-0 mb-4 ${answerStyle}`}>
              {
                selectedAnswer && (
                    isCorrectAnswer
                        ? `Correct! The right answer is ${correct_answer}`
                        : `Sorry, you are wrong! The right answer is ${correct_answer}`
                )
              }
            </p>
          </div>
          <div className="flex justify-center pt-4">
            <button
              onClick={nextQuestion}
              className="py-2 px-7 text-medium flex rounded-lg text-white bg-amber-500 hover:bg-amber-600"
            >
              Next question
            </button>
          </div>
        </div>
      </main>
      </>
  );
};

export default App;
