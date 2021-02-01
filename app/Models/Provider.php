<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $table = 'providers';

    protected $guarded = ['id','created_at','updated_at'];

    protected $hidden = [ 'category_id','distributor_id','district_id','created_at','updated_at' ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function distributor()
    {
        return $this->belongsTo(Distribuitor::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

}
