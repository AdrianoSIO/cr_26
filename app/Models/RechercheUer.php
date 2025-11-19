<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RechercheUer extends Model
{
    /**
     * Récupère le rôle d'un utilisateur par son id.
     *
     * @param int $userId
     * @return Role|null
     */
    public static function recupRole(int $userId)
    {
        // On récupère l'utilisateur
        $user = User::find($userId);

        if (!$user) {
            return null; // utilisateur non trouvé
        }

        // On récupère le rôle via la relation
        return $user->role; // Assure-toi que User::role() existe
    }
}
