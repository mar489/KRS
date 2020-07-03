<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Category;
use App\Supercategory;

class CategoryController extends Controller
{
    public function edit(Category $category)
    {
        return view('admin.category-edit', [
            'category' => $category,
        ]);
    }

    public function update(CategoryStoreRequest $request, Category $category)
    {
        $category->update([
            'category_name' => $request -> category_name,
            'supercategory_name' => $request -> supercategory_name
        ]);
        return redirect('/result')->with(['name'=>'Изменение категории', 'result' => 'Категория успешно изменена']);
    }

    public function show(Supercategory $supercateg, Category $category)
    {
        return view('category', [
            'supercateg'=> $supercateg,
            'category' => $category,
        ]);
    }

    public function create()
    {
        $supercat = Supercategory::all();

        return view('admin.category-create', [
            'supercategories'=>$supercat,
        ]);
    }

    public function store(CategoryStoreRequest $request)
    {
        Category::create([
            'supercategory_id'=>$request->supercategory,
            'category_name' => $request->category_name,
            ]);

        return redirect('/result')->with(['name'=>'Создание категории', 'result' => 'Категория успешно создана']);

    }

    public function destroy(Category $category)
    {
        $category->update([
            'delete' => 1
        ]);

        return redirect('/result')->with(['name'=>'Удаление категории', 'result' => 'Категория успешно удалена']);
    }
}
