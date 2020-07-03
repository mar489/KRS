<li class="no-marks"><a href="" class="nav-link text-uppercase text-dark pb-0">Новинки</a></li>
    <ul class="pl-0 mb-0 no-marks">
        @foreach($supercategories as $supercategory)
            <li class="nav-item no-marks">
                <a href=""
                   class="nav-link text-uppercase text-dark pb-0">{{ $supercategory -> supercategory_name }}</a>
                <ul class="pl-lg-4">
                    @foreach($supercategory->categories as $category)
                        <li class="no-marks">
                            <a href="/catalog/{{ $supercategory->id }}/categories/{{ $category->id }}" class="text-muted ">{{$category -> category_name}}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
<li class="no-marks"><a href="" class="nav-link text-uppercase text-dark pb-0">Скидки</a></li>
