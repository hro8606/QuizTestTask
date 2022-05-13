const WinnersTable = ({ winners }) => {

    return (
        <div /*className="absolute top-0 left-0 h-screen w-full flex items-center bg-[rgba(0,0,0,.5)]"*/>
            <h2 className="text-3xl font-medium text-center">Top 10 players</h2>
            <div className=" text-center bg-white p-8 mx-auto rounded-lg max-w-[900px] w-11/12">
                <div className="mt-2 flex flex-col">
                    <div className="-my-2 overflow-x-auto -mx-4 sm:-mx-6 lg:-mx-8">
                        <div className="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div className="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table
                                    className="min-w-full divide-y divide-gray-200"
                                >
                                    <thead className="bg-gray-50">
                                    <tr>
                                        <th
                                            scope="col"
                                            className="group px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            <div className="flex items-center justify-between">
                                                <span>Name</span>
                                            </div>
                                        </th>
                                        <th
                                            scope="col"
                                            className="group px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            <div className="flex items-center justify-between">
                                                <span>Email</span>
                                            </div>
                                        </th>
                                        <th
                                            scope="col"
                                            className="group px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            <div className="flex items-center justify-between">
                                                <span>Score</span>
                                            </div>
                                        </th>
                                        <th
                                            scope="col"
                                            className="group px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            <div className="flex items-center justify-between">
                                                <span>Time</span>
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody
                                        className="bg-white divide-y divide-gray-200"
                                    >
                                    {winners.map((winner, i) => {
                                        return (
                                            <tr>
                                                <td className="px-6 py-4 whitespace-nowrap">{winner.name}</td>
                                                <td className="px-6 py-4 whitespace-nowrap">{winner.email}</td>
                                                <td className="px-6 py-4 whitespace-nowrap">{winner.score}</td>
                                                <td className="px-6 py-4 whitespace-nowrap">{winner.time}</td>
                                            </tr>
                                        );
                                    })}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default WinnersTable;