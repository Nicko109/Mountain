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
            <div class="col-10">
                <div class="card">
                    <div class="card-body p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Наименование</th>
                                <th>Описание</th>
                                <th>Дата выполнения</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->deadline }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-2 mb-3">
                                <a href="{{ route('tasks.index') }}" class="btn btn-block btn-primary">Назад</a>
                            </div>
                        </div>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>