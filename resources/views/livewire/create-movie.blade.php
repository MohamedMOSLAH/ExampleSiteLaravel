<div class="modal fade show" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $movie_id ? 'Modifier Film' : 'Créer Film' }}</h5>
                <button type="button" class="close" wire:click="closeModal">×</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input type="text" class="form-control" id="title" wire:model="title">
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">overview</label>
                        <textarea class="form-control" id="description" wire:model="description"></textarea>
                        @error('overview') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click="closeModal" class="btn btn-secondary">Fermer</button>
                <button type="button" wire:click="store" class="btn btn-primary">Sauvegarder</button>
            </div>
        </div>
    </div>
</div>
