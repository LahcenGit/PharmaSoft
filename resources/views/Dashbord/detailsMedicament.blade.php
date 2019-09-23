@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')

<div class="container-fluid">
       <h1 class="h3 mb-2 text-gray-800">Details</h1>	
       <p class="mb-4">Vous trouverez dans cette page tous les les details du médicaments {{$medic->nom}} {{$medic->dosage}}{{$medic->dosageunit}}.. </p>
  <div class="row">

    <div class="col-sm-6">
    	<div class="card shadow mb-4">
        <div class="card-header py-3">	
           <h6 class="text-info ">Informations sur ({{$medic->nom}} {{$medic->dosage}}{{$medic->dosageunit}})..</h6>
        </div>
        <div class="card-body">

        <div class="container-fluid">
          <table class="table table-borderless table-sm">
           <tr>  
           <td><b>Nom Chimique:</b> {{$medic->nom}} </td>     
           </tr> 
           <tr>  
           <td><b>Classe Thérapeutique:</b> {{$medic->classTerapeutique}}</td>     
           </tr> 
           <tr>  
           <td><b>Forme:</b> {{$medic->forme}}</td>     
           </tr> 
           <tr>  
           <td><b>Dosage:</b> {{$medic->dosage}}{{$medic->dosageunit}}</td>     
           </tr> 
           <tr>  
           <td><b>Quantité:</b> {{$medic->Qte}} </td>     
           </tr> 
           <tr>  
           <td><b>Nombre Lots:</b> {{$medic->nbrLots}}</td>     
           </tr>
          </table>
        </div>    
        </div>
        </div>

        <div class="card shadow mb-4">
        <div class="card-header py-3">	
           <h6  class="text-info ">Informations sur les lots du ( {{$medic->nom}} {{$medic->dosage}}{{$medic->dosageunit}} )..</h6>
        </div>
        <div class="card-body">
    	   <table  class="table table-sm table-hover">
           <thead>
           <tr>  
           <th > Numero</th> 
           <th > Quantité </th>     
           <th > Prix d'Achat </th>     
           <th > Prix de Vente </th> 
           <th > Périmé ? </th>  
           </tr> 
           </thead>
           <tbody>
           <?php	
           for($i = 0; $i < sizeof($lots);$i++)
           {
           echo" <tr>
           <td>".$lots[$i]->numero." </td>
           <td>".$lots[$i]->Qte." </td>    
           <td>".$lots[$i]->prixAchat." DA</td>
           <td>".$lots[$i]->prixVente." DA</td>";
           if ($tab[$i]=="OUI")
           {echo "<td style='color:red'>".$tab[$i]." </td>";}
           else
           {echo "<td style='color:green'>".$tab[$i]." </td>";}          
           echo "</tr> ";
           }
           ?>
           </tbody>
          </table>
        </div>
        </div>
    </div> 
    <div class="col-sm-6">
       <div class="card shadow mb-4">
        <div class="card-header py-3">	
          <h6 class="text-info ">Historique..</h6>
        </div>
       <div class="card-body ">
         
         

           @foreach($dates as $date)
	         <table class="table table-borderless table-hover table-sm">
           <thead class="thead-light">
           <th colspan=3>{{$date->date}}</th>
           </thead>

           <tbody class="overflow-auto"> 

           
           @foreach($historiques as $historique)
           @if($historique->date==$date->date)
           <tr>
           
           @if($historique->numLot==null && $historique->operation=="insert")

            <td><b>.</b></td>
            <td>{{$historique->name}} {{$historique->prenom}} 
              a ajouté {{$historique->nom}} {{$historique->dosage}} {{$historique->dosageunit}} </td>
            <td>{{$historique->heure}}</td>

           @elseif($historique->numLot!=null && $historique->operation=="insert")

            <td><b>.</b></td>
            <td>{{$historique->name}} {{$historique->prenom}} 
              a ajouté un lot sous le n° {{$historique->numLot}}</td>
            <td>{{$historique->heure}}</td>

           @elseif($historique->numLot==null && $historique->operation=="update")

            <td><b>.</b></td>
            <td>{{$historique->name}} {{$historique->prenom}} 
             a modifié  les information de {{$historique->nom}} {{$historique->dosage}} {{$historique->dosageunit}}</td>
            <td>{{$historique->heure}}</td>
            
           @elseif($historique->numLot!=null && $historique->operation=="update")

            <td><b>.</b></td>
            <td>{{$historique->name}} {{$historique->prenom}}  
             a modifié  les information du lot n° {{$historique->numLot}}    </td>
            <td>{{$historique->heure}}</td>

           @elseif($historique->numLot!=null && $historique->operation=="delete")

            <td><b>.</b></td>
            <td>{{$historique->name}} {{$historique->prenom}}  
            a supprimé le lot n° {{$historique->numLot}}    </td>
            <td>{{$historique->heure}}</td>    
            
           @endif 
           </tr>
           @endif    
           @endforeach  
           
           </tbody>
           </table> 
           @endforeach 
           </div>   
           
           
          
	  
     </div>
   </div>

</div>






</div>



@include('/dashbord/partials/footer')
   