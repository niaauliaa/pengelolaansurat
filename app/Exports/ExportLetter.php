<?php

namespace App\Exports;

use App\Models\LetterType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Letters;

class ExportLetter implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Letters::all();
    }

    public function headings(): array
    {
        return [
            "Kode Surat", "Klasifikasi Surat", "Surat Tertaut"
        ];
    }

    public function map($item): array
    {
        return [
            $item->letter_code,
            $item->name_type,
            Letter::where('letter_type_id', $item->id)->count()
        ];
    }
}