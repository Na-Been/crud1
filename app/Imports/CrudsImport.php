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
            'id' => $row['S.N.'],
            'name' => $row['Name'],
            'gender' => $row['Gender'],
            'phone' => $row['Phone'],
            'email' => $row['Email'],
            'address' => $row['Address'],
            'nation' => $row['Nation'],
            'dob' => $row['Date Of Birth'],
            'ed_bg' => $row['Edu Background'],
            'contact_mode' => $row['Contact Mode'],
        ]);
    }
}
