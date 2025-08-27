<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AddressDetails extends Model
{
    public $table = 'address_details';
    protected $fillable = [
        'ad_user_id',
        'address',
        'birth_place',
        'nationality',
        'municipality',
        'barangay',
        'block_number',
        'street',
    ];

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
