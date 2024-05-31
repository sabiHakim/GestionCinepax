<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sceance extends Model
{
    use HasFactory;
    // protected $table ='vue_sceance';
    // protected $fillable = [
    //    'id',
    //    'idfilm',
    //    'idsalle',
    //    'heurre'
    // ];
    public  static function getSceance()
    {
        $sceance = DB::table('vue_sceance')->get();
        return $sceance;
    }
    public static function getSalle($id)
    {
        $sceance = DB::table('sceance')->where('id',$id)->first();
       return $sceance;
    }
    public static function getFilm($ids)
    {
        return DB::table('sceance')->where('id',$ids)->get();
    }
    public static function Add($idfilm,$idSalle,$time)
    {
        DB::table('sceance')->insert([
                    'idfilm' => $idfilm,
                    'idsalle' => $idSalle,
                    'heurre' => $time
                ]);
    }
}
