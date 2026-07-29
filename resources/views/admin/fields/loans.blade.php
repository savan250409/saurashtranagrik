<div class="field">
    <label for="title">{{ $key === 'loans' ? 'Loan name' : 'Term' }}</label>
    <input id="title" type="text" name="title" value="{{ old('title', $record->title) }}" required maxlength="255">
</div>

<div class="field">
    <label for="rate">Interest rate</label>
    <input id="rate" type="text" name="rate" value="{{ old('rate', $record->rate) }}" maxlength="60" placeholder="9%">
</div>

@include('admin.fields._upload', ['name' => 'icon', 'label' => 'Icon', 'accept' => 'image/*', 'full' => true])