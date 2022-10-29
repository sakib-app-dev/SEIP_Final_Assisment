@props(['name','label' => '','cols','rows',])
{{-- dd({{ $attributes}}); --}}

<div class="mb-3">
    @if($label)
        <label for="{{ $name }}Input" class="form-label">{{ $label }}</label>
    @endif


    <textarea 
    name="{{ $name }}" 
    id="{{ $name }}Input" 
    value="{{ old($name) }}"
    cols="{{ $cols }}" 
    rows="{{ $rows }}" 
    {{ $attributes->merge(['class' => 'form-control']) }} 
    ></textarea>

    @error($name)
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror

</div>