<?php

namespace App\Livewire;

use App\Models\Movie;
use Livewire\Component;
use Livewire\WithPagination;

class MovieCrud extends Component
{
    use WithPagination;

    public $title, $overview, $movie_id, $vote_average, $poster_path, $release_date;
    public $isOpen = false;

    
    public function render()
    {
        return view('livewire.movie-crud', [
            'movies' => Movie::latest()->paginate(5)
        ]);
    }

    public function openModal($id="")
    {
        if($id === ""){
            $this->resetInputFields();
        }
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->overview = '';
        $this->movie_id = '';

    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'overview' => 'required',
            'vote_average' => 'required',
     
        ]);

        Movie::updateOrCreate(['id' => $this->movie_id], [
            'title' => $this->title,
            'overview' => $this->overview,
            'vote_average' => $this->vote_average,
            'poster_path' => $this->poster_path,
            'release_date' => $this->release_date
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
        $this->overview = $movie->overview;
        $this->vote_average = $movie->vote_average;
        $this->poster_path = $movie->poster_path;
        $this->release_date = $movie->release_date;

        $this->openModal($id);
    }

    public function delete($id)
    {
        Movie::find($id)->delete();
        session()->flash('message', 'Film supprimé avec succès.');
    }
}
