@extends('layout.default')

@section('content')
    <div class="container flex justify-between">
        <h1 class="text-2xl">Заказ #{{ $order->id }} от {{  $order->created_at->format('d.m.Y H:i:s') }}</h1>
        <div class="flex gap-x-2">
            @if($order->status == \App\Enums\OrderStatus::NEW)
                <a href="{{ route('order.complete', [$order->id]) }}" class="btn btn--green">Завершить</a>
            @endif
        </div>
    </div>
    <div class="container mt-6">
        <table class="inline-table" style="max-width: 600px">
            <tbody>
            <tr>
                <th>Статус</th>
                <td><x-order.status :status="$order->status"/></td>
            </tr>
            <tr>
                <th>ФИО покупателя</th>
                <td>{{ $order->customer }}</td>
            </tr>
            <tr>
                <th>Дата создания</th>
                <td>{{ $order->created_at->format('d.m.Y H:i:s') }}</td>
            </tr>
            <tr>
                <th>Итоговая цена</th>
                <td>{{ format_price($order->final_price) }} р.</td>
            </tr>
            <tr>
                <th>Товар</th>
                <td>
                    <a href="{{ route('product.show', [$order->product_id]) }}" class="underline text-blue-500">{{ $order->product?->name }}</a>
                    <span class="text-gray-500">({{ format_price($order->product->price) }} р.)</span> x{{ $order->quantity }}
                </td>
            </tr>
            <tr>
                <th>Комментарий</th>
                <td>
                    @if(empty($order->comment))
                        <div class="text-gray-500">Пусто</div>
                    @else
                        <pre>{{ $order->comment }}</pre>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
