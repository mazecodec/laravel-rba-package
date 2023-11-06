@props([
'disabled' => false,
'options' => [],
'attributes' => [],
'defaultOption' => true,
'defaultOptionText' => 'Select a value'
])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
    @if($defaultOption)
        <option value="{{ null }}">{{ $defaultOptionText }}</option>
    @endif
    @foreach ((array) $options as $key => $value)
        <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>
