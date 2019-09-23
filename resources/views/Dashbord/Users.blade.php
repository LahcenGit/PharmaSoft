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
      
      <a href="{{url('Dashbord/adduser')}} " >
      <button type="submit" class="btn btn-success ">
        
          <i class="fas fa-plus"> </i> Ajouter un pharmacien 
       
      </button>
      </a>
    
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
                   
                    <a href="{{url('Dashbord/users/'.$user->id.'/edit')}}" class="btn btn-warning btn-circle">
                        <i class="fas fa-pencil-alt"> </i>
                    </a>
                    @can('before', $user)
                    <button type="submit" class="btn btn-danger btn-circle" onclick="return confirm('Vous voulez vraiment supprimer?')"> <a class="btn btn-danger btn-circle" > 
                        <i class="fas fa-trash"> </i>
                    </a></button>
                    @endcan


                    @can('before', $user)
                    @if(!$user->is_admin)
                    <a href="{{url('Dashbord/designAsadmin/'.$user->id)}}"  onclick="return confirm('Désigner comme admin?')" class="btn btn-success btn-circle" >
                        <i class="fas fa-user"> </i>
                    </a>
                    @elseif($user->is_admin)
                    <a href="{{url('Dashbord/desiableAdmin/'.$user->id)}}"  onclick="return confirm('Supprimer les permision dadmin?')" class="btn btn-primary btn-circle" >
                        <i class="fas fa-user-slash"> </i>
                    </a>
                    @endif
                    @endcan
                    

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