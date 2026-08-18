<?php

namespace App\Http\Controllers\Admin;

use App\Models\Branch;
use App\Models\BranchSignboard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class BranchSignboardController extends BaseCrudController
{
    protected string $model = BranchSignboard::class;

    protected string $key = 'branch-signboards';

    protected string $title = 'Branch Signboards';

    protected string $singular = 'Branch signboard';

    protected array $uploads = ['building_photo' => 'branches'];

    protected function columns(): array
    {
        return [
            'Branch' => fn (BranchSignboard $s) => $s->branch->name ?? '—',
            'Established' => fn (BranchSignboard $s) => $s->established_year ?: '—',
            'Board members' => fn (BranchSignboard $s) => count($s->board_members ?? []),
            'Staff' => fn (BranchSignboard $s) => count($s->supporting_employees ?? []),
        ];
    }

    protected function rules(?Model $record): array
    {
        return [
            'branch_id' => [
                'required', 'integer',
                'unique:branch_signboards,branch_id,'.($record->id ?? 'NULL').',id',
            ],
            'established_year' => ['nullable', 'string', 'max:20'],
            'building_photo' => ['nullable', 'image', 'max:4096'],
            'financial_as_of' => ['nullable', 'string', 'max:20'],
            'financial_income' => ['nullable', 'string'],
            'financial_expenses' => ['nullable', 'string'],
            'financial_liabilities' => ['nullable', 'string'],
            'financial_assets' => ['nullable', 'string'],
            'about_text' => ['nullable', 'string'],
            'board_members_text' => ['nullable', 'string'],
            'management_text' => ['nullable', 'string'],
            'supporting_employees_text' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ];
    }

    /**
     * The admin form edits plain textareas (one item per line, "Label | Value"
     * for pairs) rather than the raw JSON columns, so a non-technical editor
     * never has to type JSON. This turns that text back into the array shape
     * the public page expects.
     */
    protected function prepare(Request $request, array $data, ?Model $record): array
    {
        $data = parent::prepare($request, $data, $record);

        $lines = fn (string $key) => collect(preg_split('/\r\n|\r|\n/', (string) $request->input($key, '')))
            ->map(fn ($line) => trim($line))
            ->filter(fn ($line) => $line !== '')
            ->values();

        // The pipe "|" is the documented separator, but editors pasting straight
        // from a poster naturally use "—" or "-" instead - accept those too
        // rather than silently saving the amount as blank.
        $splitPair = function (string $line): array {
            foreach (['|', '—', ' - '] as $separator) {
                if (str_contains($line, $separator)) {
                    [$label, $value] = array_pad(explode($separator, $line, 2), 2, '');

                    return [trim($label), trim($value)];
                }
            }

            return [trim($line), ''];
        };

        // Accepts Gujarati digits (૦-૯) and normal thousands separators, since
        // amounts are often pasted straight from a Gujarati-language poster.
        $normalizeAmount = function (string $value): string {
            $value = strtr($value, [
                '૦' => '0', '૧' => '1', '૨' => '2', '૩' => '3', '૪' => '4',
                '૫' => '5', '૬' => '6', '૭' => '7', '૮' => '8', '૯' => '9',
            ]);

            return str_replace(',', '', $value);
        };

        $pairs = fn (string $key) => $lines($key)->map(function ($line) use ($splitPair, $normalizeAmount) {
            [$label, $value] = $splitPair($line);

            return [$label, $normalizeAmount($value)];
        })->values()->all();

        $anyFinancial = collect(['financial_income', 'financial_expenses', 'financial_liabilities', 'financial_assets'])
            ->contains(fn ($key) => $lines($key)->isNotEmpty());

        $data['financial_summary'] = $anyFinancial ? [
            'as_of' => trim((string) $request->input('financial_as_of', '')),
            'income' => $pairs('financial_income'),
            'expenses' => $pairs('financial_expenses'),
            'liabilities' => $pairs('financial_liabilities'),
            'assets' => $pairs('financial_assets'),
        ] : null;

        $data['about'] = $lines('about_text')->all();
        $data['board_members'] = $lines('board_members_text')->all();
        $data['management'] = $pairs('management_text');
        $data['supporting_employees'] = $lines('supporting_employees_text')->all();

        foreach ([
            'financial_as_of', 'financial_income', 'financial_expenses', 'financial_liabilities',
            'financial_assets', 'about_text', 'board_members_text', 'management_text', 'supporting_employees_text',
        ] as $field) {
            unset($data[$field]);
        }

        return $data;
    }
}
