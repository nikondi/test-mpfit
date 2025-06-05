@props([
    'product_id'
])

<form method="post" action="{{ route('product.destroy', [$product_id]) }}" onsubmit="return confirm('Точно удалить?')">
    <button type="submit" class="btn btn--red">Удалить</button>
    @method('DELETE')
    @csrf
</form>
