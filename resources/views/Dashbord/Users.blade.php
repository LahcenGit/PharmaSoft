@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Utilisateurs</h1>
<p class="mb-4">Vous trouverez dans ce tableau tous les utilisateurs inscrits sur la platforme vous pouvez les gérer .</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-header py-3">
      <div class="row">
      <h6 class="m-0 font-weight-bold text-primary col-10">Utilisateurs inscrits</h6>
      <button type="submit" class="btn btn-success float-right col-2"><i class="fas fa-plus"> </i> Ajouter un pharmacien 
      </button>
    
      </div>
    
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Nais.</th>
            <th>Téléphone</th>
            <th>Date d'inscription</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
          <th>Nom</th>
            <th>Prénom</th>
            <th>Date de Nais.</th>
            <th>Téléphone</th>
            <th>Date d'inscription</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->prenom}}</td>
            <td>{{$user->date_nais}}</td>
            <td>{{$user->telephone}}</td>
            <td>{{$user->created_at}}</td>
            <td class="text-center">

                <form action="{{url('Dashbord/users/'.$user->id)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                    <a href="" class="btn btn-info btn-circle">
                        <i class="fas fa-info-circle"> </i>
                    </a>
                    <a href="" class="btn btn-warning btn-circle">
                        <i class="fas fa-pencil-alt"> </i>
                    </a>
                    <button type="submit" class="btn btn-danger btn-circle"> <a class="btn btn-danger btn-circle"> 
                        <i class="fas fa-trash"> </i>
                    </a></button>
                    
                    <a href="{{url('Dashbord/designAsadmin/'.$user->id)}}" class="btn btn-primary btn-circle">
                        <i class="fas fa-user-cog"> </i>
                    </a>
                    

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

</div>
<!-- End of Main Content -->


@include('/dashbord/partials/footer')