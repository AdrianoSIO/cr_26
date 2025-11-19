<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class RechercheUser extends Model
{
    public function recherche($role){
            $role=!Auth::check() || Auth::user()->role?->id_role;

    }
}

