@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')
      
<div class="container-fluid"> 
  <div class="card shadow mb-4">
    <div class="card-header py-3">
       <form  action="{{url('lot/update/'.$lot->id)}}" method="post" >
       <input type="hidden" name="_method" value="PUT">

       {{csrf_field()}}
       <div class="row">
         <div class="col-sm-1"> 
         </div> 
          <div class="col-sm-4">
         <div class="form-group">  
           <h5>modifier les informations du lot</h5>
         </div>      
         <div class="form-group">  
           <label >Numero:</label> 
           <input  name="numLot" id="numLot" class="form-control" value="{{$lot->numero}}" autocomplete="off">
         </div> 
         <div class="form-group">      
           <label >Quantité:</label> 
           <input name="Qte" id="Qte"  class="form-control" value="{{$lot->Qte}}" autocomplete="off">
         </div>
         <div class="row">
            <div class="col-sm-6"> 
               <div class="form-group">      
                 <label >Date De Fabrication:</label> 
                 <input name="dateF" id="dateF"  type="date" class="form-control"  value="{{$lot->dateF}}" >
               </div>
               <div class="form-group">      
                 <label >Prix D'Achat:</label> 
                 <input name="prixA" id="prixA" class="form-control" placeholder="DA" value="{{$lot->prixAchat}}"
                 autocomplete="off">
               </div>         
           </div>
           <div class="col-sm-6"> 
              <div class="form-group">      
                 <label >Date De Péremption:</label> 
                 <input name="dateP" id="dateP"  type="date" class="form-control" value="{{$lot->dateP}}" >
              </div>  
              <div class="form-group">      
                 <label >Prix De Vente:</label> 
                 <input name="prixV" id="prixV" class="form-control" placeholder="DA" value="{{$lot->prixVente}}"
                 autocomplete="off">
              </div>        
           </div>
         </div>
         <div class="form-group">   
                 <input type="submit"  value="Modifier"   class="btn btn-info">
         </div>       
       </div> 
    </div>
</form>  
</div> 
</div> 
</div>      
<script type="text/javascript" src="{{asset('assets/rechercheDosageUnit.js')}}" ></script>    
    


@include('/dashbord/partials/footer')
   
