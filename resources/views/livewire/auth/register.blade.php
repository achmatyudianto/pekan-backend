<div>
    <div class="container">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <div class="text-center mb-4">
                  <img src="images/pekan.png" width="100" />
                  <div style="font-size: 15pt; font-weight: bold;"><i class="text-danger">Pe</i><i class="text-success">Kan</i></div>
                  <div class="text-muted">
                    Pengeluaran - Pemasukan
                  </div>
                </div>

                        <form wire:submit.prevent="store" class="form-signin">
                            <!-- <div class="row"> -->
                                <!-- <div class="col-md-6"> -->
                                    <div class="form-label-group">
                                        <input type="text" id="inputName" wire:model.lazy="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama">
                                        <label for="inputName">Nama</label>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                <!-- </div> -->
                                <!-- <div class="col-md-6"> -->
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror" placeholder="Alamat Email">
                                        <label for="inputEmail">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->

                            <!-- <div class="row"> -->
                                <!-- <div class="col-md-6"> -->
                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" wire:model.lazy="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                        <label for="inputPassword">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                <!-- </div> -->
                                <!-- <div class="col-md-6"> -->
                                    <div class="form-label-group">
                                        <input type="password" id="inputPasswordConfirm" wire:model.lazy="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                        <label for="inputPasswordConfirm">Konfirmasi Password</label>
                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->
                            
                            <button type="submit" class="btn btn-lg btn-success btn-block text-uppercase">DAFTAR</button>

                            <div class="pt-3">
                                <a href="{{ route('auth.login') }}" class="text-success"><i class="fas fa-arrow-left"></i> <i>Login</i></a>
                            </div>
                        </form>

            </div>
        </div>
      </div>
    </div>
  </div>
</div>