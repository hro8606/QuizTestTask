<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(): View
    {
        /*orderByRaw('submitted_at - started_at ASC')  --- it's ordering by quiz time*/
        $history = Game::orderByRaw('submitted_at - started_at ASC')->paginate(10);
        return view('admin.history.index')->with(array('history' => $history));
    }
}
