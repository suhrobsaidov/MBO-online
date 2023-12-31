
@extends('layouts.master')

@section('title')
    Edit books
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Edit role for registered user.
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="/role-register-update/{{ $users->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="from-group">
                                        <label>Name</label>
                                        <input type="text" name="username" value="{{ $users->name }}" class="form-control">
                                    </div>
                                    <div class="from-group">
                                        <label>Surname</label>
                                        <input type="text" name="surname" value="{{ $users->surname }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Give Role</label>
                                        <select name="usertype" class="form-control">
                                            <option value="user">Пользователь</option>
                                            <option value="admin">Админ</option>
                                            <option value="moderator">Модератор</option>
                                            <option value="cashier">Кассир</option>
                                        </select>
                                    </div>
                                    <div><label>Телефон</label><input type="text" name="phone" value="{{ $users->phone }}" class="form-control"></div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="/profile" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

