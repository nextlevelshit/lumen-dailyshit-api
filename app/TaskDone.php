<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskDone extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'task_done';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['task_id', 'done'];

    public function task()
    {
        return $this->belongsTo('App\Task', 'task_id');
    }

}
