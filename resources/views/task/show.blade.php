<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build/assets/app-041e359a.css') }}">
    <title>Показ задачи</title>
</head>
<body>
<div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Описание</th>
                                <th>Категория</th>
                                <th>Дата выполнения</th>
                                <th>Статус задачи</th>
                                <th>Номер гарантийного талона</th>
                                <th colspan="4" class="text-center">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->category->title }}</td>
                                    <td>{{ $task->formatted_deadline }}</td>
                                    <td>{{ $task->formatted_is_finished }}</td>
                                    <td>{{ $task->guarantee->number }}</td>
                                    <td class="text-center"> <a href="{{route('tasks.edit', $task->id)}}" class="text-success">Изменить</a></td>
                                    <td class="text-center">
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="border-0 bg-transparent text-danger">
                                                Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-hover text-nowrap">
                            <tbody>
                            <thead>
                            <tr>
                                <th>Исполнители</th>
                            </tr>
                            </thead>
                            @foreach($task->performers as $performer)
                                <tr>
                                    <td>{{ $performer->name }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                        <div class="row">
                            <div class="col-2 mb-3">
                                <a href="{{ route('tasks.index') }}" class="btn btn-block btn-primary">Назад</a>
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
