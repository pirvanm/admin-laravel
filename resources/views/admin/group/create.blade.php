@extends('layouts.admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="card text-left">

                    <div class="card-body">
                        <h4 class="card-title">Create Group</h4>

                        <form action="/admin/student-group/create" method="POST" class="card-text">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" aria-describedby="name"
                                    placeholder="name">
                                {{-- <small id="name" class="form-text text-muted">name</small> --}}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="active" id="" value="true"
                                        checked>
                                    Active
                                </label>
                            </div>
                            <br>
                            <button class="btn btn-sm btn-success" type="submit">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
