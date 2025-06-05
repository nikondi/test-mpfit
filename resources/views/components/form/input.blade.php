@props([
    'label',
    'name',
    'required' => false
])
<label class="form-input{{ $required?' form-input--required':'' }}">
    <span class="form-input__label">{{ $label }}</span>
    {{ $slot }}

    @error($name)
        <x-form.error :message="$message"/>
    @enderror
</label>
