<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesan extends Model
{
    use HasFactory;

    protected $table = 'pemesan';

    public static function getAll()
    {
        return self::all();
    }

    public static function getById($id)
    {
        return self::find($id);
    }
}
