<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';

    public static function getAll()
    {
        return self::all();
    }

    public static function getById($id)
    {
        return self::find($id);
    }

    public static function generateTiketId()
    {
        $currentDate = date('ymd');

        $lastTiket = Tiket::orderBy('id', 'desc')->first();
        $lastId = ($lastTiket) ? substr($lastTiket->id_ticket, -6) : 0;
        $nextId = intval($lastId) + 1;

        $nextIdFormatted = sprintf('%06d', $nextId);

        return $currentDate . $nextIdFormatted;
    }
}