<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IdentityDetails extends Model
{

    public $table = 'identity_details';

    public $fillable = [
        'user_id',
        'valid_id',
        'id_number',
        'occupation',
        'place_of_birth',
        'tin',
        'icr',
        'monthly_income'
    ];


    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

}
