@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')

<div class="container-fluid">
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{session()->get('success')}}
</div>
@endif



<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Fournisseurs</h1>
<p class="mb-4">Vous trouverez dans ce tableau tous les fournisseurs inscrits sur la platforme vous pouvez les gérer .</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-header py-3">
      <div class="row">
      <h6 class="m-0 font-weight-bold text-primary col-10">Fournisseurs inscrits</h6>
      
      <a href="{{url('Dashbord/fournisseurs/create')}} " >
      <button type="submit" class="btn btn-success ">
        
          <i class="fas fa-plus"> </i> Ajouter un fournisseur 
       
      </button>
      </a>
    
      </div>
    
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nom complet</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Nom complet</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($fours as $four)
          <tr>
            <td>{{$four->nom}}</td>
            <td>{{$four->adresse}}</td>
            <td>{{$four->telephone}}</td>
            <td>{{$four->email}}</td>
            
            <td class="text-center">

                <form action="{{url('Dashbord/fournisseurs/'.$four->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                    <a onclick="return functioninfo()" href="#" class="btn btn-info btn-circle">
                        <i class="fas fa-info-circle"> </i>
                    </a>
                    <a href="{{url('Dashbord/fournisseurs/'.$four->id.'/edit')}}" class="btn btn-warning btn-circle">
                        <i class="fas fa-pencil-alt"> </i>
                    </a>
                    <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Vous voulez vraiment supprimer?')"> <a class="btn btn-danger btn-circle"> 
                        <i class="fas fa-trash"> </i>
                    </a></button>
                    
                    
                    

                </form>
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


<div id ="modalinfo" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id ='titleinfo'class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</div>
<!-- End of Main Content -->

<script type="text/javascript" src="{{asset('assets/confirmeDeleteFournisseur.js')}}" ></script>


@include('/dashbord/partials/footer')

