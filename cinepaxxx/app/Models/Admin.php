<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;
    protected $fillable=['nom','pass'];
    public  static function verifmdp($nom,$pass)
    {
        $admin = DB::table('admin')
        ->where('nom', $nom)
        ->where('pass', $pass)
        ->first();
        return  $admin;
    }
}
