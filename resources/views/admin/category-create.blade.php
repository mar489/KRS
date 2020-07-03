@extends('layouts.admin-menu')

@section('content')
<div class="container my-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="create-category col-sm-12 col-md-10 col-lg-7">
            <p class="form-title">Добавление категории</p>
            <form action="/create/category" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="supercategory_name" class="text-dark font-weight-bold col pl-0">Выберете надатегорию</label>
                    <select name="supercategory" id="supercategory_name" required>
                        @foreach($supercategories as $supercategory)
                        <option value="{{$supercategory->id}}">{{ $supercategory->supercategory_name}}</option>
                        @endforeach
                    </select>
                    @error('supercategory')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="category_name" class="text-dark font-weight-bold col pl-0">Название категории</label>
                    <input type="text" id="category_name" name="category_name" class="col-sm ml-0 pl-0" placeholder="Название категории" required>
                    @error('category_name')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button name="category-create-btn" class="border-0 p-1 w-100 category-create-btn">Добавить</button>
            </form>
        </div>
    </div>
</div>
@endsection
