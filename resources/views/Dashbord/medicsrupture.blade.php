@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')
      
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Médicaments en rupture</h1>
<p class="mb-4">Vous trouverez dans ce tableau tous les médicaments en rupture .</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-header py-3">
      <div class="row">

          <div class="col-sm-4"> 
          <h6 class="m-0 font-weight-bold text-info col-10">Medics en rupture</h6> 
          </div>
            
                      
                   
        
             
          

       
         

      </div>
    
  </div>
    
  <div class="card-body">
      
      
      
    <div class="table-responsive">
      <table class="table table-bordered" id="table" width="100%" cellspacing="0">
        <thead>
          <tr>  
           <th > Nom Chimique</th> 
           <th > Forme </th>     
           <th > Dosage</th> 
           <th > Quantité </th> 
           <th > Nombre Lots </th>     
           <th > Actions </th>      
          </tr> 
        </thead>
        <tfoot>
          <tr>
           <th > Nom Chimique</th> 
           <th > Forme </th>     
           <th > Dosage</th> 
           <th > Quantité </th> 
           <th > Nombre Lots </th>     
           <th > Actions </th> 
          </tr>
        </tfoot>
        <tbody >
         @foreach($medics as $medic)
         <tr>
          <td> {{$medic->nom}} </td>
          <td> {{$medic->forme}} </td>    
          <td> {{$medic->dosage}}{{$medic->dosageunit}}</td>
          <td> {{$medic->Qte}} </td>
          <td> {{$medic->nbrLots}} </td>    
          <td>
    
          <a href="{{ url('medicament/edite/'.$medic->id )}}" class="btn btn-outline-success " >Editer </a>
          <a href="#" class="btn btn-outline-danger" onclick="fonction12({{$medic->id}})">Supprimer</a> 
          <a href="{{ url('medicament/details/'.$medic->id )}}" class="btn btn-outline-info " >Detail</a>
          <a href="{{ url('lots/gerer/'.$medic->id )}}" class="btn btn-outline-warning " >Gerer Lots</a>

          </td>
        </tr>     
        @endforeach     
        
         
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->



    <div class="modal fade" id="supprimerMedicament" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                <div class="modal-content">
                   <div class="modal-header">
                      <h5 class="modal-title" id="ModalLabel">Attention !!</h5>
                      <button type="button" class="btn btn-outline-danger close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                   </div>
                   <div  class="modal-body">
                   Vouler vous supprimer ce medicament
                   </div>
                   <div class="modal-footer">
                     <a  id='lien' class="btn btn-outline-danger " >Supprimer </a>
                     <button type="button" class="btn btn-outline-success" data-dismiss="modal">Annuler</button>
                   </div>
               </div>
           </div>
    </div>

<!-- Pour la gestion des tableau et l'jout des filtre de recherche automatiquement -->

<script type="text/javascript" src="{{asset('assets/rechercheParClass.js')}}" ></script>    
<script type="text/javascript" src="{{asset('assets/rechercheParNom.js')}}" ></script> 
<script type="text/javascript" src="{{asset('assets/confirmeDeleteMedicament.js')}}" ></script>


@include('/dashbord/partials/footer')



