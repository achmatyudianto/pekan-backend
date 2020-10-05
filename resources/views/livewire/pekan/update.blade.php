<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <input type="hidden" wire:model="pekan_id">
                        <label for="exampleFormControlInput1">Catatan</label>
                        <input type="text" class="form-control" wire:model="description" id="exampleFormControlInput1" placeholder="Masukkan Catatan">
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Total</label>
                        <input type="text" class="form-control" wire:model="amount" id="exampleFormControlInput2" placeholder="Masukkan Total">
                        @error('amount') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-turbolinks-action="replace">Simpan</button>
            </div>
       </div>
    </div>
</div>