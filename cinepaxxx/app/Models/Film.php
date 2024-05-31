<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Film extends Model
{
    use HasFactory;
    protected $fillable = ['id','titre','annee','image','duree'];

    public  static function getAll()
    {
        // $film = DB::table('film')->get();
        // return $film;
        return DB::table('film')->paginate(1);
    }
    public  static function getAllsansPaginate()
    {
        $film = DB::table('film')->get();
        return $film;

    }
    public static function getnomFilm($id)
    {
        $film = DB::table('film')->where('id',$id)->get();
        return $film;
    }

}
