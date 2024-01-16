<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderRepository $orderRepository;
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        if($request->ajax()){
            return $this->orderRepository->list($customerId = '');
        }

        return view('admin.pages.customer-management.orders.list');

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $order = Order::findOrFail($id);
       return view('.admin.pages.customer-management.orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * getCustomerOrder
     *
     * @param  mixed $request
     * @param  mixed $customerId
     * @return void
     */
    public function getCustomerOrder(Request $request, $customerId)
    {
        if($request->ajax()){
            return $this->orderRepository->list($customerId);
        }

    }
}
