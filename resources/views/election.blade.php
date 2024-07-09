@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="container">
        @include('partials.side-menu')
        <h2 class="text-center">Elections</h2>
        <div class="row">

            <div class="col-md-4">
                <form method="post" action="" class="row">
                    @csrf
                    <div class="col-12 mb-2">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Name" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label for="name">Year</label>
                        <input type="number" name="year" class="form-control" id="name" required>
                    </div>

                    <div class="col-12 mb-2">
                        <label for="type">Type</label>
                        <select class="form-select" name="type" id="type" required>
                            <option></option>
                            <option value="presidential">Student Union President</option>
                            <option value="departmental">Departmental Election</option>
                            <option value="other">Other Election</option>
                        </select>
                    </div>

                    <div class="col-12 mb-2">
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
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Date Added</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($elections)
                                    @foreach($elections as $key => $election)
                                    <tr>
                                        <td>{{ ($key + 1) }}</td>
                                        <td>{{ $election->name }}</td>
                                        <td>{{ $election->type }}</td>
                                        <td>{{ $election->created_at }}</td>
                                        <td>{{ $election->updated_at }}</td>
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
