<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ranger extends Model
{
    use HasFactory;
    protected $fillable=['id','rang'];
    public static function getAll()
    {
        $rang = DB::table('range')->get();
        return $rang;
    }

}
