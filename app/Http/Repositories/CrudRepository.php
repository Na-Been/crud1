<?php

namespace App\Http\Repositories;


use App\Http\Repositories\Contrasts\Repository;
use App\Imports\CrudsImport;
use App\Models\Crud;
use Maatwebsite\Excel\Facades\Excel;

class  CrudRepository extends Repository
{
    protected $model;

    public function __construct(Crud $model)
    {
        $this->model = $model;
    }

    public function fileImportProcess($request)
    {
        $cruds = Excel::toCollection(new CrudsImport(), $request->file('import_file'));
        foreach ($cruds[0] as $crud) {
            Crud::where('id', $crud[0])->update([
                'name' => $crud[1],
                'gender' => $crud[2],
                'phone' => $crud[3],
                'email' => $crud[4],
                'address' => $crud[5],
                'nation' => $crud[6],
                'dob' => $crud[7],
                'ed_bg' => $crud[8],
                'contact_mode' => $crud[9],
            ]);
        }
    }

}
