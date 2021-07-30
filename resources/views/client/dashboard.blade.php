@extends('layouts.app')

@section('content')
{{-- {{dd($client->name)}} --}}
{{-- {{dd(count($drafts))}} --}}
{{-- {{dd($drafts[0]->id)}} --}}
{{-- {{dd($jobs)}} --}}

<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6">
            <h1>{{ $client->name }}</h1>
        </div>
        <div class="col-sm-6 text-sm-right">
            <a class="btn btn-primary rounded-0" href="{{ route('jobs.create') }}" role="button">Post a Job</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-8">
            @if (count($drafts) >= 1)
                <div class="card rounded-0 mb-3">
                    <div class="card-header">
                        <span class="h4">My drafts</span>
                    </div>

                    @foreach($drafts as $draft)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <p class="mb-0">
                                        {{$draft->title}}
                                    </p>
                                    <p class="text-muted">
                                        Saved {{$draft->updated_at->diffForHumans()}}
                                    </p>
                                </div>

                                <div class="col-2 text-center px-0">
                                    <div class="dropdown open">
                                        <button class="btn rounded-circle shadow-sm text-primary dropdown-toggle draft-edit-btn" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>

                                        <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenu1">
                                            <a class="dropdown-item" href="{{route('draft.edit', $draft->id)}}">Edit draft</a>
                                            <a class="dropdown-item" href="#">Remove draft</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif


            <div class="card rounded-0 mb-3">
                <div class="card-header">
                    <span class="h4">My Postings</span>
                </div>

                @if (count($jobs) > 0)
                    @foreach($jobs as $job)
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <p class="mb-0">
                                        {{$job->title}}
                                    </p>
                                    <p class="text-muted">
                                        Posted {{$job->created_at->diffForHumans()}}
                                    </p>
                                </div>
                                <div class="col-2 text-center px-0">
                                    <div class="dropdown">
                                        <button class="btn rounded-circle shadow-custom text-primary dropdown-toggle draft-edit-btn" type="button" id="postDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu mt-2" aria-labelledby="postDropDown">
                                            <a class="dropdown-item" href="{{route('draft.edit', $job->id)}}">Edit post</a>
                                            <a class="dropdown-item" href="#">Remove post</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <a class="btn btn-primary rounded-0" href="{{ route('jobs.create') }}" role="button">Post a Job</a>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card rounded-0">
                <div class="card-header">
                    <span class="h4">Favourites</span>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <span class="h3">Coming Soon</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
