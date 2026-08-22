@php
    $takenIds = \App\Models\BranchSignboard::when($record->exists, fn ($q) => $q->where('id', '!=', $record->id))
        ->pluck('branch_id')->toArray();
    $branches = \App\Models\Branch::orderBy('sort_order')->orderBy('name')->get(['id', 'name']);
    $fin = $record->financial_summary ?? [];
    $rowsText = fn (array $rows) => collect($rows)
        ->map(fn ($row) => trim(($row[0] ?? '').' | '.($row[1] ?? '')))
        ->implode("\n");
    $linesText = fn (array $lines) => implode("\n", $lines);
@endphp

<div class="field">
    <label for="branch_id">Branch</label>
    <select id="branch_id" name="branch_id" required>
        <option value="">Select a branch&hellip;</option>
        @foreach ($branches as $branch)
            <option value="{{ $branch->id }}"
                    @selected((string) old('branch_id', $record->branch_id ?? '') === (string) $branch->id)
                    @disabled(in_array($branch->id, $takenIds))>
                {{ $branch->name }}{{ in_array($branch->id, $takenIds) ? ' (has signboard)' : '' }}
            </option>
        @endforeach
    </select>
</div>

<div class="field">
    <label for="established_year">Established year</label>
    <input id="established_year" type="text" name="established_year" value="{{ old('established_year', $record->established_year) }}" maxlength="20" placeholder="2000">
</div>

@include('admin.fields._upload', ['name' => 'building_photo', 'label' => 'Building photo', 'small' => true])

<div class="field full">
    <label for="about_text">About this branch <span class="muted">(one paragraph per line)</span></label>
    <textarea id="about_text" name="about_text" rows="5">{{ old('about_text', $linesText($record->about ?? [])) }}</textarea>
</div>

<div class="field full">
    <label for="board_members_text">Advisory board members <span class="muted">(one name per line)</span></label>
    <textarea id="board_members_text" name="board_members_text" rows="5">{{ old('board_members_text', $linesText($record->board_members ?? [])) }}</textarea>
</div>

<div class="field full">
    <label for="management_text">Management team <span class="muted">(one per line, "Title | Name")</span></label>
    <textarea id="management_text" name="management_text" rows="5" placeholder="General Manager | Shri Jaydip Singh Rathod">{{ old('management_text', $rowsText($record->management ?? [])) }}</textarea>
</div>

<div class="field full">
    <label for="supporting_employees_text">Supporting employees <span class="muted">(one name per line)</span></label>
    <textarea id="supporting_employees_text" name="supporting_employees_text" rows="6">{{ old('supporting_employees_text', $linesText($record->supporting_employees ?? [])) }}</textarea>
</div>

<div class="field full">
    <label>Financial summary <span class="muted">(leave all four blank to hide this section)</span></label>
</div>

<div class="field">
    <label for="financial_as_of">As on date</label>
    <input id="financial_as_of" type="text" name="financial_as_of" value="{{ old('financial_as_of', $fin['as_of'] ?? '') }}" maxlength="20" placeholder="31/03/2025">
</div>

<div class="field full">
    <p class="muted small" style="margin:0 0 10px">નફા નુકસાન ખાતું (Profit &amp; Loss)</p>
    <div class="form-grid">
        <div class="card">
            <div class="field">
                <label for="financial_income">Income <span class="muted">(one per line, "Label | Amount", last line "Total | Amount")</span></label>
                <textarea id="financial_income" name="financial_income" rows="6" placeholder="Member Interest Income | 36204618.00">{{ old('financial_income', $rowsText($fin['income'] ?? [])) }}</textarea>
            </div>
        </div>
        <div class="card">
            <div class="field">
                <label for="financial_expenses">Expenses <span class="muted">(one per line, "Label | Amount")</span></label>
                <textarea id="financial_expenses" name="financial_expenses" rows="6">{{ old('financial_expenses', $rowsText($fin['expenses'] ?? [])) }}</textarea>
            </div>
        </div>
    </div>
</div>

<div class="field full">
    <p class="muted small" style="margin:0 0 10px">પાકું સરવૈયું (Balance Sheet)</p>
    <div class="form-grid">
        <div class="card">
            <div class="field">
                <label for="financial_liabilities">Capital - Liabilities <span class="muted">(one per line, "Label | Amount")</span></label>
                <textarea id="financial_liabilities" name="financial_liabilities" rows="7">{{ old('financial_liabilities', $rowsText($fin['liabilities'] ?? [])) }}</textarea>
            </div>
        </div>
        <div class="card">
            <div class="field">
                <label for="financial_assets">Assets - Receivables <span class="muted">(one per line, "Label | Amount")</span></label>
                <textarea id="financial_assets" name="financial_assets" rows="7">{{ old('financial_assets', $rowsText($fin['assets'] ?? [])) }}</textarea>
            </div>
        </div>
    </div>
</div>
