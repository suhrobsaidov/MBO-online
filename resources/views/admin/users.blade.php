@extends('layouts.master')

@section('title')
    Users
@endsection

@section('content')
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Добавить</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/user-register" method="POST">
                             {{ csrf_field() }}

                            <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Имя:</label>
                                        <input type="text" name="username" class="form-control" id="recipient-name">
                                    </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Фамилия:</label>
                                    <input type="text" name="surname" class="form-control" id="recipient-name">
                                </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Телефон:</label>
                                        <input type="text" name="phone" class="form-control" id="recipient-name">
                                    </div>

                                    </div>
                                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
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
                               Имя
                            </th>
                            <th>
                                Фамилия
                            </th>
                            <th>
                               Телефон
                            </th>
                            <th>
                                Ред.
                            </th>

                            <th>
                                Удалить
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


<!--        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header">
                    <h4 class="card-title"> Table on Plain Background</h4>
                    <p class="category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>
                                Name
                            </th>
                            <th>
                                Country
                            </th>
                            <th>
                                City
                            </th>
                            <th class="text-right">
                                Salary
                            </th>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Dakota Rice
                                </td>
                                <td>
                                    Niger
                                </td>
                                <td>
                                    Oud-Turnhout
                                </td>
                                <td class="text-right">
                                    $36,738
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Minerva Hooper
                                </td>
                                <td>
                                    Curaçao
                                </td>
                                <td>
                                    Sinaai-Waas
                                </td>
                                <td class="text-right">
                                    $23,789
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Sage Rodriguez
                                </td>
                                <td>
                                    Netherlands
                                </td>
                                <td>
                                    Baileux
                                </td>
                                <td class="text-right">
                                    $56,142
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Philip Chaney
                                </td>
                                <td>
                                    Korea, South
                                </td>
                                <td>
                                    Overland Park
                                </td>
                                <td class="text-right">
                                    $38,735
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Doris Greene
                                </td>
                                <td>
                                    Malawi
                                </td>
                                <td>
                                    Feldkirchen in Kärnten
                                </td>
                                <td class="text-right">
                                    $63,542
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Mason Porter
                                </td>
                                <td>
                                    Chile
                                </td>
                                <td>
                                    Gloucester
                                </td>
                                <td class="text-right">
                                    $78,615
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Jon Porter
                                </td>
                                <td>
                                    Portugal
                                </td>
                                <td>
                                    Gloucester
                                </td>
                                <td class="text-right">
                                    $98,615
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>-->
    </div>
    </div>

@endsection


@section('scripts')

@endsection
