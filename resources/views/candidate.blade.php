@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="container">

            @include('partials.side-menu')

            <h2 class="text-center">Candidates</h2>

            <div class="row">

                <div class="col-md-4 mb-2">
                    <form method="post" action="{{ route('candidate.store') }}" class="row" enctype="multipart/form-data">
                        @csrf

                        <div class="col-12 mb-2">
                            <label for="name">Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="fname">First Name</label>
                            <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="fname" placeholder="Name">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="mname">Middle Name</label>
                            <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" id="mname" placeholder="Name">
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="name">Last Name</label>
                            <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="lname" placeholder="Name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="gender">Gender</label>
                            <select class="form-select @error('gender') is-invalid @enderror" name="gender" id="gender">
                                <option></option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="institution">Institution</label>
                            <select class="form-select @error('institution_id') is-invalid @enderror" name="institution_id" id="institution">
                                <option></option>
                                @if ($institutions)
                                    @foreach ($institutions as $key => $institute)
                                        <option value="{{ $institute->id }}">{{ $institute->school_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('institution_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="name">Election Year</label>
                            <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" id="year" placeholder="Year">
                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="name">Election Type</label>
                            <select name="election_id" class="form-control @error('election_id') is-invalid @enderror" id="election_id" required>
                                <option></option>
                                @if($elections)
                                    @foreach($elections as $election)
                                    <option value="{{$election->id}}">{{$election->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('election_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Gender</th>
                                        <th>Institution</th>
                                        <th>Vote Count</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidates as $key => $candidate)
                                        <tr>
                                            <td>{{ ($key + 1) }}</td>
                                            <td>
                                                @if ($candidate->image)
                                                    <img src="{{ asset('storage/' . $candidate->image) }}"
                                                        alt="Candidate Image" width="50" height="50">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $candidate->first_name }}</td>
                                            <td>{{ $candidate->middle_name }}</td>
                                            <td>{{ $candidate->last_name }}</td>
                                            <td>{{ $candidate->gender }}</td>
                                            <td>{{ $candidate->institution->school_name }}</td>
                                            <td>{{ $candidate->vote_count }}</td>
                                            <td>{{ $candidate->status }}</td>
                                            <td>{{ $candidate->created_at }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
