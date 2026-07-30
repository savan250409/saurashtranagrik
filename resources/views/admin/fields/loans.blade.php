<div class="field">
    <label for="title">{{ $key === 'loans' ? 'Loan name' : 'Term' }}</label>
    <input id="title" type="text" name="title" value="{{ old('title', $record->title) }}" required maxlength="255">
</div>

<div class="field">
    <label for="rate">Interest rate</label>
    <input id="rate" type="text" name="rate" value="{{ old('rate', $record->rate) }}" maxlength="60" placeholder="9%">
</div>

<div class="field">
    <label for="icon">Icon</label>
    <select id="icon" name="icon" required>
        @foreach (\App\Http\Controllers\Admin\LoanController::ICON_OPTIONS as $value => $label)
            <option value="{{ $value }}" @selected(old('icon', $record->icon ?? 'coins') === $value)>{{ $label }}</option>
        @endforeach
    </select>
</div>