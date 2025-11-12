<?php

namespace App\Models;

use App\Models\Base\Genre as BaseGenre;

class Genre extends BaseGenre
{
    protected $fillable = ['nom', 'commentaire'];

    // Clé primaire personnalisée
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

    // Relation avec les utilisateurs
    public function utilisateurs()
    {
        // hasMany(RelatedModel, foreign_key_in_utilisateurs, local_key_in_genres)
        return $this->hasMany(\App\Models\Utilisateur::class, 'code_genre', 'code');
    }
}
