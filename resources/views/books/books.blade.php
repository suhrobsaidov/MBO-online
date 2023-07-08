@extends('layouts.master')
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
                <form action="/books" method="POST">
                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Картинка:</label>
                            <input type="file" name="image" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Название:</label>
                            <input type="text" name="name" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Автор:</label>
                            <input type="text" name="author" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Описание:</label>
                            <input type="text" name="description" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Файл:</label>
                            <input type="file" name="file" class="form-control" id="recipient-name">
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
                    <h4 class="card-title"> Список книг
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
                                Картинка
                            </th>
                            <th>
                                Название
                            </th>
                            <th>
                                Автор
                            </th>
                            <th>
                                Описание
                            </th>
                            <th>
                                Файл
                            </th>
                            <th>
                                Ред.
                            </th>

                            <th>
                                Удалить
                            </th>
                            </thead>
                            <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>
                                        {{ $book->id }}
                                    </td>
                                    <td>
                                        <img src="{{asset('images/books/'.$book->image)}}" width="70px" height="70px" alt="Image">
                                    </td>
                                    <td>
                                        {{ $book->name }}
                                    </td>
                                    <td>
                                        {{ $book->author }}
                                    </td>
                                    <td>
                                        {{ $book->description }}
                                    </td>
                                    <td>
                                        <a href="{{url('files/books/'.$book->file)}}" class="btn">File</a>
                                    </td>
                                    <td>
                                        <a href="/books-edit/{{ $book->id }}" class="btn btn-success">EDIT</a>
                                    </td>
                                    <td>
                                        <form action="/books-delete/{{ $book->id }}" method="post">
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

