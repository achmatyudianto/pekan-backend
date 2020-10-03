<div>
	<div class="container pl-5 pr-5">
	  <div class="card border-0 shadow my-5">
	    <div class="card-body p-4">
	    	<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link" style="color:#545b62;" href="{{ route('pekan.dashboard') }}">Dasboard</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link active text-success" href="#">Pengeluaran</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" style="color:#545b62;" href="{{ route('pekan.income') }}">Pemasukan</a>
			  </li>
			</ul>

			<div class="pt-4 pl-5 pr-5">
				@include('livewire.pekan.create')
				@include('livewire.pekan.update')
				@if (session()->has('message'))
			        <div class="alert alert-success alert-dismissible fade show" role="alert">
					  {{ session('message') }}
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
			    @endif
			    <table class="table table-bordered">
			        <thead>
			            <tr>
			                <th>Tanggal</th>
			                <th>Catatan</th>
			                <th>Total</th>
			                <th>Aksi</th>
			            </tr>
			        </thead>
			        <tbody>
			            @foreach($pekan as $value)
			            <tr>
			                <td width="175"><i class="text-muted">{{ $value->created_at->format('d/m/Y H:i:s') }}</i></td>
			                <td width="400">{{ $value->description }}</td>
			                <td>Rp. {{ (double)$value->amount }}</td>
			                <td width="100">
				                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
				                <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
			                </td>
			            </tr>
			            @endforeach
			        </tbody>
			    </table>
			    {{ $pekan->links() }}
			</div>	
	    </div>
	  </div>
	</div>
</div>
