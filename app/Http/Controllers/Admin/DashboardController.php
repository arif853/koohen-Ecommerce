<?php

namespace App\Http\Controllers\Admin;

use App\Models\Campaign;
use App\Models\Order;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Products;
use App\Models\order_items;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $total_orders = Order::count();
        $products = Products::count();
        $category = Category::count();
        $customers = Customer::count();
        $pending_order = Order::where('status','pending')->count();
        $completed_order = Order::where('status','completed')->count();
        $campaign = Campaign::where('status','Published')->count();

        $orders = Order::where('status','pending')->latest()->get();
        $pending_orders = $orders->count();
        $sales = Order::where('status','completed')->sum('total');

        return view('admin.index',compact('orders','total_orders','sales','products','category','customers','pending_order','completed_order','campaign'));
    }

}
