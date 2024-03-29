<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#createModal">
 <i class="fas fa-plus"></i> Tambah Data
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Catatan</label>
                        <textarea class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Catatan" wire:model="description"></textarea>
                        @error('description') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Total</label>
                        <input type="text" class="form-control" id="exampleFormControlInput2" wire:model="amount" placeholder="Masukkan Total">
                        @error('amount') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Batal</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal" data-turbolinks-action="replace">Simpan</button>
            </div>
        </div>
    </div>
</div>