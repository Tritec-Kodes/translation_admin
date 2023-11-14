<?php

namespace App\Http\Controllers;

use App\Helpers\Report;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    public function allsales(){
        $sales = Order::orderByDesc('created_at')->get();
        return view('admin.sale.index')->with('sales',$sales);
    }

    public function companysales(Request $request){
        $start_date = $request->input('start_date');
        if($request->end_date)
            $end_date= $request->end_date;
        else
        $end_date = Carbon::now()->format('Y-m-d');
        $sales = Order::where('vendor_id',$request->period)->whereBetween('created_at',[$start_date,$end_date]) ->orderByDesc('created_at')->get();

        return view('admin.sale.index')->with('sales',$sales)->with('id',$request->id);
    }
}
