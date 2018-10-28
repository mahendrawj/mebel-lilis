<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only'=>['index', 'viewOrders']]);
        $this->middleware('role:customer', ['only' => 'viewOrders']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->get('status');
        $orders = Order::where('status', 'LIKE', '%'.$status.'%');
        if ($request->has('q')) {
            $q = $request->get('q');
            $orders = $orders->where(function($query) use ($q) {
                $query->where('id', $q)
                    ->orWhereHas('user', function($user) use ($q) {
                        $user->where('name', 'LIKE', '%'.$q.'%');
                    });
            });
        }
        // dd($orders->toSql());
        
        $orders = $orders->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('home', compact('orders', 'status', 'q'));
    }

    public function viewOrders(Request $request)
    {
        $q = $request->get('q');
        $status = $request->get('status');
        $orders = auth()->user()->orders()
            ->where('id', 'LIKE', '%'. $q . '%')
            ->where('status', 'LIKE', '%' . $status . '%')
            ->orderBy('updated_at')
            ->paginate(5);
        return view('customer.view-orders')->with(compact('orders', 'q', 'status'));
    }
}
