<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $guarded = ['id','created_at','updated_at'];

    protected $hidden = ['district_id', 'created_at','updated_at'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
