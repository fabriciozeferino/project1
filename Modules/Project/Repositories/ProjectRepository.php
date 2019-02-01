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

    /**
     * App\Users
     */
    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    /**
     * Modules\Project\Http\Repositories\TaskRepository
     */
    public function tasks()
    {
        return $this->hasMany(TaskRepository::class, 'project_id', 'id');
    }

    /**
     * The projects that belong to the user.
     */
    public function invites()
    {
        return $this->belongsToMany(\App\User::class, 'project_user', 'project_id', 'user_id');
    }

    public function index($id)
    {
        return $this
            ->where($this->table . '.user_id', $id)
            ->orWhere('project_user.read', true)
            ->leftJoin('project_user', $this->table . '.user_id', 'project_user.user_id')
            ->paginate();
    }

}