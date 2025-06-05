<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatus;
use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = Order::query()
            ->latest()
            ->paginate(20);

        return page()
            ->title('Заказы')
            ->render('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $products = Product::all();

        return page()
            ->title('Создать заказ')
            ->render('order.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param OrderCreateRequest $request
     * @return RedirectResponse
     */
    public function store(OrderCreateRequest $request)
    {

        Order::make($request)
            ->validate()
            ->save();

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return Response
     */
    public function show(Order $order)
    {
        $order->load('product');

        return page()
            ->title('Заказ #'.$order->id.' от '.$order->created_at->format('d.m.Y H:i:s'))
            ->render('order.show', compact('order'));
    }

    public function complete(Order $order)
    {
        $order->update([
            'status' => OrderStatus::DONE
        ]);

        return back();
    }
}
