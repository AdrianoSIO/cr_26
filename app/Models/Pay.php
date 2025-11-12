<?php

namespace App\Models;

use App\Models\Base\Pay as BasePay;
use Reliese\Coders\Model\Relations\HasMany;

class Pay extends BasePay
{
	protected $fillable = [
		'code',
		'nom',
		'commentaire'
	];
}