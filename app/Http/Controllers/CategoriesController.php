<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoriesResource;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderby('created_at', 'DESC');

        if(request()->has('search')){
            $categories = $categories->where('name' , 'like', '%' . request()->get('search') . '%');
        }

        return view('pages.categories', [
            'categories' => $categories->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forms.category-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $validated['admin_id'] = auth()->user()->id;

        Category::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'admin_id' => $validated['admin_id'],
        ]);

        return redirect()
            ->route('categories')
            ->with('success', 'Category Added Successfully !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('edit.category', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        $category->save();

        return redirect()
            ->route('categories')
            ->with('success', 'Category Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories')
            ->with('success', 'Category Deleted Successfully !');
    }

    public function allCategories(){
        return CategoriesResource::collection(
            Category::all()
        );
    }
}
