@extends ('layouts.app')

@section ('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="card-title">
                        Employer
                    </h2>
                    <p class="card-text">
                        Are you an Employer ?
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary " role="button">
                        Register
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="card-title">
                        Elancer
                    </h2>
                    <p class="card-text ">
                        Are you an Elancer ?
                    </p>
                    <a href="{{ route('elancer.register') }}" class="btn btn-outline-primary " role="button">
                        Register
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
