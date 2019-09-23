<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classterapeutique;

use App\Medicamentforme;

class VenteController extends Controller
{
    function index(){
        $listClass= Classterapeutique::orderBy('nom')->get('nom');
     $listForme= Medicamentforme::orderBy('nom')->get('nom');    
     return view('dashbord.vente',['class'=>$listClass ,'formes'=>$listForme]);
    }
}
