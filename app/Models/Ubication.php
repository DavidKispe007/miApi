<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    use HasFactory;

    protected $table = 'ubications';

    protected $fillable = ['name'];

    protected $hidden = [ 'created_at', 'updated_at' ];

}
