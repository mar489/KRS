<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use App\Sizes;
use App\Supercategory;
use Illuminate\Http\Request;
use App\Category;
use App\Characteristics;
use App\Img;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    public function show(Supercategory $supercateg, Category $category, Product $product)
    {
        if ($product->delete === 1){
            return abort(404);
        }
        $sizes = Sizes::all();

        return view('product-cart', [
            'supercateg' => $supercateg,
            'category' => $category,
            'product' => $product,
            'sizes' => $sizes
        ]);

    }

    public function create()
    {
        $categories = Category::where('delete', 0)->get();

        return view('admin.product-create', [
            'categories' => $categories,
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $path = 'storage' . $request->file('img')->store('uploads', 'public');

        $img = Img::create([
            'path' => $path
        ]);

        $charact = Characteristics::create([
            'brand' => $request->brand,
            'weight' => $request->weight,
            'material' => $request->material,
        ]);

        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->product_price,
            'description' => $request->product_descr,
            'is_available' => $request->is_available,
            'status' => $request->product_status,
            'category_id' => $request->category_name,
            'color' => $request->color,
            'code' => $request->product_code,
            'characteristics_id' => $charact->id,
            'img_id' => $img->id,
        ]);

        return redirect('/result')->with(['name' => 'Добавление товара', 'result' => 'Товар успешно добавлен']);
    }

    public function edit(Product $product)
    {
        return view('admin.product-edit', [
            'categories' => Category::all(),
            'product' => $product,
            'sizes' => Sizes::all()
        ]);
    }

    public function update(ProductUpdateRequest $request, Product $product)
    {
        if (!empty($request->file('img'))) {
            $path = 'storage/' . $request->file('img')->store('uploads', 'public');

            $img = Img::create([
                'path' => $path
            ]);
        }

        $charact = $product->characteristics->update([
            'brand' => $request->brand,
            'weight' => $request->weight,
            'material' => $request->material,
        ]);
        if (isset($img)) {
            $product->update([
                'product_name' => $request->product_name,
                'price' => $request->product_price,
                'description' => $request->product_descr,
                'is_available' => $request->is_available,
                'status' => $request->product_status,
                'category_id' => $request->category_name,
                'color' => $request->color,
                'code' => $request->product_code,
                'img_id' => $img->id,
            ]);
        } else {
            $product->update([
                'product_name' => $request->product_name,
                'price' => $request->product_price,
                'description' => $request->product_descr,
                'is_available' => $request->is_available,
                'status' => $request->product_status,
                'category_id' => $request->category_name,
                'color' => $request->color,
                'code' => $request->product_code,
            ]);
        };
        return redirect('/result')->with(['name' => 'Изменение товара', 'result' => 'Товар успешно изменён']);
    }

    public function watch(Request $request)
    {
        if ($request->category) {
            return view('admin.product-watch', [
                'category' => Category::find($request->category),
                'products' => Category::find($request->category)->products,
            ]);

        } else {
            return view('admin.product-watch');
        }
    }

    public function destroy(Product $product)
    {
        $product->update([
            'delete' => 1
        ]);

        return redirect('/result')->with(['name'=>'Удаление товара', 'result' => 'Товар успешно удалён']);
    }

    public function favourites(Request $request)
    {
        return view('favourites', [
            'products' => Product::findMany(json_decode($_COOKIE['liked_prod']))
        ]);
    }

    public function mainpage()
    {
        $new = Product::where('status', 2)->latest()->take(10)->get();
        $sale = Product::where('status', 1)->latest()->take(10)->get();

        return view('index', [
            'new' => $new,
            'sale' => $sale
        ]);
    }

    public function sales()
    {
        $sales = Product::where('status', 1)->where('is_available', 1)->latest()->get();

        return view('sales', [
            'sales' => $sales
        ]);
    }
}



