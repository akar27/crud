<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;

    protected $fillable = ['nom_tache', 'date_debut', 'date_fin', 'cout', 'projet_id'];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function materiel()
    {
        return $this->hasMany(Materiel::class);
    }


}
