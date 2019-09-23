@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')

<div class="container-fluid">



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Vente</h1>
<p class="mb-4">Effectuez des vente à l'aide de l'interface suivante</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-header py-3">
      <div class="row">
      <h6 class="m-0 font-weight-bold text-primary col-10">Saisir les informations du médicament</h6>
      
      
    
      </div>

      

    
  </div>
  <div class="card-body">
  <form  action="{{URL('/vente/insert')}}" method="POST" enctype="multipart/form-data" class="user">
          @csrf
          <div class="row">

          <div class="col-sm-1"> 
          </div> 
          <div class="col-sm-4"> 

          <div class="form-group">  
        
          </div> 

          <div class="form-group ">  
          <label >Nom Chimique:</label> 
          <input name="nom" id="nom" list="li" class="form-control " autocomplete="off" oninput="formeM()">
          <datalist id="li" >
          @foreach($medics as $medic)       
          <option  value="{{$medic->nom}} ">     
          @endforeach
          </datalist>
          
          </div> 

         
          <div class="form-group">      
          <label>Forme:</label> 
          <select name="forme" id="forme"  class="browser-default custom-select " 
          onchange="fonction3()" >
          <option selected ></option>
          @foreach($formes as $forme)       
          <option>{{$forme->nom}} </option>     
          @endforeach    
          </select>      
          </div>  

          <div class="form-group">      
          <label >Dosage:</label> 
          <input name="dosage" id="dosage"  class="form-control "autocomplete="off">
          
          <br>
          <select name="dosageUnit" id="dosageUnit"  class="browser-default custom-select "> 
          </select>   
          </div> 

          

          </div>
          <div class="col-sm-1"> 
          </div> 
          <div class="col-sm-4">
          <div class="form-group">  
         
          </div> 

          <div class="form-group">  
          <label >Numero de lot:</label> 
          <select class="form-control" id="numL" name="numL">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
          </div>

          <div class="form-group">      
          <label >Quantité:</label> 
          <input name="Qte" id="Qte"  class="form-control " autocomplete="off">
          </div>

            <div class="form-group">   
          <input type="submit"  value="Enregistrer"   class="btn btn-info">
          </div>

          </div> 
          
          </div>

        
          </form>  

  </div>
</div>

<div class="card shadow mb-4">

  <div class="card-header py-3">
      <div class="row">
      	<div class="col-sm-8">
      <h6 class="m-0 font-weight-bold text-primary col-10">Medicaments vendus</h6>
         </div>
         <div class="col-sm-4 d-flex justify-content-end fa-4x">
      <a href="" class="btn btn-outline-primary " >
            	<i class="fa fa-file-pdf "></i></a>
         </div>
      </div>

      

    
  </div>
  <div class="card-body">

  <iframe class="ifram-costum" src="{{URL('/vente/venteFrame')}}"></iframe>

  </div>
</div>

</div>
<!-- /.container-fluid -->

<script type="text/javascript" src="{{asset('assets/rechercheDosageUnit.js')}}" ></script>
<script type="text/javascript" src="{{asset('assets/numLot.js')}}" ></script>
<script type="text/javascript" src="{{asset('assets/formeM.js')}}" ></script>



@include('/dashbord/partials/footer')






