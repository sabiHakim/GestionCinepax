<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nomProd', 'pu'];
    public static function getAll()
    {
        return DB::table('produit')->get();
    }
}
