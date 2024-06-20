<?php

namespace App\Http\Controllers;

use App\Charts\Informations;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Client;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $products_number = Product::all()->count();
        $categories_number = Category::all()->count();
        $brands_number = Brand::all()->count();
        $orders_number = Order::all()->count();
        $clients_number = Client::all()->count();
        $admins_number = Admin::all()->count();
        $messages_number = Message::all()->count();

        $logInUser = Admin::find(auth()->user()->id);
        $auth_image = ('storage/' . $logInUser->image);

        $auth_name = ($logInUser->first_name . ' ' . $logInUser->last_name);

        $chart = new Informations();
        $chart->labels(['products', 'categories', 'brands', 'orders', 'clients', 'admins', 'messages']);
        $chart->dataset('web site information', 'bar', [ //polarArea   pie   doughnut
            $products_number,
            $categories_number,
            $brands_number,
            $orders_number,
            $clients_number,
            $admins_number,
            $messages_number,
        ])->backgroundColor([
            'rgb(220, 53, 69)',
            'rgb(255, 193, 7)',
            'rgb(13, 202, 240)',
            'rgb(25, 135, 84)',
            'rgb(70, 70, 70)',
            '#15f4ee',
            '#A3C1AD',
        ]);

        $chart_circle = new Informations();
        $chart_circle->labels(['products', 'categories', 'brands', 'orders', 'clients', 'admins', 'messages']);
        $chart_circle->dataset('web site information', 'polarArea', [ //polarArea   pie   doughnut
            $products_number,
            $categories_number,
            $brands_number,
            $orders_number,
            $clients_number,
            $admins_number,
            $messages_number,
        ])->backgroundColor([
            'rgb(220, 53, 69)',
            'rgb(255, 193, 7)',
            'rgb(13, 202, 240)',
            'rgb(25, 135, 84)',
            'rgb(70, 70, 70)',
            '#15f4ee',
            '#A3C1AD',
        ]);

        if (request()->has('search')) {
            $products = Product::orderby('created_at', 'DESC');
            $products = $products->where('name', 'like', '%' . request()->get('search') . '%');
            return view('pages.products', [
                'products' => $products->paginate(4),
            ]);
        }


        return view('dashboard', [
            'products_number' => $products_number,
            'categories_number' => $categories_number,
            'brands_number' => $brands_number,
            'orders_number' => $orders_number,
            'image' => $auth_image,
            'fullName' => $auth_name,
            'chart' => $chart,
            'chart_circle' => $chart_circle,
        ]);
    }
}
