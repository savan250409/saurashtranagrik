{{-- Shared upload control. On edit the current file is kept unless a new one
     is chosen, so saving a form never silently clears an asset. --}}
@php
    $current = old($name, $record->{$name} ?? null);
    $isImage = ($type ?? 'image') === 'image';
@endphp

<div class="field {{ $full ?? false ? 'full' : '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <input id="{{ $name }}" type="file" name="{{ $name }}" accept="{{ $accept ?? 'image/*' }}">

    @if ($current)
        <div class="checkline" style="margin-top:8px">
            @if ($isImage)
                <img class="thumb" src="{{ asset($current) }}" alt="">
            @endif
            <span class="muted small">
                Current: <a href="{{ asset($current) }}" target="_blank" rel="noopener">{{ basename($current) }}</a>
            </span>
        </div>
        <p class="muted small" style="margin:6px 0 0">Leave empty to keep the current file.</p>
    @endif
</div>
