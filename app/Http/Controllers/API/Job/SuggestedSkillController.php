<?php

namespace App\Http\Controllers\API\Job;

use App\SuggestedSkill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuggestedSkillController extends Controller
{
    public function suggest(Request $request)
    {
        $request->validate([
            'url' => ['required', 'url'],
            'title' => ['required', 'string', 'min:3']
        ]);

        // $suggestion = new SuggestedSkill;
        SuggestedSkill::create($request->all());

        return ['status' => 200];
    }
}
