<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function subscribe()
    {

        Log::useDailyFiles(storage_path().'/logs/debug.log');
        if(Gate::allows('subs_only',Auth::user())){

            Log::info(['Request'=>"See subscribers as ". Auth::user()->name]);
            return view('subscribe');
        }else{
            Log::error(['Request'=>"Can't see subscribers as ". Auth::user()->name]);
            return "You are not subscriber yet!";

        }

    }
}
