<?php

namespace App\Http\Controllers\API\Elancer;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:elancer-api');
    }


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
        return Service::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $elancer = auth('elancer-api')->user();

        if (isset(request()->image)) {
            $img_info = getimagesize(request()->image);
            $mime_type = explode("/", $img_info['mime']);
            $name = $elancer->id."-".time().'.'.$mime_type[1];

            Image::make(request()->image)->save(public_path('/img/profile/').$name);

            request()->merge(['image' => $name]);
        }

        $this->validate(request(), [
            'name' => 'required|string|max:191',
            'gender' => 'required|string',
            'phone' => 'required',
            'proficiency' => 'required|string',
            'service' => 'required|string',
            'category' => 'required|string',
            'degree' => 'required|string',
            'university' => 'required|string',
            'from' => 'required',
            'to' => 'required',
            'about' => 'required|string|max:520',
            'address' => 'required|string|max:191'
        ]);

        $profile = $elancer->profile()->create(request()->all());

        return ['message' => 'Congratulations! Your profile has been created successfully.', 'status' => 200, 'redirect' => route('elancer.home')];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
