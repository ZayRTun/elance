<?php

namespace App\Http\Controllers\API\Elancer;

use App\Service;
use App\SubService;
use App\SubServiceSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
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
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function services(Service $service)
    {
        return $service->subServices->all();
    }

    public function skills(SubService $subService)
    {
        return $subService->skills->all();
    }

    public function skillSuggestions(Request $request, $id)
    {
        $request->validate([
            'userInput' => ['string', 'min:1']
        ]);

        // if ($request->has('userInput')) {
        $userInput = $request->userInput;
        return SubServiceSkill::where('sub_service_id', '<>', "$id")->where('skills', 'LIKE', "%$userInput%")->pluck('skills');

        // return response()->json($result);
        // return $results;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
