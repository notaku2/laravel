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
        'title_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function title()
    {
        return $this->belongsTo('App\Models\Title');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

}
