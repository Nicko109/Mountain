    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('build/assets/app-041e359a.css') }}">
        <title>Показ списка гарантийных талонов</title>
    </head>
    <body>
    <div>
        <section class="content">
            <div class="row">
                <div class="col-10">
                    <div class="card">
                        <div class="card-body p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Номер</th>
                                    <th colspan="4" class="text-center">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($guarantees as $guarantee)
                                    <tr>
                                        <td>{{ $guarantee->id }}</td>
                                        <td>{{ $guarantee->number }}</td>
                                        <td class="text-center"> <a href="{{route('guarantees.show', $guarantee->id)}}" class="text-primary">Показать</a></td>
                                        <td class="text-center"> <a href="{{route('guarantees.edit', $guarantee->id)}}" class="text-success">Изменить</a></td>
                                        <td class="text-center">
                                            <form action="{{ route('guarantees.destroy', $guarantee->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent text-danger">
                                                    Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-2 mb-3">
                                    <a href="{{ route('guarantees.create') }}" class="btn btn-block btn-success">Добавить</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2 mb-3">
                                    <a href="{{ url('/') }}" class="btn btn-block btn-primary">Назад</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </body>
    </html>
