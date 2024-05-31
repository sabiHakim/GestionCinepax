<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Vente extends Model
{
    use HasFactory;
    public static function getVenteProduit($date)
    {
        $vp = DB::select(
            "SELECT p.id, p.nomprod, p.pu, COALESCE(v.qte, 0) AS qte_vendue,
            CASE WHEN v.datevente IS NULL THEN NULL ELSE v.datevente END AS datevente,
            COALESCE(v.ca, 0) AS ca
            FROM produit p
            LEFT JOIN vue_vente_prodaka v ON p.id = v.idproduit AND v.datevente = ?",[$date]
        );
        return $vp;
    }
    public static function FilmJour($date)
    {
        $dateObj = new DateTime($date);
        // Augmenter d'un jour
        $dateObj->modify('+1 day');
        // Afficher la nouvelle date
        $newDate = $dateObj->format('Y-m-d');
        // dd($newDate);
        $res = DB::select("
        select film_id,film_titre from vue_reserve_sceance_rang WHERE datereservation >= ?::DATE AND datereservation < ?::DATE group by film_id,film_titre;
        ",[$date,$newDate]);
        return $res;
    }
    public static function ca($date)
    {
        $dateObj = new DateTime($date);
        $dateObj->modify('+1 day');
        $newDate = $dateObj->format('Y-m-d');
        $res = DB::select("
        select film_titre,sum(vr.montant) from
        vue_reserve_sceance_rang as vr  WHERE
        datereservation >= ?::DATE  AND datereservation < ? ::DATE group by film_titre;",[$date,$newDate]);
        return $res;
    }
    public static function VueFilm($date)
    {
        $dateObj = new DateTime($date);
        $dateObj->modify('+1 day');
        $newDate = $dateObj->format('Y-m-d');
        $res = DB::select("
        select film_titre,count(vr.idbillet) from  vue_reserve_sceance_rang as vr
        WHERE datereservation >= ?::DATE  AND datereservation < ?::DATE group by film_titre;",[$date,$newDate]);
        return $res;
    }
    public static function getVent()
    {
        return DB::table('vue_reserve_sceance_rang')->get();
    }
    public static function getVenteBy($id)
    {
        return DB::table('vue_reserve_sceance_rang')->where('id',$id)->get();
    }

}

