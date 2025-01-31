@props(['name', 'type' => 'button', 'class'])

<button {{ $attributes->merge(['type' => $type, 'class' => 'btn btn-'.$class]) }}>
    {{ $name }}
</button>
