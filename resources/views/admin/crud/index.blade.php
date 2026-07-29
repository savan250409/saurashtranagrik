@extends('admin.layout')

@section('title', $title)
@section('heading', $title)

@section('content')
    <div class="card">
        {{-- Search + filters. GET so every result set is a shareable URL. --}}
        <form method="GET" action="{{ route("admin.{$key}.index") }}" class="toolbar">
            <div class="field grow">
                <label for="search">Search</label>
                <input id="search" type="text" name="search" value="{{ $search }}"
                       placeholder="Search {{ strtolower($title) }}…">
            </div>

            <div class="field">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="">All</option>
                    <option value="active" @selected($status === 'active')>Visible</option>
                    <option value="inactive" @selected($status === 'inactive')>Hidden</option>
                </select>
            </div>

            @foreach ($filters as $column => $options)
                <div class="field">
                    <label for="f-{{ $column }}">{{ ucfirst(str_replace('_', ' ', $column)) }}</label>
                    <select id="f-{{ $column }}" name="{{ $column }}">
                        <option value="">All</option>
                        @foreach ($options as $value => $label)
                            <option value="{{ $value }}" @selected(request()->query($column) === (string) $value)>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            @endforeach

            <div class="field">
                <button class="btn" type="submit">Filter</button>
            </div>
            <div class="field">
                <a class="btn" href="{{ route("admin.{$key}.index") }}">Reset</a>
            </div>
            <div class="field" style="margin-left:auto">
                <a class="btn btn-primary" href="{{ route("admin.{$key}.create") }}">Add {{ strtolower($singular) }}</a>
            </div>
        </form>

        <p class="muted small">
            {{ $records->total() }} {{ Str::plural('item', $records->total()) }} found
            @if ($search !== '') matching “{{ $search }}” @endif
        </p>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th style="width:60px">Order</th>
                        @foreach ($columns as $label => $accessor)
                            <th>{{ $label }}</th>
                        @endforeach
                        <th>Status</th>
                        <th class="right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($records as $record)
                        <tr>
                            <td class="muted">{{ $record->sort_order }}</td>

                            @foreach ($columns as $label => $accessor)
                                @php $value = $accessor($record); @endphp
                                <td>
                                    @if (in_array(strtolower($label), ['image', 'photo', 'icon'], true) && $value)
                                        <img class="thumb" src="{{ asset($value) }}" alt="">
                                    @elseif (strtolower($label) === 'file' && $value)
                                        <a href="{{ asset($value) }}" target="_blank" rel="noopener" class="small">{{ basename($value) }}</a>
                                    @else
                                        {{ $value }}
                                    @endif
                                </td>
                            @endforeach

                            <td>
                                <span class="badge {{ $record->is_active ? 'on' : 'off' }}">
                                    {{ $record->is_active ? 'Visible' : 'Hidden' }}
                                </span>
                            </td>

                            <td class="right nowrap">
                                <form method="POST" action="{{ route("admin.{$key}.toggle", $record->id) }}" style="display:inline">
                                    @csrf @method('PATCH')
                                    <button class="btn btn-sm" type="submit">{{ $record->is_active ? 'Hide' : 'Show' }}</button>
                                </form>
                                <a class="btn btn-sm" href="{{ route("admin.{$key}.edit", $record->id) }}">Edit</a>
                                <form method="POST" action="{{ route("admin.{$key}.destroy", $record->id) }}" style="display:inline"
                                      onsubmit="return confirm('Delete this {{ strtolower($singular) }}? This cannot be undone.');">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($columns) + 3 }}" class="muted" style="padding:26px;text-align:center">
                                Nothing found. @if ($search !== '' || $status) Try clearing the filters. @endif
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $records->links('admin.pagination') }}
    </div>
@endsection
