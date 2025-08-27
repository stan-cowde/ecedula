<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalDetail extends Model
{

    public $table = 'personal_details';

    protected $fillable = [
        'pd_user_id',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'date_of_birth',
        'civil_status',
        'height',
        'weight',
        'citizenship',
    ];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
