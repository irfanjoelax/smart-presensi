<form wire:submit.prevent="submit">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" wire:model="name">
    </div>
    <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" wire:model="email">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" wire:model="password" placeholder="******">
        <small class="form-text text-danger">
            Kosongkan jika tidak ingin mengubah password
        </small>
    </div>
    <button type="submit" class="btn btn-lg btn-dark w-100">
        <div wire:loading wire:target="submit">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        </div>
        <span>Ubah Data Profile</span>
    </button>
</form>
