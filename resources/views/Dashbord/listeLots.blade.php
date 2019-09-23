@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')


      
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Lots</h1>
<p class="mb-4">Vous trouverez dans ce tableau tous les les lots du médicaments {{$medic->nom}} {{$medic->dosage}}{{$medic->dosageunit}} </p>

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-header py-3">
      <div class="row">

          <div class="col-sm-7"> 
          <h6 class="m-0 font-weight-bold text-info col-10">{{$medic->nom}} {{$medic->dosage}}{{$medic->dosageunit}}</h6> 
          </div>
          
          <div class="col-sm-3"> 
             <div class="input-group">
                   
                             <div >
                              <button class="btn btn-info" >
                              <i class="  fa fa-search fa-1x" ></i>
                              </button>
                             </div>
                                  
                   
                             <select id="rechercheM"  name="rechercheM"  onchange="fonction4({{$medic->id}})" class="form-control" >  
                             <option disabled selected >mois..</option> 
                             <option value="01" style='background-color:#E6E6FA'>Janvier</option> 
                             <option value="02">Février</option> 
                             <option value="03" style='background-color:#E6E6FA'>Mars</option> 
                             <option value="04">Avril</option> 
                             <option value="05" style='background-color:#E6E6FA'>Mai</option> 
                             <option value="06">Juin</option>
                             <option value="07" style='background-color:#E6E6FA'>Juillet</option>
                             <option value="08">Août</option>
                             <option value="09" style='background-color:#E6E6FA'>Septembre</option>
                             <option value="10">Octobre</option>
                             <option value="11" style='background-color:#E6E6FA'>Novembre</option>
                             <option value="12">Décembre</option>
                             </select >
                           
                             <select id="rechercheA"  name="rechercheA"  onchange="fonction4({{$medic->id}})" class="form-control"  >  
                             <option disabled selected >année..</option> 
                             
                             <?php 
                             $i=0;
                             $coleur;
                             foreach($tabAnnees as $annee)
                             {
                             if(is_int($i/2)) {$coleur="#E6E6FA";}
                             else{$coleur="#FFFFFF";}
                             echo"<option style='background-color:$coleur'>".$annee."</option>";
                             $i=$i+1;   
                             }
                             ?>
                             
                             </select >
                          
                  </div> 
                </div >
                <div class="col-sm-2"> 
                <a href="{{ url('/lot/index/'.$medic->id )}}" class="btn btn-info " > Ajouter un lot  </a>
                </div>   
          </div>
     </div>
  <div class="card-body">
    @if (session()->has('InsertSuccessL'))
      <div class="alert alert-success alert-dismissible" >
           <strong>Opération réussie: </strong>
          {{session()->get('InsertSuccessL')}}
          <button class = "close btn-success" data-dismiss="alert" > × </button>
      </div>
    @endif 
    @if (session()->has('UpdateSuccessL'))
      <div class="alert alert-success alert-dismissible" >
          <strong>Opération réussie: </strong>
          {{session()->get('UpdateSuccessL')}}
          <button class = "close btn-success" data-dismiss="alert" > × </button> 
      </div>
    @endif
    @if (session()->has('DeleteSuccessL'))
      <div class="alert alert-success alert-dismissible" >
          <strong>Opération réussie: </strong>      
          {{session()->get('DeleteSuccessL')}}
          <button class = "close btn-success" data-dismiss="alert" > × </button>
      </div>
    @endif  
    <div class="table-responsive">
      <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
           
        <thead >
          <tr class = "selected">  
           <th > Numero</th> 
           <th > Quantité </th>     
           <th > Date De Fabriction</th> 
           <th > Date De Péremption </th> 
           <th > Prix d'Achat </th>     
           <th > Prix de Vente </th> 
            <th > Actions </th>   
          </tr> 
        </thead>
        <tfoot>
          <tr>
           <th > Numero</th> 
           <th > Quantité </th>     
           <th > Date De Fabriction</th> 
           <th > Date De Péremption </th> 
           <th > Prix d'Achat </th>     
           <th > Prix de Vente </th>      
           <th > Actions </th> 
          </tr>
          </tfoot>
        <tbody>
         

         @foreach($lots as $lot)
         <tr>
          <td> {{$lot->numero}} </td>
          <td> {{$lot->Qte}} </td>    
          <td> {{$lot->dateF}}</td>
          <td> {{$lot->dateP}} </td>
          <td> {{$lot->prixAchat}} </td>
          <td> {{$lot->prixVente}} </td>     
          <td>
    
          <a href="{{ url('lot/edite/'.$lot->id )}}" class="btn btn-outline-success " >Editer </a>
          <a href="#" class="btn btn-outline-danger"  onclick="fonction11({{$lot->id}})">Supprimer</a>
          <a href="#" class="btn btn-outline-info" onclick="fonction10({{$lot->id}})">Etat</a>
          </td>
        </tr>     
        @endforeach     
         
        </tbody>
      </table>
    </div>
  </div>
     

</div>

</div>
    
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">La période d'expiration</h5>
                      <button type="button" class="btn btn-outline-danger close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                   </div>
                   <div id="contenue" class="modal-body">
                
                   </div>
                   <div class="modal-footer">
                      <button type="button" class="btn btn-outline-info" data-dismiss="modal">Close</button>
                   </div>
               </div>
           </div>
    </div>
    
    <div class="modal fade" id="supprimerLot" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                      <h5 class="modal-title" id="ModalLabel">Attention !!</h5>
                      <button type="button" class="btn btn-outline-danger close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                   </div>
                   <div  class="modal-body">
                   Vouler vous supprimer ce lot
                   </div>
                   <div class="modal-footer">
                     <a  id='lien' class="btn btn-outline-danger " >Supprimer </a>
                     <button type="button" class="btn btn-outline-success" data-dismiss="modal">Annuler</button>
                   </div>
               </div>
           </div>
    </div>

<!-- /.container-fluid -->


<!-- End of Main Content -->

<script type="text/javascript" src="{{asset('assets/rechercheParDate.js')}}" ></script>  
<script type="text/javascript" src="{{asset('assets/modalBody.js')}}" ></script>  
<script type="text/javascript" src="{{asset('assets/confirmeDeleteLot.js')}}" ></script>    
<script>   
    function fonction15()
         {        
         getElementById("rechercheM").selectedIndex=0; 
         getElementById("rechercheA").selectedIndex=0;      
         }
</script>    

@include('/dashbord/partials/footer')