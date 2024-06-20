<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\ProductsResource;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderby('created_at', 'DESC');

        if (request()->has('search')) {
            $products = $products->where('name', 'like', '%' . request()->get('search') . '%');
        }

        return view('pages.products', [
            'products' => $products->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('forms.product-form', [
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'quantity' => 'required',
            'image' => 'image',
            'sku' => 'required',
            'category' => 'required',
            'brand' => 'required',
        ]);

        $validated['admin_id'] = auth()->user()->id;

        if (request()->hasFile('image')) {
            $imagePath = request('image')->store('products', 'public');
            $validated['image'] = $imagePath;
        }

        Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'discount' => $validated['discount'],
            'quantity' => $validated['quantity'],
            'image' => $validated['image'],
            'sku' => $validated['sku'],
            'admin_id' => $validated['admin_id'],
            'category_id' => $validated['category'],
            'brand_id' => $validated['brand'],
        ]);

        return redirect()
            ->route('products')
            ->with('success', 'Product Added Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('edit.product', [
            'product' => $product,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $productUpdated = Product::find($product->id);

        $productUpdated->name = $request->get('name');
        $productUpdated->description = $request->get('description');
        $productUpdated->price = $request->get('price');
        $productUpdated->discount = $request->get('discount');
        $productUpdated->quantity = $request->get('quantity');
        $productUpdated->sku = $request->get('sku');
        $productUpdated->category_id = $request->get('category');
        $productUpdated->brand_id = $request->get('brand');
        $productUpdated->admin_id = Auth::user()->id;
        if(request()->has('image')){
            $imagePath = request()->file('image')->store('products', 'public');
            $image = $imagePath;
            Storage::disk('public')->delete($productUpdated->image ?? '');
        }
        $productUpdated->image = $image ?? $productUpdated->image;
        $productUpdated->save();

        return redirect()
            ->route('products')
            ->with('success', 'Product Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image ?? '');
        $admin_image = $product::get('image');
        $product->delete();

        return redirect()
            ->route('products')
            ->with('success', 'Product Deleted Successfully !');
    }

    public function allProducts(){
        return ProductsResource::collection(
            Product::query()
            ->orderBy('created_at', 'desc')
            ->get()
        );
    }

    public function allProductsFlutter(){
        return Product::all();
    }

    public function searchProducts(Request $request){
        $products = Product::query()
            ->orderBy('created_at', 'desc')
            ->where('name', 'like', '%' . $request->input('search') . '%')
            ->get();

        return ProductsResource::collection(
            $products
        );
    }

    public function sevenProducts(){
        $products = Product::latest()->limit(7)->get();
        return ProductsResource::collection(
            $products
        );
    }

    public function sevenProductsDiscount(){
        $products = Product::query()
        ->orderBy('created_at', 'desc')
        ->where('discount', '<>', 0)
        ->get();

        return ProductsResource::collection(
            $products
        );
    }
}
