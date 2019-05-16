<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = Auth::user();

        $drafts = $client->jobDrafts()->where('job_post_completed', 0)->get();
        $jobs = $client->jobs()->get();

        return view('client.dashboard', compact('client', 'drafts', 'jobs'));
    }
}
