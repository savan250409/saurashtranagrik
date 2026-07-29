<div class="field">
    <label for="designation">Title <span class="muted">(shown as the card heading)</span></label>
    <input id="designation" type="text" name="designation" value="{{ old('designation', $record->designation) }}" required maxlength="255" placeholder="General Manager / Bagasara">
</div>

<div class="field">
    <label for="name">Person name</label>
    <input id="name" type="text" name="name" value="{{ old('name', $record->name) }}" required maxlength="255">
</div>

<div class="field">
    <label for="group">Section</label>
    <select id="group" name="group" required>
        @foreach (['head_office' => 'Head office manager', 'branch' => 'Branch manager'] as $value => $label)
            <option value="{{ $value }}" @selected(old('group', $record->group ?? 'head_office') === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>

<div class="field">
    <label for="color_class">Card colour</label>
    <select id="color_class" name="color_class" required>
        @foreach (['c1' => 'Teal', 'c2' => 'Blue', 'c3' => 'Green', 'c4' => 'Red', 'c5' => 'Brown', 'c6' => 'Slate'] as $value => $label)
            <option value="{{ $value }}" @selected(old('color_class', $record->color_class ?? 'c1') === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>

<div class="field">
    <label for="phone">Phone <span class="muted">(head office cards only)</span></label>
    <input id="phone" type="text" name="phone" value="{{ old('phone', $record->phone) }}" maxlength="60">
</div>