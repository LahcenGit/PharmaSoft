<!DOCTYPE html>
<html>																												
<header>
	  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-   wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">    
 <link rel="stylesheet" href="{{asset('assets/bootstrap.min.css')}}">

</header>
<body > 

          	<div class="table-responsive">
      <table class="table table-bordered" id="table" width="100%" cellspacing="0">
        <thead>
          <tr>  
           <th > Medicament</th> 
           <th > Quantite </th> 
           <th > Action </th>      
          </tr> 
        </thead>
        <tbody>
           
           @foreach($ventesActuel as $venteActuel )	
           <tr>
           <td >{{$venteActuel->nom}} {{$venteActuel->dosage}} {{$venteActuel->dosageunit}} {{$venteActuel->forme}}</td> 
           <td> {{$venteActuel->Quantite}}</td> 
           <td> 
            <a href="{{ url('vente/delete/'.$venteActuel->idA )}}" class="btn btn-outline-warning " >
            	<i class="fa fa-minus "></i></a>
 
            </td> 
           </tr>
           @endforeach
        </tbody>
    </table>


          </div>             


<script src="{{asset('js/app.js')}}" ></script>
<script src="{{asset('assets/bootstrap.min.js')}}" ></script>

   </body>
</html>
