<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandsResource;
use App\Models\Product;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderby('created_at', 'DESC');

        if (request()->has('search')) {
            $brands = $brands->where('name', 'like', '%' . request()->get('search') . '%');
        }

        return view('pages.brands', [
            'brands' => $brands->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.brand-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $validated['admin_id'] = auth()->user()->id;

        Brand::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'admin_id' => $validated['admin_id'],
        ]);

        return redirect()
            ->route('brands')
            ->with('success', 'Brand added successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('edit.brand', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->name = $request->get('name');
        $brand->description = $request->get('description');
        $brand->save();

        return redirect()
            ->route('brands')
            ->with('success', 'Brand Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()
            ->route('brands')
            ->with('success', 'Brand Deleted Successfully !');
    }

    public function allBrands(){
        return BrandsResource::collection(
            Brand::all()
        );
    }

}
