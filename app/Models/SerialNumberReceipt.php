<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SerialNumberReceipt extends Model
{

    protected $fillable = [
        'serial_number_to',
        'serial_number_from',
        'is_active'
    ];






}
