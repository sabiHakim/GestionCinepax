<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stat extends Model
{
    use HasFactory;
    protected $fillable =['idfilm','count'];
    public  static function getStatFilm($id)
    {
        return DB::table('stat_vrai')->where('idfilm',$id)->first();
    }
}
