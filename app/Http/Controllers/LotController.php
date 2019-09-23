<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classterapeutique;
use App\Medicament;
use App\Medicamentforme;
use App\Medicamenthistorique;
use App\Dosageunit;
use App\Lot;
use App\Http\Requests\lotRequest;

class LotController extends Controller
{
   
       
   public function index($idM)
    {
    return view ('dashbord.ajouterLot',['idM'=>$idM]); 
    } 
    
    
   public function insert(lotRequest $requete,$idM)
    {
     $lot=new Lot();
     $lot->medicament_id=$idM;      
     $lot->numero=strtoupper($requete->input('numLot')); 
     $lot->dateF= $requete->input('dateF');
     $lot->dateP= $requete->input('dateP');
     $lot->prixAchat= $requete->input('prixA');
     $lot->prixVente= $requete->input('prixV');
     $lot->Qte= $requete->input('Qte');      
     $lot->save();

     //historique
     $historique=new Medicamenthistorique();
     $historique->user_id=Auth::user()->id;
     $historique->medicament_id=$idM ; 
     $historique->numLot=$lot->numero;
     $historique->date=date("y-m-d");
     $historique->heure=date("H:i:s");
     $historique->operation="insert"; 
     $historique->save();
     
     session()->flash('InsertSuccessL',' insertion avec succès')  ;   
     return redirect('lots/gerer/'.$idM); 
   } 
    
   
   public function gerer($idMedic)
    {
     $anneeC =date ("Y"); 
     $tabAnnees=array();
     $i=$anneeC-10;
     for($j=0;$i<=$anneeC+15;$j++)  
     {
      $tabAnnees[$j]=$i;
      $i++;
     }   
     $listeLots= Lot::where('medicament_id',$idMedic)->orderBy('dateP')->get();
     $medic=Medicament::find($idMedic);
     return view('dashbord.listeLots',['lots'=>$listeLots,'medic'=>$medic,'tabAnnees'=>$tabAnnees]);
    }     
   
   public function edite($idLot)
    {
      $lot=Lot::find($idLot);
      return view('dashbord.modifierLot',['lot'=>$lot]);
    }
    
    
   public function update(lotRequest $requete,$idlot)
    {
     
     $idM=Lot::where('id',$idlot)->value('medicament_id'); 
     $lot=Lot::find($idlot);  
     $lot->numero=strtoupper($requete->input('numLot')); 
     $lot->dateF= $requete->input('dateF');
     $lot->dateP= $requete->input('dateP');
     $lot->prixAchat= $requete->input('prixA');
     $lot->prixVente= $requete->input('prixV');
     $lot->Qte= $requete->input('Qte');      
     $lot->save();

     //historique
     $historique=new Medicamenthistorique();
     $historique->user_id=Auth::user()->id;
     $historique->medicament_id=$idM ; 
     $historique->numLot=$lot->numero;
     $historique->date=date("y-m-d");
     $historique->heure=date("H:i:s");
     $historique->operation="update"; 
     $historique->save();

    
    session()->flash('UpdateSuccessL','modification avec succès')  ;   
    return redirect('lots/gerer/'.$idM); 
    }
    
    
   public function delete($idLot)
    {
    $idLot=str_replace("'", "", $idLot);
    $idM=Lot::where('id',$idLot)->value('medicament_id'); 
    $numLot=Lot::where('id',$idLot)->value('numero');

    $lot=Lot::find($idLot);  
    $lot->delete(); 

    //historique
     $historique=new Medicamenthistorique();
     $historique->user_id=Auth::user()->id;
     $historique->medicament_id=$idM ; 
     $historique->numLot=$numLot;
     $historique->date=date("y-m-d");
     $historique->heure=date("H:i:s");
     $historique->operation="delete"; 
     $historique->save();

    session()->flash('DeleteSuccessL','suppression avec succès ')  ;     
    return redirect('lots/gerer/'.$idM); 
    } 
    
    
    
   public function etat($idL)
    {
     $idLot=str_replace("'", "", $idL);
     
     $dateP=Lot::where('id',$idLot)->value('dateP');
     
     $date1 = new \DateTime();
     $date2 = new \DateTime($dateP.'23:59:59');
     
   
     $difference = $date1->diff($date2);
       
      
     echo $difference->y.'|' .$difference->m.'|'.$difference->d.'|'.$difference->format('%H').'|'.$difference->format('%I').'|' .$difference->format('%r').'|';
   }     
    
  
   public function rechercheParDate($mois,$annee,$idM)//Ajax
    {
    $moisSansApos=str_replace("'", "", $mois);
    $anneeSansApos=str_replace("'", "", $annee);     
    $idMSansApos=str_replace("'", "", $idM);
         
    if ($moisSansApos=='mois..') { 
    $results= Lot::where('medicament_id',$idMSansApos)->where('dateP','like',$anneeSansApos.'%')
                                                      ->orderBy('dateP')->get();}
    
    else if ($anneeSansApos=='année..') {
    $anneeCourent=date("Y");    
  $results=Lot::where('medicament_id',$idMSansApos)->where('dateP','like',$anneeCourent.'-'.$moisSansApos.'%')
                                                 ->orderBy('dateP')->get();}
    
    else{    
 $results= Lot::where('medicament_id',$idMSansApos)->where('dateP','like',$anneeSansApos.'-'.$moisSansApos.'%')
                                                   ->orderBy('dateP')->get();}
    
    foreach($results as $result)
    {
	echo $result->numero.'|'.$result->Qte.'|'.$result->dateF.'|'.$result->dateP.'|'.$result->prixAchat.'|'
        .$result->prixVente.'|'.$result->id.'|';
    }
    }
    
    
    
    
    
   
}
