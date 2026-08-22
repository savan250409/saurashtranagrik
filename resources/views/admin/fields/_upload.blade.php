{{-- Shared upload control. On edit the current file is kept unless a new one
     is chosen, so saving a form never silently clears an asset. --}}
@php
    $current = old($name, $record->{$name} ?? null);
    $isImage = ($type ?? 'image') === 'image';
    $isSmall = $small ?? false;
    $previewId = 'preview_'.$name.'_'.\Illuminate\Support\Str::random(6);
@endphp

<div class="field {{ $full ?? false ? 'full' : '' }} {{ $isSmall ? 'field-small' : '' }}">
    <label for="{{ $name }}">{{ $label }}</label>
    <input id="{{ $name }}" type="file" name="{{ $name }}" accept="{{ $accept ?? 'image/*' }}" class="{{ $isSmall ? 'input-small' : '' }}"
           onchange="previewUploadImage(this, '{{ $previewId }}', {{ $isImage ? 'true' : 'false' }})">

    <div id="{{ $previewId }}_new" class="checkline {{ $isSmall ? 'checkline-small' : '' }}" style="display:none;margin-top:{{ $isSmall ? '6px' : '8px' }}">
        @if ($isImage)
            <img class="thumb {{ $isSmall ? 'thumb-small' : '' }}" id="{{ $previewId }}_img" src="" alt="New Preview">
        @endif
        <span class="muted small">
            <strong style="color:var(--ok)">New:</strong> <span id="{{ $previewId }}_name"></span>
        </span>
    </div>

    @if ($current)
        <div id="{{ $previewId }}_current" class="checkline {{ $isSmall ? 'checkline-small' : '' }}" style="margin-top:{{ $isSmall ? '5px' : '8px' }}">
            @if ($isImage)
                <img class="thumb {{ $isSmall ? 'thumb-small' : '' }}" src="{{ asset($current) }}" alt="Current image">
            @endif
            <span class="muted small">
                Current: <a href="{{ asset($current) }}" target="_blank" rel="noopener">{{ basename($current) }}</a>
            </span>
        </div>
        <p id="{{ $previewId }}_hint" class="muted small" style="margin:{{ $isSmall ? '3px' : '6px' }} 0 0; font-size:{{ $isSmall ? '12px' : '13px' }}">Leave empty to keep the current file.</p>
    @endif
</div>
