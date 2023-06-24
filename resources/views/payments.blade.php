@extends('layouts.master')
@section('content')


<div class="row">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                <th>
                    ID
                </th>
                <th>
                    ИД транзакции
                </th>
                <th>
                    телефон
                </th>
                <th>
                    ФИО
                </th>
                <th>
                    Курс
                </th>
                <th>
                    Ред.
                </th>

                <th>
                    Удалить
                </th>
                </thead>
                <tbody>
                @foreach($payments as $payments)
                    <tr>
                        <td>
                            {{ $payments->id }}
                        </td>
                        <td>
                            {{ $payments->transaction_id }}
                        </td>
                        <td>
                            {{ $payments->phone }}
                        </td>
                        <td>
                            {{ $payments->amount }}
                        </td>
                        <td>
                            {{ $payments->course }}
                        </td>
                        <td>
                            <a href="/role-edit/{{ $user->id }}" class="btn btn-success">EDIT</a>
                        </td>
                        <td>
                            <form action="/role-delete/{{ $user->id }}" method="post">
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


@endsection
