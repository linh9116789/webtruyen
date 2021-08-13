<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'c_name','c_slug','created_at','updated_at'
    ];

    protected $primariKey = 'id';
    protected $table = 'categories';
}
