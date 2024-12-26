@props(['active'])

@php
$classes = ($active ?? false)
            ? 'navbar-brand'
            : 'navbar-brand';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
