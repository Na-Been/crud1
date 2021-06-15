<?php

namespace App\Exports;

use App\Models\Crud;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CrudsExport implements FromCollection, WithHeadings
{
    /**
     * @return Collection
     */

    public function headings(): array
    {
        return [
            'S.N.',
            'Name',
            'Gender',
            'Phone',
            'Email',
            'Address',
            'Nation',
            'Date Of Birth',
            'Edu Background',
            'Contact Mode',
        ];
    }

    public function collection()
    {
        return collect(Crud::getCrudData());
    }
}
