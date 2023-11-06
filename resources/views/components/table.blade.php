@props([
    'header',
    'body',
    'footer',
])

<table {{ $attributes->class(['w-full']) }}>
    <thead {{ $header->attributes->class(['text-lg']) }}>
        {{$header}}
    </thead>
    <tbody {{ $body->attributes->class(['text-md']) }}>
        {{$body}}
    </tbody>
    @if(isset($footer))
        <tfoot {{ $footer->attributes->class(['text-sm']) }}>
            {{$footer}}
        </tfoot>
    @endif
</table>
