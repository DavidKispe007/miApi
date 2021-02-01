<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $hidden = [ 'category_id','presentation_id','ubication_id','created_at','updated_at', 'provider_id' ];

    // protected $fillable = [
    //     'name',
    //     'brand',
    //     'expiration_date',
    //     'image',
    //     'stock',
    //     'price_purchase',
    //     'price_sale',
    //     'health_register',
    //     'lot',
    //     'description',

    //     'id_category',
    //     'id_presentation',
    //     'id_ubication'
    // ];

    protected $guarded = ['id', 'created_at','updated_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    
    public function presentation()
    {
        return $this->belongsTo(Presentation::class);
    }

    public function ubication()
    {
        return $this->belongsTo(Ubication::class);
    }
    
}
