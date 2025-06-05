@extends('layout.default')

@section('content')
    <div class="container flex justify-end mt-6">
        <a href="{{ route('product.create') }}" class="btn">Создать</a>
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
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ format_price($product->price) }} р.</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <div class="flex gap-x-2 justify-end">
                            <a href="{{ route('product.show', [$product->id]) }}" class="btn btn--blue">Посмотреть</a>
                            <a href="{{ route('product.edit', [$product->id]) }}" class="btn btn--blue">Редактировать</a>
                            <form method="post" action="{{ route('product.destroy', [$product->id]) }}">
                                <button type="submit" class="btn btn--red">Удалить</button>
                                @method('DELETE')
                                @csrf
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
