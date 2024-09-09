<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class MovieCrud extends Component
{
    use WithPagination;

    public $title, $description, $movie_id;
    public $isOpen = false;

    
    public function render()
    {
        return view('livewire.movie-crud', [
            'movies' => Movie::latest()->paginate(5)
        ]);
    }

    public function openModal()
    {
        $this->resetInputFields();
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->movie_id = '';
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Movie::updateOrCreate(['id' => $this->movie_id], [
            'title' => $this->title,
            'description' => $this->description,
        ]);

        session()->flash('message',
            $this->movie_id ? 'Film modifié avec succès.' : 'Film créé avec succès.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $this->movie_id = $id;
        $this->title = $movie->title;
        $this->description = $movie->description;

        $this->openModal();
    }

    public function delete($id)
    {
        Movie::find($id)->delete();
        session()->flash('message', 'Film supprimé avec succès.');
    }
}
