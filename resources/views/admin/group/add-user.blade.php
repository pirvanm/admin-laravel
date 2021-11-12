@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-left">
                    <div class="card-body">
                        <h4 class="card-title">Add Users to {{ $group->name }}</h4>
                        <p class="card-text">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Attach</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td scope="row">{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <form action="/admin/student-group/users/{{ $group->id }}/add" method="POST">
                                                @csrf
                                                <input type="hidden" name="userid" value="{{ $user->id }}">
                                                <button class="btn btn-sm btn-success" type="submit">Attach</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
