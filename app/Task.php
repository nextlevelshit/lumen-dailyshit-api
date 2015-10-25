<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['name', 'description', 'repetition'];

    /**
     * Return all done states
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function done()
    {
        return $this->hasMany('App\TaskDone', 'task_id');
    }
}
?>