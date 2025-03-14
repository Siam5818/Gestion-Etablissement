<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploisTemps extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe',
        'matiere',
        'professeur',
        'jour',
        'heure_debut',
        'heure_fin',
    ];
}
