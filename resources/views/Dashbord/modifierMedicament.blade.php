@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')
      
    

<body onLoad="fonction5()">
  
<div class="container-fluid"> 
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        
         <form  action="{{url('medicament/update/'.$medic->id)}}" method="post" >
             <input type="hidden" name="_method" value="PUT">
          {{csrf_field()}}
       <div class="row">
         <div class="col-sm-1">
             
         </div> 
         <div class="col-sm-4">  
           <div class="form-group">  
            <h5>modifier les informations du médicament</h5>
           </div>      
           <div class="form-group">  
            <label >Nom Chimique:</label> 
            <input name="nom" id="nom" class="form-control" value="{{$medic->nom}} " autocomplete="off">
           </div> 
           <div class="form-group">      
            <label >Classe Thérapeutique:</label> 
            <input name="class" id="class" list="li" class="form-control" value="{{$medic->classTerapeutique}}" 
            autocomplete="off">
            <datalist id="li">
            @foreach($class as $clas)       
            <option value=" {{$clas->nom}} ">       
            @endforeach
            </datalist>
           </div>       
           <div class="form-group">      
            <label >Forme:</label> 
            <select name="forme" id="forme"  class="form-control" onchange="fonction3()" >
            <option selected >{{$medic->forme}}</option>
            @foreach($formes as $forme)       
            <option > {{$forme->nom}} </option>     
            @endforeach    
            </select>      
           </div>    
           <div class="form-group">      
            <label >Dosage:</label> 
            <input name="dosage" id="dosage"  class="form-control" value="{{$medic->dosage}}"autocomplete="off">
            <br>
            <select name="dosageUnit" id="dosageUnit"  class="form-control" > 
               <option selected >{{$medic->dosageunit}}</option>
               </select>   
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
   
    
    
<script>   
    function fonction5()
         {        
         var val=document.getElementById("forme").value;
         if(val=='Sirop' || val=='Patch')
         {
         document.getElementById("dosage").disabled = true;
         }
         }
</script> 


@include('/dashbord/partials/footer')