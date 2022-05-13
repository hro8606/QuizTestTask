import React, {useEffect} from "react";
import WinnersTable from "./WinnersTable";
import {useGlobalContext} from "../context";

const WinnersListModal = ({ onWinnerListClose }) => {

    const { getWinnersApi, loadingWinners, winners } = useGlobalContext();
    let content;

    useEffect(() => {
        getWinnersApi();
    }, []);

    content = (
        <>
            <WinnersTable winners={winners} />
            <button
                className="bg-amber-500 hover:bg-amber-600 py-2 px-7 rounded-xl text-white mt-2 "
                onClick={onWinnerListClose}
            >
                Close
            </button>
        </>
    );

    if (winners.length === 0) content = (
        <div className="flex items-center justify-center">
            <div className="w-20 h-20 bg-blue-400 rounded-full"></div>
        </div>
    );

    return (
        <div className="absolute top-0 left-0 h-screen w-full flex items-center bg-[rgba(0,0,0,.5)]">
            <div className=" text-center bg-white p-8 mx-auto rounded-lg max-w-[900px] w-11/12">
                {content}
            </div>
        </div>
    );
};

export default WinnersListModal;