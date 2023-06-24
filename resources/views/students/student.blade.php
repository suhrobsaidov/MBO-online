@extends('layouts.master')

@section('title')
    Registered Roles
@endsection

@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/student-register" method="POST">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Full name:</label>
                            <input type="text" name="username" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Phone:</label>
                            <input type="text" name="phone" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">birth date:</label>
                            <input type="text" name="birthdate" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">time:</label>
                            <input type="text" name="time" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">days:</label>
                            <input type="text" name="days" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">How did they know us:</label>
                            <input type="text" class="form-control" id="recipient-name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Role Register
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add</button>
                    </h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <style>
                    .w-10p{
                        width: 10% !important;
                    }
                </style>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Phone number
                            </th>
                            <th>
                                Birth date
                            </th>
                            <th>
                                Time
                            </th>
                            <th>
                                Days
                            </th>
                            <th>
                                EDIT
                            </th>

                            <th>
                                DELETE
                            </th>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>
                                        {{ $student->id }}
                                    </td>
                                    <td>
                                        {{ $student->name }}
                                    </td>
                                    <td>
                                        {{ $student->phone }}
                                    </td>
                                    <td>
                                        {{ $student->birthdate }}
                                    </td>
                                    <td>
                                        {{ $student->time }}
                                    </td>
                                    <td>
                                        {{ $student->days }}
                                    </td>
                                    <td>
                                        <a href="/student-edit/{{ $student->id }}" class="btn btn-success">EDIT</a>
                                    </td>
                                    <td>
                                        <form action="/student-delete/{{ $student->id }}" method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection


@section('scripts')

@endsection
