<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = 'm_device';

    public function merchant()
    {
        return $this->hasOne('App\Models\Merchant', 'id_merchant', 'id_merchant');
    }
}
