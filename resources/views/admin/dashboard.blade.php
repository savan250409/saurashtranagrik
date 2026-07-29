@extends('admin.layout')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')

@section('content')
    <div class="tiles">
        @foreach ($tiles as $tile)
            <a class="tile" href="{{ route("admin.{$tile['key']}.index") }}">
                <div class="n">{{ $tile['total'] }}</div>
                <div class="l">{{ $tile['label'] }}</div>
                @if ($tile['hidden'] > 0)
                    <div class="h">{{ $tile['hidden'] }} hidden from the site</div>
                @endif
            </a>
        @endforeach
    </div>

    <div class="card" style="margin-top:18px">
        <h2 style="font-size:15px;margin:0 0 10px">Recently updated</h2>
        <div class="table-wrap">
            <table>
                <thead>
                    <tr><th>Module</th><th>Items</th><th>Hidden</th><th>Last change</th><th></th></tr>
                </thead>
                <tbody>
                    @foreach (collect($tiles)->sortByDesc('updated') as $tile)
                        <tr>
                            <td>{{ $tile['label'] }}</td>
                            <td>{{ $tile['total'] }}</td>
                            <td>{{ $tile['hidden'] ?: '—' }}</td>
                            <td class="muted small">
                                {{ $tile['updated'] ? \Illuminate\Support\Carbon::parse($tile['updated'])->diffForHumans() : '—' }}
                            </td>
                            <td class="right nowrap">
                                <a class="btn btn-sm" href="{{ route("admin.{$tile['key']}.index") }}">Manage</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
