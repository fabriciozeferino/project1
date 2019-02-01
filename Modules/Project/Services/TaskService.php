<?php

namespace Modules\Project\Http\Services;

use Modules\Project\Http\Repositories\TaskRepository;

class TaskService extends AbstractService
{
    public $repository;

    private $user;

    public function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;

        $this->user = auth()->user();
    }

    public function index($id)
    {
        $repository = $this->repository->index($this->user->id, $id);

        return $this->respondWithJson($repository, 200);
    }

    public function show($task_id)
    {
        $repository = $this->repository->show($task_id);

        return $this->respondWithJson($repository, 200);
    }

    public function store($data)
    {
        $row = $this->repository->store($data);

        return redirect('/projects/' . $data['project_id']);
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
