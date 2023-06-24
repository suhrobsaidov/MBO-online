@extends('layouts.master')

@section('title')
    Users
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
                            <form action="/user-register" method="POST">
                             {{ csrf_field() }}

                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Full name:</label>
                                        <input type="text" name="username" class="form-control" id="recipient-name">
                                    </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Surname:</label>
                                    <input type="text" name="surname" class="form-control" id="recipient-name">
                                </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Phone:</label>
                                        <input type="text" name="phone" class="form-control" id="recipient-name">
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
                        <h4 class="card-title"> Users
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
                                Surname
                            </th>
                            <th>
                                Phone number
                            </th>
                            <th>
                                EDIT
                            </th>

                            <th>
                                DELETE
                            </th>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>
                                    {{ $user->id }}
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->surname }}
                                </td>
                                <td>
                                    {{ $user->phone }}
                                </td>

                                <td>
                                    <a href="/user-edit/{{ $user->id }}" class="btn btn-success">EDIT</a>
                                </td>
                                <td>
                                    <form action="/user-delete/{{ $user->id }}" method="post">
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
