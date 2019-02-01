<?php

namespace Modules\Project\Policies;

use App\User;
use Modules\Project\Http\Repositories\TaskRepository;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the task repository.
     *
     * @param  \App\User  $user
     * @param  \Modules\Project\Http\Repositories\TaskRepository  $taskRepository
     * @return mixed
     */
    public function view(User $user, TaskRepository $taskRepository)
    {
        //
    }

    /**
     * Determine whether the user can create task repositories.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the task repository.
     *
     * @param  \App\User  $user
     * @param  \Modules\Project\Http\Repositories\TaskRepository  $taskRepository
     * @return mixed
     */
    public function update(User $user, TaskRepository $taskRepository)
    {
        //
    }

    /**
     * Determine whether the user can delete the task repository.
     *
     * @param  \App\User  $user
     * @param  \Modules\Project\Http\Repositories\TaskRepository  $taskRepository
     * @return mixed
     */
    public function delete(User $user, TaskRepository $taskRepository)
    {
        //
    }

    /**
     * Determine whether the user can restore the task repository.
     *
     * @param  \App\User  $user
     * @param  \Modules\Project\Http\Repositories\TaskRepository  $taskRepository
     * @return mixed
     */
    public function restore(User $user, TaskRepository $taskRepository)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the task repository.
     *
     * @param  \App\User  $user
     * @param  \Modules\Project\Http\Repositories\TaskRepository  $taskRepository
     * @return mixed
     */
    public function forceDelete(User $user, TaskRepository $taskRepository)
    {
        //
    }
}
