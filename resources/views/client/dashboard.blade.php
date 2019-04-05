@extends('layouts.app')

@section('content')
{{-- {{dd($client->name)}} --}}
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
            <div class="card rounded-0">
                <div class="card-header">
                    <span class="h4">My Postings</span>
                </div>
                <div class="card-body d-flex justify-content-center">
                    <a class="btn btn-primary rounded-0" href="{{ route('jobs.create') }}" role="button">Post a Job</a>
                </div>
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
