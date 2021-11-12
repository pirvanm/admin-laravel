@extends('layouts.admin')

@section('content')<div class="row">

        <div class="col-md-12">
            @if (session('success'))


                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Saved Success!</h4>
                </div>
            @endif
            <div class="card text-left">
                <div class="card-body">
                    <h4 class="card-title">Students</h4>
                    <a href="/admin/student-group/users/{{ $group->id }}/add"
                        class="btn btn-sm btn-primary float-right">Add Users</a>
                    <p class="card-text">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="5%">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action="/admin/student-group/users/{{ $group->id }}/remove" method="POST">
                                            @csrf
                                            <input type="hidden" name="userid" value="{{ $user->id }}">
                                            <button class="btn btn-sm btn-danger" type="submit">Remove</button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </p>
                </div>
                <center>
                    {!! $users->render() !!}
                </center>
            </div>
        </div>
    </div>
@endsection
