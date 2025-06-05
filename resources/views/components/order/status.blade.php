@props([
    'status'
])

<span class="text-white px-2 py-1 rounded {{ $status == \App\Enums\OrderStatus::NEW?'bg-orange-400':'bg-green-400' }}">
    {{ $status->getLabel() }}
</span>
