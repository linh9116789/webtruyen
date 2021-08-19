<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'd_name','d_slug','created_at','updated_at'
    ];

    protected $primariKey = 'id';
    protected $table = 'danhmucs';
}
