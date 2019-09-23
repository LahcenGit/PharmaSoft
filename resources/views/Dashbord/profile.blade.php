@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Votre Profile </h1>
            <p class="mb-4">Pour modifier un profile il faut demander a l'admin de l'applicatioon </a>.</p>


            <body class="bg-gradient-primary">

  <div class="container text-center">
  <div class="d-flex justify-content-center">
    <div class="card  o-hnameden col-lg-7 border-0 shadow-lg my-5 ">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <div class="h4 text-gray-900 mb-4">
                <img src="{{asset('storage/image/'.Auth::user()->photo)}}" class="rounded-circle mx-auto d-block" alt="200x200" style="width: 200px; height: 200px;" >
                  </div>
                
              </div>
              <form method="POST" action="{{url('Dashbord/users/'.$user->id)}}" enctype="multipart/form-data" class="user">
              <input type="hidden" name="_method" value="PUT">
              @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="disabled form-control form-control-user @error('name') is-invalid @enderror" name="name" placeholder="First Name" value="{{ $user->name }}" disabled> 
                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('prenom') is-invalid @enderror" name="prenom" placeholder="Last Name" value="{{ $user->prenom }}" disabled>
                    @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ $user->email }}" disabled>
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0 ">
                    <input type="date" class="form-control form-control-user @error('date_nais') is-invalid @enderror" name="date_nais" value="{{ $user->date_nais }}" disabled>
                    @error('date_nais')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('telephone') is-invalid @enderror" name="telephone" placeholder="Téléphone" value="{{ $user->telephone }}"disabled >
                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                </div>
                
                


                

                
               
                
              </form>

              
              <a href="{{url('Dashbord/users/'.Auth::user()->id.'/edit')}}"><div  class="btn btn-warning btn-circle btn-lg">
                    <i class="fas fa-edit"></i>
                    </div></a>
           

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      </div>

      </div>
      </div>
      </div>

   
  @include('/dashbord/partials/footer')

  <script>
            $('#validatedCustomFile').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
        </script>