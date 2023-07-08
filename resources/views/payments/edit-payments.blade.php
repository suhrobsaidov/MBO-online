@extends('layouts.master')

@section('title')
    Edit payments
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            Изменение данных оплаты.
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="/update-payments/{{ $payments->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="from-group">
                                        <label>User_id</label>
                                        <input type="text" name="user_id" value="{{ $payments->user_id }}" class="form-control">
                                    </div>
                                    <div class="from-group">
                                        <label>Телефон</label>
                                        <input type="text" name="phone" value="{{ $payments->phone }}" class="form-control">
                                    </div>
                                    <div class="from-group">
                                        <label>Оплата</label>
                                        <input type="text" name="amount" value="{{ $payments->amount }}" class="form-control">
                                    </div>
                                    <div>
                                        <label>От</label>
                                        <input type="text" name="from" value="{{ $payments->from }}" class="form-control">
                                    </div>
                                    <div>
                                        <label>До</label>
                                        <input type="text" name="to" value="{{ $payments->to }}" class="form-control">
                                    </div>
                                    <div>
                                        <label>Месяц</label>
                                        <input type="text" name="month" value="{{ $payments->month }}" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="/edit-payments" class="btn btn-danger">Cancel</a>
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

