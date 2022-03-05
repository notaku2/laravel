<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'answers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'character',
        'line',
        'user_id',
        'title_id',
        'chapter_id',
        'question_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function title()
    {
        return $this->belongsTo('App\Models\Title');
    }
    
    public function chapter()
    {
        return $this->belongsTo('App\Models\Chapter');
    }

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

}
