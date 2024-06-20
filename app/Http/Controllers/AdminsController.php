<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        $logInUser = $admin::find(auth()->user()->id);

        $auth_image = ('storage/' . $logInUser->image);
        $auth_first_name = $logInUser->first_name;
        $auth_last_name = $logInUser->last_name;
        $email = $logInUser->email;

        $admin = Admin::find($logInUser->id);
        $numberOfCategories = $admin->categories()->count();
        $numberOfBrands = $admin->brands()->count();
        $numberOfProducts = $admin->products()->count();

        return view('pages.profile', [
            'image' => $auth_image,
            'first_name' => $auth_first_name,
            'last_name' => $auth_last_name,
            'email' => $email,
            'categories_number' => $numberOfCategories,
            'brands_number' => $numberOfBrands,
            'products_number' => $numberOfProducts,
            'admin' => $admin,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('edit.profile', [
            'admin' => $admin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $updateAdmin = Admin::find(auth()->user()->id);
        $updateUser = User::find(auth()->user()->id);

        if(request()->has('image')){
            $imagePath = request()->file('image')->store('profile', 'public');
            $image = $imagePath;
            Storage::disk('public')->delete($updateAdmin->image ?? '');
        }

        $updateAdmin->first_name = request()->get('first_name');
        $updateAdmin->last_name = request()->get('last_name');
        $updateAdmin->email = request()->get('email');
        $updateAdmin->image = $image ?? $updateAdmin->image;
        $updateAdmin->save();

        $updateUser->name = request()->get('first_name');
        $updateUser->email = request()->get('email');
        $updateUser->save();

        return redirect()
            ->route('Profile')
            ->with('success', 'Profile Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
