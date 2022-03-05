<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'chapters';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'user_id',
        'title_id',
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

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($chapter) {
            $chapter->questions()->delete();
            $chapter->answers()->delete();
        });
    }
}
