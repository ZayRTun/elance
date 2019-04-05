<?php

namespace App\Http\Controllers\API\Job;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class JobController extends Controller
{
    public function create1()
    {
        $validated = request()->validate([
            'title' => ['required', 'min:3'],
            'service' => ['required', 'max:255']
        ]);

        return ['status' => 200];
    }

    public function create2()
    {
        $client = auth('api')->user();

        request()->validate([
            'description' => ['required', 'min:50'],
            // 'files.*' => ['file64:jpeg,jpg,png,pdf']
            'files.*' => ['file64:png']
        ]);

        $files = request()->input('files');

        if (sizeof($files) > 0) {
            foreach ($files as $key => $value) {
                $img_info = getimagesize($value);
                $mime_type = explode("/", $img_info['mime']);
                $name = $client->id."-".time().'.'.$mime_type[1];

                Image::make($value)->save(public_path('/img/project/').$name);

                $files[$key] = $name;
            }
            request()->merge(['files' => $files]);
        }

        return ['status' => 200];
    }

    public function create3()
    {
        request()->validate([
            'job_type' => ['required', 'string', 'min:3', 'max:100'],
            'question_1' => ['nullable', 'string', 'max:256', 'min:3'],
            'question_2' => ['nullable', 'string', 'max:256', 'min:3'],
            'question_3' => ['nullable', 'string', 'max:256', 'min:3'],
            'question_4' => ['nullable', 'string', 'max:256', 'min:3'],
            'question_5' => ['nullable', 'string', 'max:256', 'min:3']
        ]);

        return ['status' => 200];
    }

    public function create4()
    {
        request()->validate([
            'skills' => 'sometimes|string|nullable',
            'client_added_skills' => 'sometimes|string|nullable',
        ]);

        return ['status' => 200];
    }

    public function create5()
    {
        request()->validate([
            'experience_level' => ['required', 'string', 'max:190'],
            'expected_duration' => ['required', 'string', 'max:190']
        ]);

        return ['status' => 200];
    }
}
