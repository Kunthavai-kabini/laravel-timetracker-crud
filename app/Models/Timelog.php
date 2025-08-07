<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timelog extends Model
{
     protected $fillable = [
        'user_id', 'task_added_on', 'hours', 'minutes', 'task_description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
