@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container">
        <h2>Admin Login</h2>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('admin.login') }}" method="post">
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
                        <label for="title">Username</label>
                        <input type="text" name="username" id="title" class="form-control" placeholder="username" required="required">
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
            <div class="col-md-4 text-center">
                <p>Are you a student? You can login by clicking the button below:</p>
                <p><a href="{{route('student')}}" class="btn btn-secondary">Student Login</a></p>
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
