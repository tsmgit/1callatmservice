<?php

namespace App\Exports;

use App\Models\Newsletter;
use Maatwebsite\Excel\Concerns\FromCollection;
use  Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use  Maatwebsite\Excel\Concerns\WithHeadings;

class NewsletterExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCsvSettings(): array
    {
        return [
            'delimeter' => ','
        ];
    }

    public function headings(): array{
        return ['Id', 'Email', 'Date'];
    }

    public function collection()
    {
        return Newsletter::select('id', 'email', 'date')->get();
    }
}
