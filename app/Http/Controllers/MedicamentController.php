<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classterapeutique;
use App\Medicament;
use App\Medicamentforme;
use App\Medicamenthistorique;
use App\Dosageunit;
use App\Lot;
use Auth;
use App\Http\Requests\medicamentRequest;
use App\Http\Requests\medicament_lot_Request;

class MedicamentController extends Controller
{
        // all('nom') retourn le nom de tous les produits[{"nom":"Allergologie"},{"nom":"Anesth\u00e9sie //"},{"nom":"Antalgiques "}]
        // first() retourn { une seul ligne }
        // first('id') retourn {"id":2}
        // value('nom') retourn ex: doliprane
        // get('nom') retourn ex:[{"nom":"Sirop"},{"nom":"pomade"},{"nom":"goutte"}]
        // get() retourn ex:[{"id":2,"nom":"Sirop"},{"id":3,"nom":"pomade"},{"id":4,"nom":"goutte"}]
        // find($idMedic)<=>where('id',$idMedic)

     
            
    public function index()
    {
     $listClass= Classterapeutique::orderBy('nom')->get('nom');
     $listForme= Medicamentforme::orderBy('nom')->get('nom');    
     return view('dashbord.ajouterMedicament',['class'=>$listClass ,'formes'=>$listForme]);
    }
    
    
    public function insert(medicament_lot_Request $requete)
    {
     $idM=Medicament::where('nom',$requete->input('nom'))
                    ->where('dosage',$requete->input('dosage'))
                    ->where('forme',$requete->input('forme'))->value('id');    
     if($idM==null){  
     //recuperer id de la class     
     $idC=Classterapeutique::where('nom',$requete->input('class'))->value('id');
     if($idC==null)
     {
     $class=new Classterapeutique();
     $class->nom=ucwords($requete->input('class')); 
     $class->save(); 
     }
     
     $medicament=new Medicament();
     $medicament->nom=strtoupper($requete->input('nom'));   
     $medicament->forme=$requete->input('forme') ;
     $medicament->dosage= $requete->input('dosage'); 
     $medicament->dosageunit=$requete->input('dosageUnit') ; 
     $medicament->classTerapeutique=$requete->input('class');     
     $medicament->save();
     // recuperer id du medicament apres insertion d'un nouveau medicament    
     $idM=$medicament->id;  
     //historique
     $historique=new Medicamenthistorique();
     $historique->user_id = Auth::user()->id;
     $historique->medicament_id=$idM ; 
     $historique->numLot=null;
     $historique->date=date("y-m-d");
     $historique->heure=date("H:i:s");
     $historique->operation="insert"; 
     $historique->save();    
    
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
     
     session()->flash('InsertSuccessM',$requete->input('nom').' '.$requete->input('dosage').''.
            $requete->input('dosageUnit').' a ete ajouter avec succès')  ;   
     return redirect('medicaments/gerer'); }
        
     else{
     session()->flash('ExisteErrorM',$requete->input('nom').' '.$requete->input('dosage').''.
                                     $requete->input('dosageUnit').' existe deja !!')  ;   
     return redirect('medicaments/gerer'); }
       
    } 
   
     
    public function gerer()
    {
     $listeMedics= Medicament::orderBy('nom')->get();
     $listeClass= Classterapeutique::orderBy('nom')->get('nom'); 
     return view('dashbord.listeMedicaments',['class'=>$listeClass ,'medics'=>$listeMedics]);
    }
    
    
    public function edite($idMedic)
    {
      $medic=Medicament::find($idMedic);    
      $listClass= Classterapeutique::orderBy('nom')->get('nom');
      $medicforme=Medicament::where('id',$idMedic)->value('forme');
      $listForme= Medicamentforme::where('nom', '<>',$medicforme )->orderBy('nom')->get('nom'); 
      return view('dashbord.modifierMedicament',['class'=>$listClass ,'formes'=>$listForme ,'medic'=>$medic]);
    }
    
    
    public function update(medicamentRequest $requete,$idMedic)
    {
     //recuperer id de la class     
     $idC=Classterapeutique::where('nom',$requete->input('class'))->value('id');
     if($idC==null)
     {
     $class=new Classterapeutique();
     $class->nom=ucwords($requete->input('class')); 
     $class->save(); 
     }
     $medicament=Medicament::find($idMedic);
     $medicament->nom= strtoupper($requete->input('nom'));   
     $medicament->forme=$requete->input('forme') ;
     $medicament->dosage= $requete->input('dosage'); 
     $medicament->dosageunit=$requete->input('dosageUnit') ; 
     $medicament->classTerapeutique=$requete->input('class');     
     $medicament->save();

     //historique
     $historique=new Medicamenthistorique();
     $historique->user_id=Auth::user()->id;
     $historique->medicament_id=$idMedic ; 
     $historique->numLot=null;
     $historique->date=date("y-m-d");
     $historique->heure=date("H:i:s");
     $historique->operation="update"; 
     $historique->save();
     
     session()->flash('UpdateSuccessM','modification avec avec succès')  ;   
     return redirect('medicaments/gerer'); 
    }
    
    
    public function delete($idMedic)
    {
     $idMSansApos=str_replace("'", "", $idMedic);     
     $medicament=Medicament::find($idMSansApos);
     $lots=Lot::where('medicament_id',$idMSansApos)->get();
     foreach($lots as $lot)
     {    
     $lot->delete();
     }
     $medicament->delete();   
     session()->flash('DeleteSuccessM','suppression avec succès ')  ;     
     return redirect('medicaments/gerer'); 
    }
   
               
     
    
    
    
    public function rechercheParNom($nomM)//Ajax
    {
    $nomSansApos=str_replace("'", "", $nomM);     
    $results= Medicament::where('nom', 'like',$nomSansApos.'%')->orderBy('nom')->get();
    foreach($results as $result)
    {
	echo $result->id.'|'.$result->nom.'|'.$result->forme.'|'.$result->dosage.'|'.$result->dosageunit.'|'
                  .$result->Qte.'|' .$result->nbrLots.'|';
    }
    }
    
    
    public function rechercheParClass($nomC)//Ajax
    {
    $nomClassSansApos=str_replace("'", "", $nomC);
    $result=0;     
    if($nomClassSansApos=='Tous'){  
                     $results= Medicament::orderBy('nom')->get();}
    else{    
                     $results= Medicament::where('classTerapeutique',$nomClassSansApos)->orderBy('nom')->get();}
    foreach($results as $result)
    {
	echo $result->id.'|'.$result->nom.'|'.$result->forme.'|'.$result->dosage.'|'.$result->dosageunit.'|'.$result->Qte.'|'.$result->nbrLots.'|';
    }
    }
    
    public function rechercheDosageUnit($forme)//Ajax
    {
    $formeSansApos=str_replace("'", "", $forme);
    $idf=Medicamentforme::where('nom',$formeSansApos)->value('id');
         
    $results= Dosageunit::where('medicamentforme_id',$idf)->get();
    foreach($results as $result)
    {
	echo $result->dosageUnit.'|';
    }
    }
    
   
   
    public function details($idMedic)
    {
      $medic=Medicament::find($idMedic);
      $listLots=Lot::where('medicament_id',$idMedic)->get();
      $i=0;
      $tab=array();
      
      foreach($listLots as $lot)
          {
            $dateP=Lot::where('id',$lot->id)->value('dateP');
            $date1 = new \DateTime();
            $date2 = new \DateTime($dateP.'23:59:59');
            $difference = $date1->diff($date2); 
            if($difference->format('%r')=='')
                {$tab[$i]='NON';$i=$i+1;}
            else
                {$tab[$i]='OUI';$i=$i+1;}
          }
      $date_mois_passe=date("Y-m-d", time()-30*24*3600);

      $historiques=Medicamenthistorique::where('medicament_id',$idMedic)
                  ->where('date','>=',$date_mois_passe)
                  ->join('medicaments', 'medicament_id', '=', 'medicaments.id')
                  ->join('users', 'user_id', '=', 'users.id')
                  ->select('medicaments.nom','medicaments.dosage','medicaments.dosageunit','users.name','users.prenom','numLot','heure','date','operation')
                  ->orderBy('date','desc')
                  ->orderBy('heure','desc')
                  ->get();
      $dates=Medicamenthistorique::where('medicament_id',$idMedic)
                                ->where('date','>=',$date_mois_passe)
                                ->orderBy('date','desc')
                                ->distinct()
                                ->get('date');
          

      return view('dashbord.detailsMedicament',['lots'=>$listLots ,'medic'=>$medic,'tab'=>$tab,
                                                  'dates'=>$dates,'historiques'=>$historiques]);
    }


    function medicsmin(){

        $medics = Medicament::where ('Qte', '<' ,10)->where ('Qte', '>' ,0)->get();

        return view ('dashbord.medicsmin' , ['medics' => $medics]);
        
        }


        function medicsrupture(){

            $medics = Medicament::where ('Qte' ,0)->get();
    
            return view ('dashbord.medicsrupture' , ['medics' => $medics]);
            
            }


        function medicsearch(){
            
              $listeMedics= Medicament::orderBy('nom')->get();
                $listeClass= Classterapeutique::orderBy('nom')->get('nom'); 

                $listeformes= Medicamentforme::orderBy('nom')->get('nom');
                
                return view('dashbord/searchFront',['class'=>$listeClass ,'medics'=>$listeMedics , 'formes'=>$listeformes ]);
                
               

        }



        public function rechercheForme($nomF)//Ajax
        {
        $forme=str_replace("'", "", $nomF);
        $result=0;     
        if($forme=='Tous'){  
                         $results= Medicament::orderBy('nom')->get();}
        else{    
                         $results= Medicament::where('forme',$forme)->orderBy('nom')->get();}
        foreach($results as $result)
        {
        echo $result->id.'|'.$result->nom.'|'.$result->forme.'|'.$result->dosage.'|'.$result->dosageunit.'|'.$result->Qte.'|'.$result->nbrLots.'|';
        }
        }
    
    
}
