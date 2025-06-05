@extends('layout.default')

@section('content')
    <div class="container flex justify-end gap-x-2">
        <a href="{{ route('order.create') }}" class="btn">Создать заказ</a>
        <a href="{{ route('product.create') }}" class="btn">Создать товар</a>
    </div>
    <div class="container mt-6">
        {{ $products->links() }}
    </div>
    <div class="container mt-4">
        <table class="simple-table">
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Категория</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ format_price($product->price) }} р.</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <div class="flex gap-x-2 justify-end">
                            <a href="{{ route('product.show', [$product->id]) }}" class="btn">Посмотреть</a>
                            <a href="{{ route('product.edit', [$product->id]) }}" class="btn">Редактировать</a>
                            <x-product.delete-button :product_id="$product->id"/>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-400">Пусто...</td>
                </tr>
            @endforelse
            </tbody>
        </table>

    </div>
@endsection
