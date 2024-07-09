@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="container">
            @include('partials.side-menu')
            <h2 class="text-center">Voters</h2>
            <div class="row">
                <p><a href="{{asset('assets/voters_register.csv')}}" download="voters_register">Download Template</a></p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-2">
                    <form method="post" action="" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12 mb-2">
                            <div class="input-group">
                                <label class="visually-hidden" for="name">Upload Voters Register</label>
                                <input type="file" name="file" class="form-control" id="file">
                            </div>
                        </div>

                        <div class="col-6 mb-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <div class="row mb-3">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Matric Number</th>
                                    <th>Institution</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($students)
                                    @foreach($students as $key => $student)
                                    <tr>
                                        <td>{{($key+1)}}</td>
                                        <td>{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}</td>
                                        <td>{{$student->matric_number}}</td>
                                        <td>{{$student->institution->school_name}}</td>
                                        <td>{{$student->created_at}}</td>
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
@endsection
