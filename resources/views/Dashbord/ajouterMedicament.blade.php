@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')


  
<!--(1)--><div class="container-fluid"> 
          <div class="card shadow mb-4">
          <div class="card-header py-3">
          <form  action="{{ url('medicament/insert') }}" method="POST" enctype="multipart/form-data" class="user">
          @csrf
          <div class="row">

          <div class="col-sm-1"> 
          </div> 
          <div class="col-sm-4"> 

          <div class="form-group">  
          <h5>saisir les informations du médicament</h5>
          </div> 

          <div class="form-group ">  
          <label >Nom Chimique:</label> 
          <input name="nom" id="nom" class="form-control @error('nom') is-invalid @enderror" 
          autocomplete="off">
          @error('nom')
          <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
          @enderror
          </div> 

          <div class="form-group">      
          <label >Classe Thérapeutique:</label> 
          <input name="class" id="class"  list="li" class="form-control @error('class') is-invalid @enderror" autocomplete="off">
          @error('class')
          <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
          @enderror
          <datalist id="li" >
          @foreach($class as $clas)       
          <option  value="{{$clas->nom}} ">     
          @endforeach
          </datalist>
          </div> 

          <div class="form-group">      
          <label>Forme:</label> 
          <select name="forme" id="forme"  class="browser-default custom-select @error('forme') is-invalid @enderror" onchange="fonction3()" >
          @error('forme')
          <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
          @enderror  
          <option selected ></option>
          @foreach($formes as $forme)       
          <option>{{$forme->nom}} </option>     
          @endforeach    
          </select>      
          </div>  

          <div class="form-group">      
          <label >Dosage:</label> 
          <input name="dosage" id="dosage"  class="form-control @error('dosage') is-invalid @enderror"autocomplete="off">
          @error('dosage')
          <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
          @enderror
          <br>
          <select name="dosageUnit" id="dosageUnit"  class="browser-default custom-select @error('dosageUnit') is-invalid @enderror"> </select>   
          </div> 

          <div class="form-group">   
          <input type="submit"  value="Enregistrer"   class="btn btn-info">
          </div>

          </div>
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
          <input name="dateF" id="dateF"  type="date" 
          class="form-control @error('dateF') is-invalid @enderror" >
          @error('dateF')
          <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span> 
          @enderror
          </div>
          </div>
          <div class="col-sm-6"> 
          <div class="form-group">      
          <label >Date De Péremption:</label> 
          <input name="dateP" id="dateP"  type="date" 
          class="form-control @error('dateP') is-invalid @enderror" >
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
          <span class="invalid-feedback " role="alert"><strong>{{ $message }}</strong></span>            @enderror
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
         
          </div> 
          </div>
          </form>  
          </div> 
          </div> 
          </div>    
          
          <script type="text/javascript" src="{{asset('assets/rechercheDosageUnit.js')}}" ></script>         
@include('/dashbord/partials/footer')

    

   


   
	