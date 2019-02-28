<?php

namespace App\Http\Controllers;

use App\Elancer;
use Illuminate\Http\Request;

class ElancerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:elancer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('elancer.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elancer.create');
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
     * @param  \App\Elancer  $elancer
     * @return \Illuminate\Http\Response
     */
    public function show(Elancer $elancer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Elancer  $elancer
     * @return \Illuminate\Http\Response
     */
    public function edit(Elancer $elancer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Elancer  $elancer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Elancer $elancer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Elancer  $elancer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Elancer $elancer)
    {
        //
    }
}
