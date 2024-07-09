@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container">
        <h2 class="text-center">Admin Login</h2>
        <div class="row">
            <div class="col-md-7 m-auto">
                <form action="{{ route('students.login') }}" method="post">
                    @csrf
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li style="color: red;">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group mb-2">
                        <label for="title">Matric Number</label>
                        <input type="text" name="matric_number" id="matric_number" class="form-control" placeholder="matric_number" required="required">
                        @error('username')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="description">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                        @error('password')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="z-index:4000">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oooops!</strong> {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
