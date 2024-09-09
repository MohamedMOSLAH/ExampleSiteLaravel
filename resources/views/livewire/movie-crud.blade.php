<div>
    <button wire:click="openModal()" class="btn btn-primary">Ajouter un film</button>

    @if($isOpen)
        @include('livewire.create-movie')
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table table-bordered mt-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td>{{  substr($movie->overview, 0, 100) . '...'}}</td>
                    <td>
                        <button wire:click="edit({{ $movie->id }})" class="btn btn-primary">Modifier</button>
                        <button wire:click="delete({{ $movie->id }})" class="btn btn-danger">Supprimer</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $movies->links() }} <!-- Pagination -->
</div>
