<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/skill-suggestion', 'API\Job\SuggestedSkillController@suggest');

Route::get('/elancer/create', 'API\Elancer\ProfileController@create');
Route::post('/elancer/create', 'API\Elancer\ProfileController@store');

Route::get('/elancer/services/{service}', 'API\Elancer\ServiceController@services');
Route::get('/elancer/subservices/{subService}', 'API\Elancer\ServiceController@skills');

Route::post('/elancer/skill-suggestion/{id}', 'API\Elancer\ServiceController@skillSuggestions');

Route::get('/elancer', 'API\Elancer\ProfileController@index');

Route::prefix('/jobs')->group(function () {
    Route::post('/s1', 'API\Job\JobController@create1');
    Route::post('/s2', 'API\Job\JobController@create2');
    Route::post('/s3', 'API\Job\JobController@create3');
    Route::post('/s4', 'API\Job\JobController@create4');
    Route::post('/s5', 'API\Job\JobController@create5');
});
