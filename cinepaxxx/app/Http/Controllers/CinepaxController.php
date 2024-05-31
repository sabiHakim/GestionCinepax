<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Billet;
use App\Models\Film;
use App\Models\LoginUser;
use App\Models\Reservation;
use App\Models\SallePlace;
use App\Models\Sceance;
use App\Models\Stat;
use App\Models\Vente;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class CinepaxController extends Controller
{
    public function DoLogin(Request $request)
    {
        $request->validate([
            'username' => 'required', // Champ username requis
            'password' => 'required', // Champ password requis
        ]);
        $nom = $request->input('username');
        $password = $request->input('password');
        $admin = Admin::verifmdp($nom, $password);
        if ($admin) {
            Session()->put('admin', $admin);
            return redirect('/acceuilAdmin')->with(['status' => 'Connecté en tant qu\'administrateur']);
        } else {
            $user = LoginUser::verifmdpu($nom, $password);
            if ($user) {
                Session()->put('user', $user);
                return redirect('/acceuil')->with(['status' => 'Connecté en tant qu\'utilisateur']);
            } else {
                return redirect('/')->with('error', 'Identifiants invalides');
            }
        }
    }

    public function DoInscri(Request $request)
    {
        $request->validate([
            'username' => 'required', // Champ username requis
            'password' => 'required', // Champ password requis
        ]);
        $nom = $request->input('username');
        $password = $request->input('password');
        $user = LoginUser::insert($nom , $password);
        return redirect('/')->with('status',"Ajouter avec succes");
    }
    public function acceuilAdmin()
    {
        return view('acceuil.admin');
    }
    public function logout()
    {
        session()->forget('user');
        session()->forget('admin');
        return redirect('/')->with('status', 'Déconnecté avec succès');
    }
    public function Inscri()
    {
        return view('login.register.pages-register');
    }
    public function Acceuil()
    {
        $sceance = Sceance::getSceance();
        return view('acceuil.index',compact('sceance'));
    }
    public function sceanceReserve($id)
    {
        $sceance= Sceance::getSalle($id);
        $nomSalle = SallePlace::getnomSalle($sceance->idsalle);
        $nomFilm = Film::getnomFilm($sceance->idfilm);
        $places = SallePlace::getPlace($sceance->id);
        $billets = Billet::getAll();
        return view('acceuil.billet.billet',compact('billets','places','id','sceance','nomFilm','nomSalle'));
    }
    public function  vuePlace($id)
    {
        $sceance= Sceance::getSalle($id);
        $place= SallePlace::getPlace($sceance->id);
        $placeoccupes= SallePlace::getPlacereserver($sceance->id);
        // dd( $place);
        return view('acceuil.vueplace',compact('place','placeoccupes'));
    }
    public function reservation(Request $request)
    {
        $billet = $request->input('billet');
        $sceance = $request->input('idsceance');
        $salle = Sceance::getSalle($sceance);
        list($idRanger, $numeroPlace) = explode('-', $request->place);
        Reservation::insertReservation($billet,$sceance,$salle->idsalle,$idRanger,$numeroPlace);
       return  Redirect::to('/acceuil');
    }
    public function film()
    {
        $film = Film::getAll();
        return view('acceuil.stat.stat',compact('film'));
    }
    public function filmstat($id)
    {
        $rep = Stat::getStatFilm($id);
        return view('acceuil.stat.statFilm',compact('rep'));
    }
    public function tb()
    {
        return view('acceuil.stat.tableauBord');

    }
    public function getableauBord(Request $request)
    {
        $date = $request->input('date');
        $venteProduit =  Vente::getVenteProduit($date);
        $film = Vente::FilmJour($date);
        $cafilm = Vente::ca($date);
        $vues = Vente::VueFilm($date);
        // dd($caFilm );
        // dd($venteProduit);
        return view('acceuil.stat.bord',compact('venteProduit','date','film','cafilm','vues'));
    }
    public function addsceance()
    {
        $film = Film::getAllsansPaginate();
        $salle =  SallePlace::getSalle();
        // dd($film);
        return view('acceuil.addseance.addSceance',compact('film','salle'));
    }
    public function doaddSceance(Request $request)
    {
        $film = $request->input('film');
        $salle = $request->input('salle');
        $time = $request->input('time');
        Sceance::Add($film, $salle, $time);
        return back();
    }
//     public function exportPdf(Request $request)
// {
//     $idsceance = $request->input('idsceance');
//     $sceance = Sceance::getSalle($idsceance);
//     $nomSalle = SallePlace::getnomSalle($sceance->idsalle);
//     $nomFilm = Film::getnomFilm($sceance->idfilm);
//     $places = SallePlace::getPlace($sceance->id);
//     $billets = Billet::getAll();
//     $data = [
//         'sceance' => $sceance,
//         'nomFilm' => $nomFilm,
//         'nomSalle' => $nomSalle,
//         'billets' => $billets,
//         'places' => $places,
//         'id' => $idsceance
//     ];
//     $options = [
//         'fontDir' => storage_path('fonts/'),
//         'fontCache' => storage_path('fonts/'),
//         'defaultFont' => 'Arial',
//     ];
//     $html = View::make('acceuil.billet.billet', $data)->render();
//     $pdf = PDF::setOptions($options)->loadHTML($html);

//     return $pdf->stream('billet.pdf');
// }
public function ticket()
{
    $vente = Vente::getVent();
    // dd($vente);
    return view('acceuil.ticket.ticket',compact('vente'));
}
public function detailTicket($id)
{
    $vente = Vente::getVenteBy($id);
    // dd($vente);
    return view('acceuil.ticket.ticketPdf',compact('vente'));

}
// public function exportPdf(Request $request)
// {
//     $idsceance = $request->input('idsceance');
//     $sceance = Sceance::getSalle($idsceance);
//     $nomSalle = SallePlace::getnomSalle($sceance->idsalle);
//     $nomFilm = Film::getnomFilm($sceance->idfilm);
//     $places = SallePlace::getPlace($sceance->id);
//     $billets = Billet::getAll();
//     $data = [
//         'sceance' => $sceance,
//         'nomFilm' => $nomFilm,
//         'nomSalle' => $nomSalle,
//         'billets' => $billets,
//         'places' => $places,
//         'id' => $idsceance
//     ];

//     $options = [
//         'fontDir' => storage_path('fonts/'),
//         'fontCache' => storage_path('fonts/'),
//         'defaultFont' => 'Arial',
//     ];

//     // Charger la vue HTML avec les données
//     $view = View::make('acceuil.billet.billet', $data);

//     // Rendre la vue complète
//     $html = $view->render();

//     // Extraire la section spécifique du HTML
//     $startMarker = '<div id="pdf-content-start"></div>';
//     $endMarker = '<div id="pdf-content-end"></div>';
//     $startPos = strpos($html, $startMarker);
//     $endPos = strpos($html, $endMarker);
//     $pdfContent = substr($html, $startPos + strlen($startMarker), $endPos - $startPos - strlen($startMarker));

//     // Charger la section dans Dompdf
//     $pdf = PDF::setOptions($options)->loadHTML($pdfContent);

//     return $pdf->stream('billet.pdf');
// }

public function exportPdf(Request $request)
{
    $idv = $request->input('idv');
    $vente = Vente::getVenteBy($idv);
    $data = [
        'vente' => $vente
    ];

    $options = [
        'fontDir' => storage_path('fonts/'),
        'fontCache' => storage_path('fonts/'),
        'defaultFont' => 'Arial',
    ];
    $view = View::make('acceuil.ticket.ticketPdf', $data);
    $html = $view->render();
    $startMarker = '<div id="pdf-content-start"></div>';
    $endMarker = '<div id="pdf-content-end"></div>';
    $startPos = strpos($html, $startMarker);
    $endPos = strpos($html, $endMarker);
    $pdfContent = substr($html, $startPos + strlen($startMarker), $endPos - $startPos - strlen($startMarker));
    $pdf = PDF::setOptions($options)->loadHTML($pdfContent);
    return $pdf->stream('billet.pdf');
}

}
