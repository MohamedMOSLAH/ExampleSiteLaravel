<?php
namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'overview', 'poster_path', 'release_date', 'vote_average'];

    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('overview');
            $table->string('poster_path')->nullable();
            $table->date('release_date')->nullable();
            $table->float('vote_average');
            $table->timestamps();
        });
    }

}
