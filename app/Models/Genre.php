<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';  // nom de ta table
    protected $primaryKey = 'code';    // clé primaire personnalisée
    public $incrementing = false;      // ce n'est pas auto-incrément
    protected $keyType = 'string';     // la clé est une string

    protected $fillable = ['code', 'nom', 'commentaire'];

    // Relation avec les utilisateurs
    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'code_genre', 'code');
    }

    // Relation avec les engagers
    public function engagers()
    {
        return $this->hasMany(Engager::class, 'id_genre', 'code');
    }

    // Binding par code pour les routes
    public function getRouteKeyName()
    {
        return 'code';
    }
}
