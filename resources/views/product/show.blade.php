@extends('layout.default')

@section('content')
    <div class="container flex justify-between">
        <h1 class="text-2xl">{{ $product->name }}</h1>
        <div class="flex gap-x-2">
            <a href="{{ route('product.edit', [$product->id]) }}" class="btn">Редактировать</a>
            <x-product.delete-button :product_id="$product->id"/>
        </div>
    </div>
    <div class="container mt-6">
        <table class="inline-table" style="max-width: 400px">
            <tbody>
            <tr>
                <th>Цена</th>
                <td>{{ format_price($product->price) }} р.</td>
            </tr>
            <tr>
                <th>Категория</th>
                <td>{{ $product->category?->name }}</td>
            </tr>
            <tr>
                <th>Описание</th>
                <td>{!! $product->description ?? '<div class="text-gray-400">Пусто</div>' !!}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
