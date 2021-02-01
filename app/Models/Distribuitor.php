<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribuitor extends Model
{
    use HasFactory;

    protected $table = 'distribuitors';

    protected $fillable = ['name'];

    protected $hidden = [ 'created_at', 'updated_at' ];

}
