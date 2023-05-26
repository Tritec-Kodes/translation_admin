<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $order = Order::create([
            'user_id' => Auth::user()->id,
        ] + $request->all());

        if ($request->documents ) {
          
                Document::create([
                    'order_id' => $order->id,
                    'document' => $request->documents,
                ]);
            
        }

        return Api::setResponse('order', $order);
    }
}
