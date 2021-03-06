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
    Route::post('/{jobdraft}', 'API\Job\JobController@store');
});

Route::prefix('/updatejob')->group(function () {
    Route::post('/up1', 'API\Job\JobController@update1');
    Route::post('/up2', 'API\Job\JobController@update2');
    Route::post('/up3', 'API\Job\JobController@update3');
    Route::post('/up4', 'API\Job\JobController@update4');
    Route::post('/up5', 'API\Job\JobController@update5');
});

Route::prefix('/draft')->group(function () {
    Route::get('/{jobDraft}', 'API\Job\DraftController@show');
});
