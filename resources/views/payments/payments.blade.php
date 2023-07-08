@extends('layouts.master')

@section('title')
    Оплата
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
                <form action="/create-payments" method="POST">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Телефон:</label>
                            <input type="text" name="phone" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">User_Id:</label>
                            <input type="text" name="user_id" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Оплата:</label>
                            <input type="text" name="amount" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">От:</label>
                            <input type="text" name="from" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">До:</label>
                            <input type="text" name="to" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Месяц:</label>
                            <input type="text" name="month" class="form-control" id="recipient-name">
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
                    <h4 class="card-title"> Оплата
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Добавить</button>
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
                                User_id
                            </th>
                            <th>
                                Телефон
                            </th>
                            <th>
                                Оплата
                            </th>
                            <th>
                                От
                            </th>
                            <th>
                                До
                            </th>
                            <th>
                                Месяц
                            </th>
                            <th>
                                Ред.
                            </th>

                            <th>
                                Удалить
                            </th>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>
                                        {{ $payment->id }}
                                    </td>
                                    <td>
                                        {{ $payment->user_id }}
                                    </td>
                                    <td>
                                        {{ $payment->phone }}
                                    </td>
                                    <td>
                                        {{ $payment->amount }}
                                    </td>
                                    <td>
                                        {{ $payment->from }}
                                    </td>
                                    <td>
                                        {{ $payment->to }}
                                    </td>
                                    <td>
                                        {{ $payment->month }}
                                    </td>
                                    <td>
                                        <a href="/edit-payments/{{ $payment->id }}" class="btn btn-success">EDIT</a>
                                    </td>
                                    <td>
                                        <form action="/delete-payments/{{ $payment->id }}" method="post">
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
    </div>
    </div>

@endsection


@section('scripts')

@endsection
