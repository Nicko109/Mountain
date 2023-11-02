<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build/assets/app-041e359a.css') }}">
    <title>Изменение задачи</title>
</head>
<body>
<div>
    <section class="content">
        <div class="row">
            <div class="col-3">
            <form action="{{ route('tasks.update', $task->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Наименование</label>
                    <input type="text" name="title" class="form-control"
                           value="{{ $task->title }}"
                    >
                    @error('title')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" placeholder="Описание задачи">{{ $task->description }}</textarea>
                    @error('description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group w-75">
                    <label for="deadline">Дата выполнения задачи</label>
                    <div class="input-group">
                        <input type="date" class="form-control" name="deadline"
                               value="{{ $task->deadline }}">

                    </div>
                    @error('deadline')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <input id="isFinished" type="checkbox" name="is_finished"
                        {{ $task->is_finished ? ' checked' : ''}}
                    >
                    <label for="isFinished">Выполнена</label>
                    @error('is_finished')
                    <div>
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-success mt-3" value="Изменить">
                <div class="col-2 mt-3">
                    <a href="{{ route('tasks.index') }}" class="btn btn-block btn-primary">Назад</a>
                </div>
            </form>
        </div>
        </div>
    </section>
</div>
</body>
</html>
