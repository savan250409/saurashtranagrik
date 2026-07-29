<div class="field">
    <label for="term">Term</label>
    <input id="term" type="text" name="term" value="{{ old('term', $record->term) }}" required maxlength="100" placeholder="1 Year">
</div>

<div class="field">
    <label for="rate">Interest rate</label>
    <input id="rate" type="text" name="rate" value="{{ old('rate', $record->rate) }}" maxlength="60" placeholder="9%">
</div>

@php
    // Show whatever is saved (or was submitted), plus one blank row to type into.
    $lines = old('rows', $record->exists ? $record->lines() : []);
    $lines[] = ['amount' => '', 'maturity' => ''];
@endphp

<div class="field full">
    <label>Deposit &rarr; maturity amounts</label>
    <table class="rows-table" id="rd-rows">
        <thead>
            <tr>
                <th style="width:210px">Monthly deposit</th>
                <th style="width:210px">Maturity amount</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lines as $i => $line)
                <tr>
                    <td><input type="text" name="rows[{{ $i }}][amount]" value="{{ $line['amount'] ?? '' }}" maxlength="60" placeholder="100"></td>
                    <td><input type="text" name="rows[{{ $i }}][maturity]" value="{{ $line['maturity'] ?? '' }}" maxlength="60" placeholder="1259"></td>
                    <td><button type="button" class="btn btn-sm btn-danger rd-remove">Remove</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button type="button" class="btn btn-sm" id="rd-add" style="margin-top:8px">Add another amount</button>
    <p class="muted small" style="margin:6px 0 0">Blank rows are ignored when saving.</p>
</div>

<script>
    (function () {
        var table = document.getElementById('rd-rows');
        var body = table.querySelector('tbody');

        document.getElementById('rd-add').addEventListener('click', function () {
            var index = body.rows.length;
            var tr = document.createElement('tr');
            tr.innerHTML =
                '<td><input type="text" name="rows[' + index + '][amount]" maxlength="60" placeholder="100"></td>' +
                '<td><input type="text" name="rows[' + index + '][maturity]" maxlength="60" placeholder="1259"></td>' +
                '<td><button type="button" class="btn btn-sm btn-danger rd-remove">Remove</button></td>';
            body.appendChild(tr);
        });

        body.addEventListener('click', function (e) {
            if (!e.target.classList.contains('rd-remove')) return;
            if (body.rows.length > 1) {
                e.target.closest('tr').remove();
            } else {
                // keep one editable row on screen
                body.querySelectorAll('input').forEach(function (i) { i.value = ''; });
            }
        });
    })();
</script>
