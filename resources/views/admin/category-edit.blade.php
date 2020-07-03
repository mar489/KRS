@extends('layouts.admin-menu')

@section('content')
<div class="container my-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="create-category col-sm-12 col-md-10 col-lg-7">
            <p class="form-title">Редактирование категории</p>
            <form action="/edit/category/{{$category -> id}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group mb-4">
                    <label for="supercategory_name" class="text-dark font-weight-bold col pl-0">Выберете надатегорию</label>
                    <select name="supercategory" id="supercategory_name">
                        @foreach($supercategories as $supercategory)
                            @if ($supercategory -> id == $category -> supercategory -> id )
                                <option selected value="{{$supercategory -> id}}">{{ $supercategory -> supercategory_name}}</option>
                            @else
                                <option value="{{$supercategory -> id}}">{{ $supercategory -> supercategory_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="category_name" class="text-dark font-weight-bold col pl-0">Название категории</label>
                    <input type="text" id="category_name" name="category_name" value="{{ $category -> category_name }}" class="col-sm ml-0 pl-0" placeholder="Название категории" required>
                </div>
                <button name="category-create-btn" class="border-0 p-1 w-100 category-create-btn">Изменить</button>
            </form>
        </div>
    </div>
</div>
@endsection
