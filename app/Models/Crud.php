<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Crud extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'email',
        'address',
        'nation',
        'dob',
        'ed_bg',
        'contact_mode',
    ];

    public static function getCrudData()
    {
        return DB::table('cruds')->select('id', 'name', 'gender', 'phone', 'email', 'address',
            'nation', 'dob', 'ed_bg', 'contact_mode')->get()->toArray();
    }
}
