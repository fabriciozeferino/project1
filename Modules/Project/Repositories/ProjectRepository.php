<?php

namespace Modules\Project\Http\Repositories;

use Illuminate\Support\Carbon;


class ProjectRepository extends AbstractRepository
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'projects';

    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function tasks()
    {
        return $this->hasMany(TaskRepository::class, 'project_id', 'id');
    }



    public function showWithRelationship($project_id)
    {
        $projects = $this->show($project_id);

        $tasks = $projects->with(['user', 'tasks'])->where('id', $project_id)->get();

        return response()->json($tasks);
    }
}