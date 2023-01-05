<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\ProductGallery;

class DashboardProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['galleries', 'category'])->where('users_id', auth()->user()->id)
                    ->get();

        return view('pages.dashboard-products', [
            'products' => $products,
        ]);
    }

    public function detail(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user', 'category'])->findOrFail($id);
        $categories = Category::all();

        return view('pages.dashboard-products-details', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function uploadGallery(Request $request)
    {
        $data = $request->all();

        $data['photo'] = $request->file('photo')->store('assets/product','public');

        ProductGallery::create($data);

        return redirect()->route('dashboard-products-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-products-details', $item->products_id);
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.dashboard-products-create', [
            'categories' => $categories,
        ]);
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->name);
        $product = Product::create($data);

        $gallery = [
            'products_id' => $product->id,
            'photo' => $request->file('photo')->store('assets/product','public')
        ];

        ProductGallery::create($gallery);

        return redirect()->route('dashboard-products');
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Product::findOrFail($id);

        $data['slug'] = Str::slug($request->name);

        // if ($request['email'] !== $item->email) {
        //     $data['email'] = $request->email;
        // } else {
        //     $item->forceFill([
        //         'email' => $request['email'],
        //     ])->save();
        // }

        $item->update($data);

        return redirect()->route('dashboard-products');
    }
}