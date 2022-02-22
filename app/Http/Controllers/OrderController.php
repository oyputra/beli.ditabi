<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\OrderStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function create($id)
    {
        //
        if (auth()->user()->is_admin == 1) {
            return redirect()->back()->with('status', 'Sorry, admin can not order products!');
        }

        $product = Product::find($id);
        return view('order.create', compact('product'));
    }

    public function store(OrderStoreRequest $request)
    {
        //
        if ( empty($request->message) ) {
            Order::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'invoice' => $this->generateUniqueCode(),
                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'phone' => $request->phone,
            ]);
        } else {
            Order::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
                'invoice' => $this->generateUniqueCode(),
                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);
        }
        return redirect()->route('dashboard.unpaid')->with('status','Product ordered successfully!');
    }

    public function generateUniqueCode()
    {
        $invoice = 0;
        do {
            $invoice = random_int(100000, 999999);
        } while (Order::where('invoice', '=', $invoice)->first());
  
        return $invoice;
    }

    public function status(Request $request, $id)
    {
        $order = Order::find($id);
        Order::where('id',$id)->update(['status' => $request->status]);
        
        return back()->with('status', 'Status transaksi telah diubah!'); 

    }

    public function sentproof(Request $request,$id)
    {
        $order = Order::find($id);
        
        if (!empty($order->transaction_image)) {
            $oldimage = $order->transaction_image;
            Storage::delete($oldimage);
        }

        $path = $request->transaction_image->store('public/sentproof');

        $order->transaction_image = $path;
        $order->transaction_date = $request->transaction_date;
        $order->status = 'sent proof';
        $order->update();

        return redirect()->route('dashboard.unpaid')->with('status','Proof of transaction has been sent successfully!');
    }
    
    public function itemhasbeensent(Request $request,$id)
    {
        $order = Order::find($id);
        
        if (!empty($order->delivery_image)) {
            $oldimage = $order->delivery_image;
            Storage::delete($oldimage);
        }

        $path = $request->delivery_image->store('public/itemhasbeensent');

        $order->delivery_image = $path;
        $order->estimated_date = $request->estimated_date;
        $order->delivery_date = $request->delivery_date;
        $order->status = 'item has been sent';
        $order->update();

        return redirect()->route('db-admin.delivery')->with('status','Proof of delivery/receipt has been sent successfully!');
    }
    
    public function arrival(Request $request,$id)
    {
        $order = Order::find($id);
        
        if (!empty($order->arrival_image)) {
            $oldimage = $order->arrival_image;
            Storage::delete($oldimage);
        }

        $path = $request->arrival_image->store('public/arrival');

        $order->arrival_image = $path;
        $order->arrival_date = $request->arrival_date;
        $order->status = 'complete';
        $order->update();

        return redirect()->route('dashboard.history')->with('status','Congratulations, you have completed your order!!');
    }
}
