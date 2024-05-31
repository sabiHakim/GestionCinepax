<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SallePlace extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'idsalle',
    //     'idrange',
    //     'numrang',
    //     'reserver'
    // ];
    public static function getPlace($idsceance)
    {
        $results = DB::select("
        SELECT spv.*
        FROM vue_reservation spv
        LEFT JOIN reservation r ON sceance_id  = r.idsceance
                                AND spv.idrange = r.idrang
                                AND spv.numrang = r.num
        WHERE r.id IS NULL and spv.sceance_id = ?;
        ",[$idsceance]);
        return $results;
    }
    public static function getPlacereserver($idsceance)
    {
        $results = DB::select("
        SELECT spv.*
        FROM vue_reservation spv
         JOIN reservation r ON sceance_id  = r.idsceance
                                AND spv.idrange = r.idrang
                                AND spv.numrang = r.num
        where sceance_id = ?;
        ",[$idsceance]);
        return $results;

    }
    public static function getSalle()
    {
        $results = DB::select("SELECT * FROM salle");
        return $results;
    }
    public static function getnomSalle($id){
        $results = DB::table('salle')->where('id', $id)->get();
        return $results;
    }
}
