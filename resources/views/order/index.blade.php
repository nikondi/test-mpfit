@extends('layout.default')

@section('content')
    <div class="container flex justify-end">
        <a href="{{ route('order.create') }}" class="btn">Создать заказ</a>
    </div>
    <div class="container mt-6">
        {{ $orders->links() }}
    </div>
    <div class="container mt-4">
        <table class="simple-table">
            <thead>
            <tr>
                <th>Номера заказа</th>
                <th>Дата создания</th>
                <th>ФИО покупателя</th>
                <th>Статус заказа</th>
                <th>Итоговая цена</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d.m.Y H:i:s') }}</td>
                    <td>{{ $order->customer }}</td>
                    <td>
                        <x-order.status :status="$order->status"/>
                    </td>
                    <td>
                        {{ format_price($order->final_price) }} р.
                    </td>
                    <td>
                        <div class="flex gap-x-2 justify-end">
                            <a href="{{ route('order.show', [$order->id]) }}" class="btn">Посмотреть</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-400">Пусто...</td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
@endsection
