<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'chap_title','pro_content','chap_story_id','created_at','updated_at'
    ];

    protected $primariKey = 'id';
    protected $table = 'chapters';

    public function story()
    {
        return  $this->belongsTo(Story::class, 'chap_story_id');
    }
}
