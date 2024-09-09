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
                        <label for="description">description</label>
                        <textarea class="form-control" id="overview" wire:model="overview"></textarea>
                        @error('overview') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="vote_average">Moyenne des votes</label>
                        <input type="number" class="form-control" id="vote_average" wire:model="vote_average" step="0.1">
                    </div>
                    <div class="form-group">
                        <label for="title">Affiche</label>
                        <input type="text" class="form-control" id="poster_path" wire:model="poster_path">
                    </div>
                    <div class="form-group">
                        <label for="release_date">Date de sortie</label>
                        <input type="date" class="form-control" id="title" wire:model="release_date">
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
