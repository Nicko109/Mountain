<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build/assets/app-041e359a.css') }}">
    <title>Показ категории</title>
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
                                <th colspan="4" class="text-center">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td class="text-center"> <a href="{{route('categories.edit', $category->id)}}" class="text-success">Изменить</a></td>
                                    <td class="text-center">
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
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
                                <th>Задачи</th>
                                <th>Номер гарантийного талона</th>
                            </tr>
                            </thead>
                            @foreach($category->tasks as $task)
                                <tr>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->guarantee->number }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                        <div class="row">
                            <div class="col-2 mb-3">
                                <a href="{{ route('categories.index') }}" class="btn btn-block btn-primary">Назад</a>
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
