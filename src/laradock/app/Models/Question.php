<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'questions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'character',
        'line',
        'chapter_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function chapter()
    {
        return $this->belongsTo('App\Models\Chapter');
    }

    public function answer()
    {
        return $this->hasOne('App\Models\Answer');
    }

}
