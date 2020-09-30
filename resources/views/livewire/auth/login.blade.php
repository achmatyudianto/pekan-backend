<div>
    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>


            <form class="form-signin" wire:submit.prevent="login">

              <div class="form-label-group">
                <input type="email" id="inputEmail" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email">
                <label for="inputEmail">Email address</label>
                @error('email')
                	<div class="invalid-feedback">
                		{{ $message }}
                	</div>
                @enderror
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" wire:model.lazy="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                <label for="inputPassword">Password</label>
                @error('password')
                	<div class="invalid-feedback">
                		{{ $message }}
                	</div>
                @enderror
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-success btn-block text-uppercase" type="submit">Masuk</button>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>