<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Billet extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'nom',
        'montant'
    ];
    public static function getAll()
    {
        $billet = DB::table('billet')->get();
        return $billet;
    }
}
