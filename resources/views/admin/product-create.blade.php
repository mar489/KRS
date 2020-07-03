@extends('layouts.admin-menu')

@section('content')

    <div class="container my-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="create-product col-sm-12 col-md-10 col-lg-7">
                <p class="form-title">Добавление товара</p>
                <form action="/create/product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group selector-form">
                        <label for="categ" class="col pl-0 text-dark font-weight-bold">Выберете категорию</label>
                        <select id="categ" name="category_name" required>
                            <option value="" selected disabled hidden>Выберите категорию</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{ $category->category_name }}- {{ $category -> supercategory -> supercategory_name }}</option>
                            @endforeach
                        </select>
                        @error('category_name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_name" class="text-dark font-weight-bold">Введите название</label>
                        <input type="text" id="product_name" name="product_name" class="col m-0 pl-0" placeholder="Название товара"
                               value="{{old('product_name')}}" required>
                        @error('product_name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_code" class="text-dark font-weight-bold">Введите артикул</label>
                        <input type="text" id="product_code" name="product_code" class="col m-0 pl-0"
                               placeholder="Артикул товара" required value="{{old('product_code')}}">
                        @error('product_code')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_price" class="text-dark font-weight-bold">Введите цену товара, руб</label>
                        <input type="number" min="0" id="product_price" name="product_price"
                               class="col-sm m-0 pl-0 @error('product_price') is_invalid @enderror" placeholder="Цена"
                               required value="{{old('product_price')}}">
                        @error('product_price')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="characteristics" class="text-dark font-weight-bold col pl-0">Характеристики</label>
                        <div class="row justify-content-between mb-3">
                            <input type="text" id="color" name="color" class="col-sm p-0" placeholder="Цвет" required value="{{old('color')}}">
                            @error('color')
                            <div class="invalid-feedback ml-3" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="text" id="material" name="material" class="col-sm p-0" placeholder="Материал" required value="{{old('material')}}">
                            @error('material')
                            <div class="invalid-feedback ml-3" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="row justify-content-between mb-3">
                            <input type="text" id="brand" name="brand" class="col-sm p-0" placeholder="Бренд" required value="{{old('brand')}}">
                            @error('brand')
                            <div class="invalid-feedback ml-3" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <input type="number" min="0" id="weight" name="weight" class="col-sm p-0" placeholder="Вес, г" value="{{old('weight')}}">
                            @error('weight')
                            <div class="invalid-feedback ml-3" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_descr" class="text-dark font-weight-bold col pl-0">Описание</label>
                        <textarea type="textarea" id="product_descr" name="product_descr" rows="5" class="col p-0" placeholder="Описание товара" maxlength="1000"
                                  required>{{old('product_descr')}}</textarea>
                        @error('product_descr')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="is_available" class="text-dark font-weight-bold col pl-0">В наличии?</label>
                        <input type="radio" id="is_available" name="is_available" value="1" class="col-1 m-0 pl-0" required>Да
                        <input type="radio" id="is_available" name="is_available" value="0" class="col-1 m-0 pl-0" required>Нет
                        @error('is_available')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="product_status" class="text-dark font-weight-bold col pl-0">Статус</label>
                        <select type="text" id="" name="product_status">
                            <option value="0" selected>Без особого статуса</option>
                            <option value="1">Скидки</option>
                            <option value="2">Новинки</option>
                            <option value="3">Рекомендации</option>
                        </select>
                        @error('product_status')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-4">
                        <label for="img_path" class="text-dark font-weight-bold col pl-0">Выберите изображение</label>
                        <input type="file" id="img_path" name="img" class="col p-0"
                               accept="image/jpeg, image/png, image/jpg" required>
                        @error('product-img')
                        <div class="invalid-feedback d-block">{{ $errors->first('product-img') }}</div>
                        @enderror
                    </div>
                    <button name="product-create-btn" class="border-0 p-1 w-100 product-create-btn">Добавить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
