<div class="field full">
    <label for="title">Title <span class="muted">(optional, not shown on the site)</span></label>
    <input id="title" type="text" name="title" value="{{ old('title', $record->title) }}" maxlength="255">
</div>

@include('admin.fields._upload', ['name' => 'video', 'label' => 'Video file (MP4)', 'accept' => 'video/mp4,video/webm', 'type' => 'file', 'full' => true])