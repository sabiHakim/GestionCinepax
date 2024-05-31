<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'idbillet','idsceance','idSalle','idRang','num','dateReservation'];
    public static function insertReservation($idB,$idSeance,$idSalle,$idRang,$num)
    {
        DB::table('reservation')->insert([
            'idbillet' => $idB,
            'idsceance' => $idSeance,
            'idsalle'=>$idSalle,
            'idrang'=>$idRang,
            'num'=>$num,
            'datereservation' => now()
        ]);
    }
}
