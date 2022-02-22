<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Order;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $customers = User::all()->where('is_admin', 0);
        $transactions = Order::select('arrival_image')->where('arrival_image', '!=', null)->get();
        $user = User::find(Auth::user()->id);
        return view('db-admin.index', compact('user', 'products', 'customers', 'transactions'));
    }

    // Profil
    public function avatar()
    {
        $user = auth()->user();
        return view('db-admin.profil.avatar', compact('user'));
    }

    public function detail()
    {
        $user = User::find(Auth::user()->id);
        return view('db-admin.profil.detail', compact('user'));
    }

    public function changepassword()
    {
        $user = User::find(Auth::user()->id);
        return view('db-admin.profil.changepassword', compact('user'));
    }

    // Order
    public function showorder($id)
    {
        $order = Order::find($id);
        $user = User::find(Auth::user()->id);
        return view('db-admin.purchase.showorder', compact('user', 'order'));
    }

    public function unpaid()
    {
        $orders = Order::all();
        $user = User::find(Auth::user()->id);
        $status = Order::where('status', 'not yet paid')->get();
        $status2 = Order::where('status', 'sent proof')->get();
        $status3 = Order::where('status', 'invalid')->get();
        return view('db-admin.purchase.unpaid', compact('user', 'orders', 'status', 'status2', 'status3'));
    }

    public function delivery()
    {
        $orders = Order::all();
        $user = User::find(Auth::user()->id);
        $status = Order::where('status', 'being packed')->get();
        $status2 = Order::where('status', 'item has been sent')->get();
        return view('db-admin.purchase.delivery', compact('user', 'orders', 'status', 'status2'));
    }

    public function history()
    {
        $orders = Order::all();
        $user = User::find(Auth::user()->id);
        $status = Order::where('status', 'complete')->get();
        $status2 = Order::where('status', 'canceled')->get();
        return view('db-admin.purchase.history', compact('user', 'orders', 'status', 'status2'));
    }
}
