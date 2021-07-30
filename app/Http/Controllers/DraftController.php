<?php

namespace App\Http\Controllers;

use App\JobDraft;
use Illuminate\Http\Request;

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
    public function show($id)
    {
        return view('client.edit_draft', compact('id'));
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
