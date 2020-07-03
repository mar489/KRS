@extends('layouts.admin-menu')

@section('content')

    <div class="container">
        <h3 class="mt-4 py-1">Редактирование категорий</h3>
        <div class="row my-3 py-3">
            @foreach($supercategories as $supercategory)
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="accordion pb-3" id="accordionExample{{ $supercategory -> id }}">
                        <div class="card">
                            <div class="card-header" id="a{{ $supercategory -> id }}">
                                <h5 class="mb-0">
                                    <button class="btn btn-link text-dark font-weight-bold" type="button"
                                            data-toggle="collapse" data-target="#b{{ $supercategory -> id }}"
                                            aria-expanded="false" aria-controls="b{{ $supercategory -> id }}">
                                        {{ $supercategory -> supercategory_name }}
                                    </button>
                                </h5>
                            </div>

                            <div id="b{{ $supercategory -> id }}" class="collapse"
                                 aria-labelledby="a{{ $supercategory -> id }}"
                                 data-parent="#accordionExample{{ $supercategory -> id }}">
                                <div class="card-body">
                                    <ul class="pl-3">
                                        @foreach($supercategory -> categories as $category)
                                            <li class="row">
                                                <span class="col-lg-10 col-md-9 col-sm-1">{{ $category -> category_name }}</span>
                                                <div class="d-flex justify-content-end">
                                                    <a href="/edit/category/{{ $category -> id }}" class="edit-btn border-0 px-2">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="post" action="/delete/category/{{ $category -> id }}" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="del-btn border-0 px-2">
                                                            <span class="fas fa-trash-alt"></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
