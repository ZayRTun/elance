<?php

namespace App\Http\Controllers\API\Job;

use App\JobDraft;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobDraft  $jobDraft
     * @return \Illuminate\Http\Response
     */
    public function show(JobDraft $jobDraft)
    {
        return $jobDraft;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobDraft  $jobDraft
     * @return \Illuminate\Http\Response
     */
    public function edit(JobDraft $jobDraft)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobDraft  $jobDraft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobDraft $jobDraft)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobDraft  $jobDraft
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobDraft $jobDraft)
    {
        //
    }
}
