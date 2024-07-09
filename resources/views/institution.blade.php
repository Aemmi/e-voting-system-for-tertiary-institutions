@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container">
        @include('partials.side-menu')
        <h2 class="text-center">Institutions</h2>
        <div class="row">

            <div class="col-md-4 mb-3">
                <form method="post" action="" class="row">
                    @csrf
                    <div class="col-12 mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="school_name" class="form-control" id="name"
                            placeholder="Name">
                    </div>

                    <div class="col-12 mb-2">
                        <label for="address">Address</label>
                        <input class="form-control" name="school_address" id="school_address">
                    </div>

                    <div class="col-12 mb-2">
                        <label for="email">Email</label>
                        <input class="form-control" name="school_email" id="school_address">
                    </div>

                    <div class="col-12 mb-2">
                        <label for="vc">VC</label>
                        <input class="form-control" name="school_vc" id="school_vc">
                    </div>

                    <div class="col-6 mb-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <div class="row">

                    <div class="row mb-3">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>VC</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($institutions)
                                    @foreach ($institutions as $key => $institution)
                                    <tr>
                                        <td>{{$institution->id}}</td>
                                        <td>{{ $institution->school_name }}</td>
                                        <td>{{ $institution->school_address }}</td>
                                        <td>{{ $institution->school_email }}</td>
                                        <td>{{ $institution->school_vc }}</td>
                                        <td>{{ $institution->created_at }}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
