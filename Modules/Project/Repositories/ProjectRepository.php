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

    public function index($api_token)
    {
        return $this
            ->leftJoin('users', 'projects.user_id', '=', 'users.id')
           // ->where('api_token', $api_token)
            ->paginate(5);
    }

    public function showWithRelationship($project_id)
    {
        $projects = $this->show($project_id);

        $tasks = $projects->with(['user', 'tasks'])->where('id', $project_id)->get();

        return response()->json($tasks);
    }
}