@include('admin.fields._upload', ['name' => 'image', 'label' => 'Slide image', 'accept' => 'image/*', 'full' => true])

<div class="field">
    <label for="transition">Transition</label>
    <select id="transition" name="transition" required>
        @foreach (['fade' => 'Fade', 'slidehorizontal' => 'Slide horizontal', 'slidevertical' => 'Slide vertical'] as $value => $label)
            <option value="{{ $value }}" @selected(old('transition', $record->transition ?? 'fade') === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>