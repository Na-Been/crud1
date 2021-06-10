<?php

namespace App\Exports;

use App\Models\Crud;
use Maatwebsite\Excel\Concerns\FromCollection;

class CrudsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Crud::all();
    }
}
