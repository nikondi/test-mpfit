@extends('layout.default')

@section('content')
    <div class="container">
        <div class="text-2xl mb-6">Создать заказ</div>
        <form action="{{ route('order.store') }}" method="post">
            <div class="flex flex-col gap-y-2 mb-4">
                <x-form.input name="customer" label="ФИО покупателя" required>
                    <input type="text" name="customer" placeholder="ФИО покупателя" value="{{ old('customer') }}" required />
                </x-form.input>

                <x-form.input name="product_id" label="Товар" required>
                    <select name="product_id" required>
                        <option value="" disabled {{ !old('product_id')?'selected':'' }}>Товар</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id?' selected':'' }}>
                                {{ $product->name }} ({{ format_price($product->price) }} р.)
                            </option>
                        @endforeach
                    </select>
                </x-form.input>

                <x-form.input name="created_at" label="Дата создания">
                    <input type="date" name="created_at" placeholder="Кол-во" value="{{ old('created_at') ?? '1' }}">
                </x-form.input>

                <x-form.input name="quantity" label="Кол-во">
                    <input type="number" min="1" step="1" name="quantity" placeholder="Кол-во" value="{{ old('quantity') ?? '1' }}">
                </x-form.input>

                <x-form.input name="comment" label="Комментарий">
                    <textarea name="comment" placeholder="Комментарий">{{ old('comment') }}</textarea>
                </x-form.input>
            </div>

            <button type="submit" class="btn">Создать</button>

            @error('final_price')
                <div class="mt-4">
                    <x-form.error :message="$message"/>
                </div>
            @enderror

            @csrf
        </form>
    </div>
@endsection
