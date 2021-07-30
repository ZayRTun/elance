<?php

namespace App\Http\Controllers\API\Job;

use App\JobDraft;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class JobController extends Controller
{
    public function create1()
    {
        $user = auth('api')->user();

        $service = json_encode(request()->service);
        $category = json_encode(request()->category);
        request()->merge(['service' => $service]);
        request()->merge(['category' => $category]);

        $validated = request()->validate([
            'title' => ['required', 'string', 'min:3'],
            'service' => ['required', 'json'],
            'category' => ['required', 'json'],
        ]);

        $draft = $user->jobDrafts()->updateOrCreate([
            'title' => request('title'),
            'service' => request('service'),
            'category' => request('category'),
            'current_page' => request('current_page')
        ]);

        return ['draftId' => $draft->id, 'status' => 200];
    }

    public function create2()
    {
        $currentDraft;

        $client = auth('api')->user();

        $draft = $client->jobDrafts->find(request('id'));

        request()->validate([
            'description' => ['required', 'min:50'],
            'files.*' => ['file64:jpeg,jpg,png,pdf']
        ]);

        $files = request()->input('files');

        return $files;
        // if (empty(request('files'))) {
        //     return ['message' => 'its empty'];
        // } else {
        //     return ['message' => 'not empty'];
        // }

        // if (count($files) > 0) {
        //     $filesInString = '';

        //     foreach ($files as $key => $value) {
        //         $img_info = getimagesize($value);
        //         $mime_type = explode("/", $img_info['mime']);
        //         $name = $client->id."-".time().'.'.$mime_type[1];

        //         Image::make($value)->save(public_path('/img/project/').$name);

        //         $files[$key] = $name;
        //     }

        //     foreach ($files as $file) {
        //         if (strlen($filesInString) > 0) {
        //             $filesInString .= ', ' . $file;
        //         } else {
        //             $filesInString = $file;
        //         }
        //     }
        //     request()->merge(['files' => $filesInString]);

        //     $draft->update([
        //         'title' => request('title'),
        //         'description' => request('description'),
        //         'files' => request('files'),
        //         'current_page' => request('current_page')
        //     ]);
        // } else {
        //     $draft->update([
        //         'id' => request('id'),
        //         'description' => request('description'),
        //         'current_page' => request('current_page')
        //     ]);
        // }

        // return ['draftId' => $draft->id, 'status' => 200];
    }

    public function create3()
    {
        $client = auth('api')->user();

        $draft = $client->jobDrafts()->find(request('id'));

        request()->validate([
            'job_type' => ['required', 'string', 'min:3', 'max:100'],
            'question_1' => ['nullable', 'string', 'max:256', 'min:3'],
            'question_2' => ['nullable', 'string', 'max:256', 'min:3'],
            'question_3' => ['nullable', 'string', 'max:256', 'min:3'],
            'question_4' => ['nullable', 'string', 'max:256', 'min:3'],
            'question_5' => ['nullable', 'string', 'max:256', 'min:3']
        ]);

        $draft->update([
            'job_type' => request('job_type'),
            'question_1' => request('question_1'),
            'question_2' => request('question_2'),
            'question_3' => request('question_3'),
            'question_4' => request('question_4'),
            'question_5' => request('question_5'),
            'current_page' => request('current_page')
        ]);

        return ['draftId' => $draft->id, 'status' => 200];
    }

    public function create4()
    {
        $client = auth('api')->user();

        $draft = $client->jobDrafts()->find(request('id'));

        request()->validate([
            'skills' => 'sometimes|string|nullable',
            'client_added_skills' => 'sometimes|string|nullable',
        ]);

        $draft->update([
            'skills' => request('skills'),
            'client_added_skills' => request('client_added_skills'),
            'current_page' => request('current_page')
        ]);

        return ['draftId' => $draft->id, 'status' => 200];
    }

    public function create5()
    {
        $client = auth('api')->user();

        $draft = $client->jobDrafts()->find(request('id'));

        request()->validate([
            'experience_level' => ['required', 'string', 'max:190'],
            'expected_duration' => ['required', 'string', 'max:190']
        ]);

        $draft->update([
            'experience_level' => request('experience_level'),
            'expected_duration' => request('expected_duration'),
            'current_page' => request('current_page')
        ]);

        return ['draftId' => $draft->id, 'status' => 200];
    }

    public function store(JobDraft $jobdraft)
    {
        $updated = $jobdraft->update(request()->only('job_post_completed'));
        if ($updated) {
            $client = auth('api')->user();
            $draft = $client->jobDrafts()->find($jobdraft->id)->toArray();
            $jobs = $client->jobs()->create($draft);
        }
        // return $jobs;
        // return ['message' => $updated];

        // $filename = $jobdraft->files;

        // request()->merge(['files' => $filename]);

        // return gettype(request('files'));

        // $client->jobs()->create(request()->except('id', 'current_page'));
        // JobDraft::create(request()->all());


        return ['message' => 'Congratulations! Your Job has been posted successfully.', 'status' => 200, 'redirect' => route('home')];
    }

    public function update1()
    {
        $validated = request()->validate([
            'title' => ['required', 'min:3'],
            'service' => ['required', 'max:255']
        ]);

        return ['status' => 200];
    }
}
