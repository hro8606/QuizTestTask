import axios from "axios";
import { useState, useContext, createContext } from "react";

const table = {
  sports: 21,
  history: 23,
  politics: 24,
  science: 18,
};

const API_ENDPOINT = "http://127.0.0.1:8000/api/quiz";

const AppContext = createContext();

const AppProvider = ({ children }) => {
  const [waiting, setWaiting] = useState(true);
  const [loading, setLoading] = useState(false);
  const [loadingWinners, setLoadingWinners] = useState(false);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [error, setError] = useState(false);
  const [index, setIndex] = useState(0);
  const [correct, setCorrect] = useState(0);
  const [totalAnswered, setTotalAnswered] = useState(0);
  const [selectedAnswer, setSelectedAnswer] = useState(null);
  const [questions, setQuestions] = useState([]);
  const [winners, setWinners] = useState([]);
  const [isTheLastStep, setIsTheLastStep] = useState(false);
  const [startTimestamp, setStartTimestamp] = useState(null);
  const [quiz, setQuiz] = useState({
    name: "",
    lastname: "",
    email: "",
    quizMode: "boolean"
  });

  const fetchApi = async (url) => {
    setWaiting(false);
    setLoading(true);
    try {
      const response = await axios.get(url);
      if (response) {
        const data = response.data.results;
        if (data.length > 0) {
          setQuestions(data);
          setLoading(false);
          setWaiting(false);
          setError(false);
        } else {
          setWaiting(true);
          setError(true);
        }
      } else {
        setWaiting(true);
      }
    } catch (error) {
      console.error(error);
    }
  };

  const getWinnersApi = async () => {
    try {
      let url = `${API_ENDPOINT}/cupInfo`;
      const response = await axios.get(url);
      if (response) {
        const data = response.data.results;
        setWinners(data);
      }
    } catch (error) {
      console.error(error);
    }
  };

  const submitApi = async (url, params) => {
    try {
      const response = await axios.post(url, params);
    } catch (error) {
      console.error(error);
    }
  };

  const submitLastStep = () => {

    setIsTheLastStep(true);
    let url = `${API_ENDPOINT}/submitQuiz`;
    submitApi(url, {...quiz, correct, totalAnswered, startTimestamp, endTimestamp: new Date().getTime()});
    openModal();
  }

  const nextQuestion = () => {
    setSelectedAnswer(null);
    index === questions.length - 1 && submitLastStep();

    setIndex((prevIndex) => {
      if (prevIndex === questions.length - 1) {
        return questions.length - 1;
      } else {
        return prevIndex + 1;
      }
    });
  };

  const selectAnswer = (value) => {
    setTotalAnswered((prev) => prev + 1);
    setSelectedAnswer(value);
  }

  const checkAnswer = (value) => {
    if (value) {
      setCorrect((prev) => prev + 1);
    }
  };

  const openModal = () => {
    setIsModalOpen(true);
  };

  const closeModal = () => {
    setIsModalOpen(false);
    setIndex(0);
    setCorrect(0);
    setTotalAnswered(0);
    setWaiting(true);
    setSelectedAnswer(null);
    setIsTheLastStep(false);
    setStartTimestamp(null);
  };

  const handleChange = (e) => {
    const { value, name } = e.target;
    setQuiz({ ...quiz, [name]: value });
  };

  const handleSubmit = (e) => {
    if(e) {
      e.preventDefault();
    }
    const { quizMode } = quiz;
    setStartTimestamp(new Date().getTime());
    let url = `${API_ENDPOINT}/startQuiz?quizMode=${quizMode}`;
    fetchApi(url);
  };


  const changeQuizMode = (e) => {
    const { value, name } = e.target;
    setQuiz({ ...quiz, [name]: value });
    setStartTimestamp(new Date().getTime());
    setIndex(0);
    setCorrect(0);
    setTotalAnswered(0);
    setSelectedAnswer(null);
    setIsTheLastStep(false);
    let url = `${API_ENDPOINT}/startQuiz?quizMode=${value}`;
    fetchApi(url);
  }
  return (
    <AppContext.Provider
      value={{
        waiting,
        loading,
        loadingWinners,
        index,
        questions,
        error,
        correct,
        selectAnswer,
        selectedAnswer,
        nextQuestion,
        checkAnswer,
        isModalOpen,
        closeModal,
        quiz,
        handleChange,
        handleSubmit,
        totalAnswered,
        submitLastStep,
        isTheLastStep,
        getWinnersApi,
        winners,
        changeQuizMode
      }}
    >
      {children}
    </AppContext.Provider>
  );
};

export default AppProvider;

export const useGlobalContext = () => {
  return useContext(AppContext);
};
