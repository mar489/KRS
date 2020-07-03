@extends('layouts.admin-menu')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h3 class="mt-4 py-1">Все товары</h3>
            </div>
        </div>
        <div class="row my-3 py-3">
            <div class="col">
                <form method="get">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="super">Надкатегория</label>
                            <select id="super" name="supercategory" class="form-control" required>
                                <option value="" selected disabled hidden>Выберите надкатегорию</option>
                                @foreach($supercategories as $supercategory)
                                    <option value="{{$supercategory->id}}">{{$supercategory->supercategory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="categ">Категория</label>
                            <select id="categ" name="category" class="form-control" disabled required>
                                <option value="" selected disabled hidden>Выберите категорию</option>
                                @foreach($supercategories as $supercategory)
                                    @foreach($supercategory->categories as $categorq)
                                        <option value="{{$categorq->id}}"
                                                parent="{{$supercategory->id}}">{{$categorq->category_name}}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3 mt-auto h-50">
                            <button type="submit" class="border-0 p-2 w-100 my-auto">
                                Просмотреть
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if(!empty($category->category_name))
            <div class="row pb-3">
                <div class="col">
                    <h4 class="pt-1 font-weight-bold">{{$category->supercategory->supercategory_name}}</h4>
                    <h5>{{$category->category_name}}</h5>
                </div>
            </div>
            @if(!empty($products[0]))
                <div class="row">
                    @foreach($products as $item)
                        <div class=" col-md-6 col-xl-4 mb-3">
                            <div class="card h-100">
                                <div class="row no-gutters h-100">
                                    <div class="col-4">
                                        <img src="{{asset($item->img->path)}}" class="card-img h-100"
                                             alt="{{$item->product_name}}" style="object-fit: cover">
                                    </div>
                                    <div class="col-8">
                                        <div class="card h-100 border-0">
                                            <div class="card-body h-100">
                                                <h6 class="card-title"><a class="text-dark"
                                                                          href="/catalog/{{$category->supercategory->id}}/categories/{{$category->id}}/{{$item->id}}">{{$item->product_name}}</a>
                                                </h6>
                                                <p class="card-text text-danger">{{$item->price}} &#8381</p>
                                                @if($item -> is_available)
                                                    <p class="card-text text-success mb-auto">
                                                        <i class="fas fa-check"></i>
                                                        <span>В наличии</span>
                                                    </p>
                                                @else
                                                    <p class="card-text text-danger mb-auto">
                                                        <i class="fas fa-times"></i>
                                                        <span>Нет в наличии</span>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="card-footer text-right">
                                                <a href="/edit/product/{{ $item -> id }}"
                                                   class="edit-btn border-0 px-2">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form method="post" action="/delete/product/{{ $item -> id }}" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="del-btn border-0 px-2">
                                                        <span class="fas fa-trash-alt"></span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @else
                <div class="row">
                    <div class="col">
                        <h6> Нет товаров. <a href="/create/product"> Добавить</a></h6>
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        $('#super').val('');
        $('#categ').val('');
        $('#categ option').hide();
        $('#categ').prop('disabled', true);
        $('#super').change(function () {
            $('#categ').val('');
            $('#categ').prop('disabled', false);
            $('#categ option').hide();
            $('#categ option[parent="' + $(this).val() + '"]').show()
        });
    </script>
@endsection