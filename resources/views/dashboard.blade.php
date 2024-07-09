@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center">Welcome, Admin</h2>
        @include('partials.side-menu')
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5>Institutions</h5>
                                <p>{{$institutions}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5>Elections</h5>
                                <p>{{$elections}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5>Students</h5>
                                <p>{{$students}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
