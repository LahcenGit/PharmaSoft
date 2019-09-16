@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Ajouter des Fournisseurs</h1>
            <p class="mb-4">Vous pouvez ajouter tout simplement un Fournisseur.</p>


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
                     <div  class="btn btn-success btn-circle btn-lg">
                    <i class="far fa-address-book"></i>
                  </div></div>
                
              </div>
              <form method="POST" action="{{url('Dashbord/fournisseurs')}}" enctype="multipart/form-data" class="user">
              @csrf
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('nom') is-invalid @enderror" name="nom" placeholder="Nom complet" value="{{ old('nom' )}}">
                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                  
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user @error('adresse') is-invalid @enderror" name="adresse" placeholder="Addresse" value="{{ old('adresse' )}}">
                  @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0 ">
                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder ="Email" value="{{ old('email' )}}">
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('telephone') is-invalid @enderror" name="telephone" placeholder="Téléphone" value="{{ old('telephone' )}}">
                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                </div>
                
                
                    
                


                

                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-user btn-block"  >
                </div>

               
                
              </form>

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