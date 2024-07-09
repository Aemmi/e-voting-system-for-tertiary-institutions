@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container">
        @include('partials.side-menu')
        <h2 class="text-center">Voters</h2>
        <div class="row">

            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Toggle Election</h4>
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label>Institutions</label>
                                        <select name="institution_id" class="form-select" required>
                                            <option></option>
                                            @if($institutions)
                                                @foreach($institutions as $institution)
                                                <option value="{{$institution->id}}">{{$institution->school_name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Election</label>
                                        <select name="election_id" class="form-select" required>
                                            <option></option>
                                            @if($elections)
                                                @foreach($elections as $election)
                                                <option value="{{$election->id}}">{{$election->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <div class="form-group mb-2">
                                        <button type="submit" class="btn btn-primary">Query</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>Polls</h4>
                            </div>
                            <div class="card-body">
                                <div class="row table-responsive">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Institution</th>
                                                <th>Election</th>
                                                <th>Votes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($candidates)
                                                @foreach($candidates as $key => $candidate)
                                                <tr>
                                                    <td>{{ ($key+1) }}</td>
                                                    <td><img src="{{ asset('storage/' . $candidate->image) }}"
                                                        alt="Candidate Image" width="50" height="50"></td>
                                                    <td>{{$candidate->first_name}} {{$candidate->middle_name}} {{$candidate->last_name}}</td>
                                                    <td>{{$candidate->institution->school_name}}</td>
                                                    <td>{{$candidate->election->name}}</td>
                                                    <td>{{$candidate->vote_count ?? 0}}</td>
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

        </div>
    </div>
</div>
@endsection
