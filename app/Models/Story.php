<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'sto_name',
        'sto_category_id',
        'sto_avatar',
        'sto_active',
        'sto_description',
        'sto_content',
        'created_at',
        'updated_at'
    ];

    protected $primariKey = 'id';
    protected $table = 'storys';
    public function category()
    {
        return  $this->belongsTo(Category::class, 'sto_category_id');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class,'chap_story_id');
    }
}
