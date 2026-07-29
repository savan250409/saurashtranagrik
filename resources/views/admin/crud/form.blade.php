@extends('admin.layout')

@section('title', ($mode === 'create' ? 'Add ' : 'Edit ').$singular)
@section('heading', ($mode === 'create' ? 'Add ' : 'Edit ').strtolower($singular))

@section('content')
    <div class="card">
        <form method="POST"
              action="{{ $mode === 'create' ? route("admin.{$key}.store") : route("admin.{$key}.update", $record->id) }}"
              enctype="multipart/form-data">
            @csrf
            @if ($mode === 'edit')
                @method('PUT')
            @endif

            <div class="form-grid">
                @include("admin.fields.{$key}")

                <div class="field">
                    <label for="sort_order">Display order</label>
                    <input id="sort_order" type="number" name="sort_order" min="0"
                           value="{{ old('sort_order', $record->sort_order ?? 0) }}">
                    <p class="muted small" style="margin:5px 0 0">Lower numbers appear first on the website.</p>
                </div>

                <div class="field">
                    <label>Visibility</label>
                    <div class="checkline">
                        <input id="is_active" type="checkbox" name="is_active" value="1"
                               @checked(old('is_active', $record->is_active ?? true))>
                        <label for="is_active" style="margin:0;font-weight:400;color:var(--ink)">Show on the website</label>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button class="btn btn-primary" type="submit">
                    {{ $mode === 'create' ? 'Create' : 'Save changes' }}
                </button>
                <a class="btn" href="{{ route("admin.{$key}.index") }}">Cancel</a>
            </div>
        </form>
    </div>
@endsection
