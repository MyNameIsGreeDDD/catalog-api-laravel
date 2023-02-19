@extends('layouts.admin')
@section('content')
    <form method="POST" action="{{ route("admin.reviews.store",$product) }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="formFileMultiple" class="form-label">Имя</label>
            <input class="form-control" type="text" name="first_name" required>
        </div>

        <div>
            <label for="formFileMultiple" class="form-label"> Текст</label>
            <input class="form-control" type="text" name="text" required>
        </div>

        <div class="mb-3">
            <label for="formFileMultiple" class="form-label">Прикрепить изображения</label>
            <input class="form-control" type="file" id="img" name="img[]" multiple>
        </div>
        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                Сохранить
            </button>
        </div>
    </form>

@endsection
