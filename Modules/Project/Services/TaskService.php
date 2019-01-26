<?php

namespace Modules\Project\Http\ervices;

use Modules\Project\Http\Repositories\TaskRepository;

class TaskService
{
    public $repository;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function store($data)
    {
        $row = $this->repository->store($data);

        return redirect('/projects/' . $data['project_id']);
    }

    public function showRow($project_id, $task_id)
    {
        $repository = $this->repository->show($task_id);

        if ($repository['project_id'] == $project_id) {
            return response()->json($repository);
        }

        return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
    }

    public function update($data)
    {
        $task_id = $data['task_id'];
        $project_id = $data['project_id'];

        if (isset($data['user_id'])) {
            $user_id = $data['user_id'];
            unset($data['user_id']);
        }

        unset($data['task_id']);
        unset($data['project_id']);

        $row = $this->repository->updateRow($data, $task_id);

        return redirect('/projects/' . $project_id);
    }

    public function delete($data)
    {
        $row = $this->repository->deleteRow($data['task_id']);

        return redirect('/projects/' . $data['project_id']);
    }

}
