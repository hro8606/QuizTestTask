import { useState } from "react";
import { useGlobalContext } from "../context";
import CupImg from "../assets/images/cup.svg";
import WinnersListModal from './WinnersListModal';

const Form = () => {
  const [isWinnerListModalOpen, setIsWinnerListModalOpen] = useState(false);
  const { quiz, handleSubmit, handleChange, error } = useGlobalContext();
  const handleWinnerListOpen = () => setIsWinnerListModalOpen(true);
  const handleWinnerListClose = () => setIsWinnerListModalOpen(false);

  return (
      <>
        <img id="cup" src={CupImg} onClick={handleWinnerListOpen} />
        <div className="justify-center flex items-center min-h-screen box-back">
          <form
              onSubmit={handleSubmit}
              className="bg-white p-5 md:p-8 max-w-[500px] space-y-8 shadow rounded-lg w-11/12 "
          >
            <h2 className="text-3xl font-medium text-center">Famous Quotes</h2>
            <div className="flex flex-col space-y-2">
              <label className="text-gray-600 font-medium" htmlFor="name">
                Name*
              </label>
              <input
                  required
                  type="text"
                  id="name"
                  name="name"
                  className="bg-gray-200 p-2 rounded-md outline-0 focus:bg-gray-300"
                  value={quiz.name}
                  onChange={handleChange}
                  min={5}
                  max={50}
              />
            </div>
            <div className="flex flex-col space-y-2">
              <label className="text-gray-600 font-medium" htmlFor="lastname">
                Lastname*
              </label>
              <input
                  required
                  type="text"
                  id="lastname"
                  name="lastname"
                  className="bg-gray-200 p-2 rounded-md outline-0 focus:bg-gray-300"
                  value={quiz.lastname}
                  onChange={handleChange}
                  min={5}
                  max={50}
              />
            </div>
            <div className="flex flex-col space-y-2">
              <label className="text-gray-600 font-medium" htmlFor="email">
                Email*
              </label>
              <input
                  required
                  type="email"
                  id="email"
                  name="email"
                  className="bg-gray-200 p-2 rounded-md outline-0 focus:bg-gray-300"
                  value={quiz.email}
                  onChange={handleChange}
                  min={5}
                  max={50}
              />
            </div>
            <div className="flex flex-col space-y-2">
              <label className="text-gray-600 font-medium" htmlFor="quizMode">
                Select Type
              </label>
              <select
                  id="quizMode"
                  name="quizMode"
                  className="bg-gray-200 p-2 rounded-md outline-0 focus:bg-gray-300"
                  value={quiz.quizMode}
                  onChange={handleChange}

              >
                <option value="multiple">Multiple choice</option>
                <option value="boolean">Binary (Yes/No)</option>
              </select>
            </div>
            {error && (
                <p className="text-red-600">
                  Can't Generate Questions, Please Try Different Options
                </p>
            )}
            <button
                type="submit"
                className="bg-amber-500 hover:bg-amber-600 rounde-md w-full p-2 text-white"
            >
              Start
            </button>
          </form>
        </div>
        { isWinnerListModalOpen && <WinnersListModal onWinnerListClose={handleWinnerListClose} /> }
      </>
  );
};

export default Form;
