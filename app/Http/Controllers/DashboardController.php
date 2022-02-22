<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{
    public function avatar()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('db-admin.avatar');
        }

        $user = auth()->user();
        return view('dashboard.avatar', compact('user'));
    }
    
    public function detail()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('db-admin.detail');
        }

        $user = auth()->user();
        return view('dashboard.detail', compact('user'));
    }
    
    public function changedetail()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('db-admin.changedetail');
        }

        $user = auth()->user();
        return view('dashboard.changedetail', compact('user'));
    }
    
    public function changepassword()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('db-admin.changepassword');
        } 

        $user = auth()->user();
        return view('dashboard.changepassword', compact('user'));
    }
    
    public function unpaid()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('db-admin.unpaid');
        }

        $user = auth()->user();
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('status','DESC')->get();
        $status = Order::select()->where('status', 'not yet paid')->where('user_id', auth()->user()->id)->get();
        $status2 = Order::select()->where('status', 'invalid')->where('user_id', auth()->user()->id)->get();
        $status3 = Order::select()->where('status', 'sent proof')->where('user_id', auth()->user()->id)->get();
        return view('dashboard.unpaid', compact('orders', 'user', 'status', 'status2', 'status3'));
    }
    
    public function delivery()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('db-admin.delivery');
        } 

        $user = auth()->user();
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('status','ASC')->get();
        $status = Order::select()->where('status', 'being packed')->where('user_id', auth()->user()->id)->get();
        $status2 = Order::select()->where('status', 'item has been sent')->where('user_id', auth()->user()->id)->get();
        return view('dashboard.delivery', compact('user', 'orders', 'status', 'status2'));
    }
    
    public function history()
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('db-admin.history');
        } 

        $user = auth()->user();
        $orders = Order::where('user_id', auth()->user()->id)->orderBy('status','ASC')->get();
        $status = Order::select()->where('status', 'canceled')->where('user_id', auth()->user()->id)->get();
        $status2 = Order::select()->where('status', 'complete')->where('user_id', auth()->user()->id)->get();
        return view('dashboard.history', compact('user', 'orders', 'status', 'status2'));
    }

    public function showorder($id)
    {
        if (auth()->user()->is_admin == 1) {
            return redirect()->route('db-admin.showorder');
        }

        $user = auth()->user();
        $order = Order::find($id);
        $status = Order::select()->where('status', 'not yet paid', 'invalid')->where('user_id', auth()->user()->id)->get();
        return view('dashboard.showorder', compact('user', 'order', 'status'));
    }

}
