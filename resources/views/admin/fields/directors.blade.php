<div class="field">
    <label for="name">Name</label>
    <input id="name" type="text" name="name" value="{{ old('name', $record->name) }}" required maxlength="255">
</div>

<div class="field">
    <label for="designation">Designation</label>
    <input id="designation" type="text" name="designation" value="{{ old('designation', $record->designation) }}" required maxlength="255" list="designations">
    <datalist id="designations">
        @foreach (['Chairman', 'Vice Chairman', 'Secretary', 'G.M.D', 'Director'] as $d)
            <option value="{{ $d }}"></option>
        @endforeach
    </datalist>
</div>

@include('admin.fields._upload', ['name' => 'photo', 'label' => 'Photo', 'accept' => 'image/*', 'full' => true])