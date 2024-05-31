<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginUser extends Model
{
    use HasFactory;
    protected $fillable=['nom','pass'];
    public  static function insert($nom,$pass)
    {

        $posts = DB::table('login')->insert([
            'nom'=>$nom,
            'pass'=>$pass
        ]);
    }
    public  static function verifmdpu($nom,$pass)
    {
        $user = DB::table('login')
        ->where('nom', $nom)
        ->where('pass', $pass)
        ->first();
        return  $user;
    }
}
