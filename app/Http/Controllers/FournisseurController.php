<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fournisseur;
use App\Http\Requests\fournisseurRequest;
class FournisseurController extends Controller
{
    




    public function index(){
        $list_fournisseur = Fournisseur::all();
        return view('Dashbord.fournisseurs',['fours'=>$list_fournisseur]);
    }

    public function create(){
        return view('dashbord.addfournisseur');
    }

    public function store(fournisseurRequest $request){
        $fournisseur = New Fournisseur();

        $fournisseur->nom = $request->input('nom');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->email = $request->input('email');
        $fournisseur->telephone = $request->input('telephone');
        $fournisseur->save();
        session()->flash('success' , 'Le Fournisseur a été bien enregistrer');
        
        return redirect('Dashbord/fournisseurs');


    }

    public function edit($id){
        $fournisseur = Fournisseur::find($id);
        return view('Dashbord.editfournisseur',['fournisseur' => $fournisseur]);

    }

    public function update(fournisseurRequest $request,$id){
        
        $fournisseur = Fournisseur::find($id);
        $fournisseur->nom = $request->input('nom');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->email = $request->input('email');
        $fournisseur->telephone = $request->input('telephone');
        $fournisseur->save();
        session()->flash('success' , 'Le Fournisseur a été bien Modifier');
        
        return redirect('Dashbord/fournisseurs');



    }

    public function destroy($id){
        $fournisseur = Fournisseur::find($id);
        $fournisseur->delete();
        return redirect('Dashbord/fournisseurs');
    }

}
