<?php

namespace App\Models;

use App\Models\Base\Engager as BaseEngager;

class Engager extends BaseEngager
{
    protected $table = 'engager';
    public $incrementing = false;

    protected $casts = [
        'id_utilisateur' => 'int',
        'id_concours' => 'int',
        'id_role' => 'int'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur');
    }

    public function concour()
    {
        return $this->belongsTo(Concour::class, 'id_concours');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
}
