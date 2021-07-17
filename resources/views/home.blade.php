@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                     @endif

                    <h2>Welcome {{ Auth::user()->name }}</h2><br>

                    @if (auth()->user()->is_admin == 1)
                        @include('partials.admin-home')
                    @else

                        <p>Note: For this project, CRUD functionalities are only demonstrated in admin view. Please login as admin.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
