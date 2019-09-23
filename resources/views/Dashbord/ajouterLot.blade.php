@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')

  
<div class="container-fluid"> 
  <div class="card shadow mb-4">
    <div class="card-header py-3">
       <form  action="{{url('/lot/insert/'.$idM)}}" method="post" class="user" >
       {{csrf_field()}}
       <div class="row">
         <div class="col-sm-1"> 
         </div> 
          <div class="col-sm-4">
         <div class="form-group">  
           <h5>saisir les informations du lot</h5>
         </div>      
         <div class="form-group">  
           <label >Numero:</label> 
           <input  name="numLot" id="numLot" class="form-control  @error('numLot') is-invalid @enderror" autocomplete="off">
            @error('numLot')
           <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
           @enderror
         </div> 
         <div class="form-group">      
           <label >Quantité:</label> 
           <input name="Qte" id="Qte"  class="form-control @error('Qte') is-invalid @enderror" 
           autocomplete="off">
            @error('Qte')
           <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
           @enderror
         </div>
         <div class="row">
            <div class="col-sm-6"> 
               <div class="form-group">      
                 <label >Date De Fabrication:</label> 
                 <input name="dateF" id="dateF"  type="date" class="form-control @error('dateF') is-invalid @enderror" >
                  @error('dateF')
                  <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
                  @enderror
                </div>
            </div>
            <div class="col-sm-6"> 
              <div class="form-group">      
                 <label >Date De Péremption:</label> 
                 <input name="dateP" id="dateP"  type="date" class="form-control @error('dateP') is-invalid @enderror" >
                  @error('dateP')
                 <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
                  @enderror
              </div>  
            </div>             

           </div>
          
          <div class="row">

            <div class="col-sm-6">  
              <div class="form-group">      
                 <label >Prix D'Achat:</label> 
                 <input name="prixA" id="prixA" class="form-control @error('prixA') is-invalid @enderror"placeholder="DA" autocomplete="off">
                  @error('prixA')
                 <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
                  @enderror
               </div> 
              </div>
              
            <div class="col-sm-6">  
              <div class="form-group">      
                 <label >Prix De Vente:</label> 
                 <input name="prixV" id="prixV" class="form-control @error('prixV') is-invalid @enderror"placeholder="DA" autocomplete="off">
                  @error('prixV')
                  <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
                  @enderror
              </div> 
             </div>

           </div> 
         
         <div class="form-group">   
                 <input type="submit"  value="Enregistrer"   class="btn btn-info" >
         </div>       
       </div> 
    </div>
</form>  
</div> 
</div> 
</div>      
<script type="text/javascript" src="{{asset('assets/rechercheDosageUnit.js')}}" ></script>    
    
@include('/dashbord/partials/footer')
  


   
	   