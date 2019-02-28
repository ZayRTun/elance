@extends('layouts.dashboard')

@section('content')
    <div class="columns">
        <div class="column">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-header-title">
                        Elancer Dashboard
                    </h1>
                </div>

                <div class="card-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as <strong>Elancer</strong>!
                </div>
            </div>
        </div>
    </div>
@endsection
