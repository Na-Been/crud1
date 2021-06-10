<?php

namespace App\Imports;

use App\Models\Crud;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;

class CrudsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {
        return new Crud([
            'name' => $row[1],
            'gender' => $row[2],
            'phone' => $row[3],
            'email' => $row[4],
            'address' => $row[5],
            'nation' => $row[6],
            'dob' => $row[7],
            'ed_bg' => $row[8],
            'contact_mode' => $row[9],
        ]);
    }
}
