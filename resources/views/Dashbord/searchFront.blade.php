<!DOCTYPE html>
<html>																												
<header>
<title>Liste Des Medicaments</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-   wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    
 <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}">
 <style type="text/css"> .espace{  margin-left: 5px;} </style>    
</header>    
    
<body >

      
<div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-header py-3">
      <div class="row">


           <div class="col-sm-4" >
           <div class="input-group">
           <div>
           <button class="btn btn-info" >
           <i class="  fa fa-search fa-1x" ></i>
           </button>
           </div>
        <input  name="rechercheN" id="rechercheN" oninput="fonction2()" class="form-control" autocomplete="off"        placeholder= "Nom Du Médicament...">
         
          </div> 
        </div >   

          <div class="col-sm-4"> 
          <div class="input-group">
              <div>
                 <button class="btn btn-info" >
                  <i class="  fa fa-search fa-1x" ></i>
                 </button>
              </div>
       
          <select id="rechercheF"  name="rechercheF"  onchange="fonction23()" 
                  class="browser-default custom-select "  >  
          <option disabled selected >Forme...</option>
          <option >Tous</option> 
          <?php 
          $i=0;
          $coleur;
          foreach($formes as $forme)
          {
           if(is_int($i/2)) {$coleur="#E6E6FA";}
           else{$coleur="#FFFFFF";}
           echo"<option style='background-color:$coleur'>".$forme->nom."</option>";
           $i=$i+1;   
          }
          ?>
          </select>    
          </div>
        
          </div>
            
                      
                   
          <div class="col-sm-4" > 
            <div class="input-group">
              <div>
                 <button class="btn btn-info" >
                  <i class="  fa fa-search fa-1x" ></i>
                 </button>
              </div>
       
          <select id="rechercheC"  name="rechercheC"  onchange="fonction()" 
                  class="browser-default custom-select "  >  
          <option disabled selected >Classe Thérapeutique...</option>
          <option >Tous</option> 
          <?php 
          $i=0;
          $coleur;
          foreach($class as $clas)
          {
           if(is_int($i/2)) {$coleur="#E6E6FA";}
           else{$coleur="#FFFFFF";}
           echo"<option style='background-color:$coleur'>".$clas->nom."</option>";
           $i=$i+1;   
          }
          ?>
          </select>    
          </div>
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
           <th > Remboursable? </th>     
           <th > Disponibilité </th>      
          </tr> 
        </thead>
        <tfoot>
          <tr>
           <th > Nom Chimique</th> 
           <th > Forme </th>     
           <th > Dosage</th> 
           <th > Quantité </th> 
           <th > Nombre Lots </th> 
           <th > Remboursable? </th>
           <th > Disponibilité </th> 
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
          @if ($medic->remboursable=="Oui")
          <td style='color:green'>Remboursable</td>
          @else
          <td style='color:#FFA500'>Non Remboursable</td>
          @endif

          @if ($medic->disponibe=="Oui")
          <td style='color:green'>DISPONIBLE</td>
          @else
          <td style='color:#FFA500'>Non DISPONIBLE</td>
          @endif
          
          </tr>     
          @endforeach     
        
         
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->




<script type="text/javascript" src="{{asset('assets/rechercheClass.js')}}" ></script>    
<script type="text/javascript" src="{{asset('assets/rechercheNom.js')}}" ></script> 
<script type="text/javascript" src="{{asset('assets/rechercheForme.js')}}" ></script>   
 
<script src="{{asset('js/app.js')}}" ></script>
<script src="{{asset('assets/bootstrap.min.js')}}" ></script>




   </body>
</html>