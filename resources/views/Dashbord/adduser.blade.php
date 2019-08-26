@include('/dashbord/partials/header')
@include('/dashbord/partials/sidebar')
@include('/dashbord/partials/nav')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Ajouter des utilisateurs</h1>
            <p class="mb-4">Vous Pouvez ajouter tout simplement un utilisateur ou un pharmacien </a>.</p>


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
                <h1 class="h4 text-gray-900 mb-4">MErci de remplir le formulaire</h1>
              </div>
              <form method="POST" action="{{ route('register') }}"  class="user">
              @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" placeholder="First Name">
                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('prenom') is-invalid @enderror" name="prenom" placeholder="Last Name">
                    @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" placeholder="Email Address">
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="password_confirmation" placeholder="Repeat Password">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="date" class="form-control form-control-user @error('date_nais') is-invalid @enderror" name="date_nais" placeholder="Password">
                    @error('date_nais')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user @error('telephone') is-invalid @enderror" name="telephone" placeholder="Téléphone">
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