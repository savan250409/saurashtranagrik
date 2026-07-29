<div class="field">
    <label for="name">Branch name</label>
    <input id="name" type="text" name="name" value="{{ old('name', $record->name) }}" required maxlength="255">
</div>

<div class="field">
    <label for="color_class">Card colour</label>
    <select id="color_class" name="color_class" required>
        @foreach (['c1' => 'Teal', 'c2' => 'Blue', 'c3' => 'Green', 'c4' => 'Red', 'c5' => 'Brown', 'c6' => 'Slate'] as $value => $label)
            <option value="{{ $value }}" @selected(old('color_class', $record->color_class ?? 'c1') === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>

<div class="field full">
    <label for="address">Address</label>
    <textarea id="address" name="address" maxlength="1000">{{ old('address', $record->address) }}</textarea>
    <p class="muted small" style="margin:5px 0 0">Each new line becomes a line break on the website.</p>
</div>

<div class="field">
    <label for="phone">Landline</label>
    <input id="phone" type="text" name="phone" value="{{ old('phone', $record->phone) }}" maxlength="60" placeholder="(02796) 220 525">
</div>

<div class="field">
    <label for="mobile">Mobile</label>
    <input id="mobile" type="text" name="mobile" value="{{ old('mobile', $record->mobile) }}" maxlength="60" placeholder="94845 29400">
</div>