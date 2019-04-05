@extends('layouts.app')

@section('content')
    {{-- {{dd($elancerProfile)}} --}}
    <div class="jumbotron jumbotron-fluid bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-3 text-center text-md-left col-lg-2">
                    <figure class="figure">
                        <img src="/img/profile/{{ $elancerProfile->image }}" alt="" class="figure-img rounded-circle">
                    </figure>
                </div>

                <div class="col-12 col-md-4 text-center text-md-left">
                    <h2 class="">{{ $elancerProfile->name }}</h2>
                    <p class="">{{ $elancerProfile->service }} - {{ $elancerProfile->category }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card border-0">
            <div class="row justify-content-between">
                <div class="col-sm-6">
                    <h2>My Dashboard</h2>
                </div>
                <div class="col-sm-6 text-sm-right">
                    <a class="btn btn-primary" href="#" role="button">
                        Add new Project <i class="fas fa-plus"></i>
                    </a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-block">
                            <h4 class="card-title text-center mt-2">Active Project</h4>
                            <div class="list-group ">
                                <a href="#" class="list-group-item list-group-item-action border-0 text-primary">Cras justo odio</a>
                                <a href="#" class="list-group-item list-group-item-action border-0 text-primary">Cras justo odio</a>
                                <a href="#" class="list-group-item list-group-item-action border-0 text-primary">Cras justo odio</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-block">
                            <h4 class="card-title text-center mt-2">Completed Project</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-block">
                            <h4 class="card-title text-center mt-2">Current Bidding</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
