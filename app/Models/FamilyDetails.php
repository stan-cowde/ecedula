<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyDetails extends Model
{
    protected $table = 'family_details';

    protected $fillable = [
        'user_id',
        'father_name',
        'mother_name',
        'guardian_name',
        'spouse_name',
        'issued_date',
        'expiry_date',
    ];

    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
