<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('build/assets/app-041e359a.css') }}">
    <title>Изменение исполнителя</title>
</head>
<body>
<div>
    <section class="content">
        <div class="row">
            <div class="col-3">
            <form action="{{ route('performers.update', $performer->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Имя исполнителя</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $performer->name }}"
                    >
                    @error('name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" class="btn btn-success mt-3" value="Изменить">
                <div class="col-2 mt-3">
                    <a href="{{ route('performers.index') }}" class="btn btn-block btn-primary">Назад</a>
                </div>
            </form>
        </div>
        </div>
    </section>
</div>
</body>
</html>
