<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Illuminate\Support\Collection;

class ProductsImport implements ToCollection, WithMultipleSheets
{
    use WithConditionalSheets;

    public function sheets(): array
    {
        return [
            new FirstSheetImport()
        ];
    }

    public function conditionalSheets(): array
    {
        return [
            'Sheet1' => new FirstSheetImport(),
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function collection(Collection $collection)
    {
        // TODO: Implement collection() method.
    }
}
