@extends('layouts.master')

@section('title')
    Группы
@endsection

@section('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Создать Группу</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/save-aboutus" method="POST">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Время:</label>
                            <input type="text" name="time" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Номер класса:</label>
                            <input type="text" name="number" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea name="description" class="form-control" id="message-text"></textarea>
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
                    <h4 class="card-title"> Информация о Группах
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                data-target="#exampleModal">Создать
                        </button>
                    </h4>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <style>
                    .w-10p {
                        width: 10% !important;
                    }
                </style>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th class="w-10p">
                                Id
                            </th>
                            <th class="w-10p">
                                Время
                            </th>
                            <th class="w-10p">
                                Класс
                            </th>
                            <th class="w-10p">
                                Колл-во учеников
                            </th>
                            <th class="w-10p">
                                Учитель
                            </th>
                            <th class="w-10p">
                                Ред.
                            </th>
                            <th class="w-10p">
                                Удалить
                            </th>
                            </thead>
                            <tbody>
                            @foreach($groups as $data)
                                <tr>
                                    <td>
                                        {{ $data->id }}
                                    </td>
                                    <td>
                                        {{ $data->time }}
                                    </td>
                                    <td>
                                        {{ $data->number }}
                                    </td>
                                    <td>

                                    </td>
                                  <td>

                                  </td>
                                    <td>
                                        <a href="{{url('group/'.$data->id)}}" class="btn btn-success">EDIT</a>
                                    </td>
                                    <td>
                                        <form action="{{url('group/'.$data->id)}}" method="POST">
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
