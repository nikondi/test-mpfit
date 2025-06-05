@extends('layout.default')

@section('content')
    <div class="container">
        <div class="text-2xl mb-6">{{ $mode == 'create'?'Создать товар':'Редактировать '.$product->name }}</div>
        <form action="{{ $mode == 'edit'?route('product.update', [$product->id]):route('product.store') }}" method="post">
            <div class="flex flex-col gap-y-2 mb-4">
                <x-form.input name="name" label="Название" required>
                    <input type="text" name="name" placeholder="Название" value="{{ $mode == 'edit'?$product->name:old('name') }}" required>
                </x-form.input>

                <x-form.input name="price" label="Цена" required>
                    <input type="number" step="0.01" min="0" name="price" placeholder="Цена" value="{{ $mode == 'edit'?$product->price:old('price') }}" required>
                </x-form.input>

                <x-form.input name="description" label="Описание">
                    <textarea name="description" placeholder="Описание">{{ $mode == 'edit'?$product->description:old('description') }}</textarea>
                </x-form.input>

                <x-form.input name="category_id" label="Категория" required>
                    <select name="category_id" required>
                        <option value="" disabled {{ ($mode == 'create' && !old('category_id'))?'selected':'' }}>Категория</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ (($mode == 'edit' && $product->category_id == $category->id) || old('category_id') == $category->id)?' selected':'' }}
                            >
                                    {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </x-form.input>
            </div>

            <button type="submit" class="btn">{{ $mode == 'create'?'Создать':'Сохранить' }}</button>

            @if($mode == 'edit')
                @method('PUT')
            @endif
            @csrf
        </form>
    </div>
@endsection
