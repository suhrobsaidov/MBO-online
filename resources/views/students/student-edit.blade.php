@extends('layouts.master')

@section('title')
    Edit-student
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Edit role for registered student.
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="/sudent-register-update/{{ $students->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="from-group">
                                        <label>Name</label>
                                        <input type="text" name="username" value="{{ $students->name }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Give Role</label>
                                        <select name="usertype" class="form-control">
                                            <option value="user">Юзер</option>
                                            <option value="admin">Админ</option>
                                            <option value="student">Студент</option>
                                            <option value="cashier">Кассир</option>
                                        </select>
                                    </div>
                                    <div><label>Телефон</label><input type="text" name="phone" value="{{ $students->phone }}" class="form-control"></div>

                                    <div><label>Дата рож.</label><input type="date" name="birthdate" value="{{ $students->birthdate }}" class="form-control"></div>
                                    <div><label>Уровень</label><input type="text" name="level" value="{{ $students->level }}" class="form-control"></div>
                                    <div><label>Дни</label><input type="text" name="days" value="{{ $students->days }}" class="form-control"></div>
                                    <div><label>Время</label><input type="text" name="time" value="{{ $students->time }}" class="form-control"></div>
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

