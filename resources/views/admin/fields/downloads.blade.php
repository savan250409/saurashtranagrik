<div class="field full">
    <label for="title">Title</label>
    <input id="title" type="text" name="title" value="{{ old('title', $record->title) }}" required maxlength="255" placeholder="Balance Sheet (Year-2026)">
</div>

@include('admin.fields._upload', ['name' => 'file', 'label' => 'Document (PDF)', 'accept' => '.pdf,.doc,.docx,.xls,.xlsx', 'type' => 'file', 'full' => true])