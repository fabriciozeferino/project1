<?php

namespace Modules\Project\Http\Controllers;

use Modules\Project\Http\Requests\CreateTaskRequest;
use Modules\Project\Http\Requests\UpdateTaskRequest;
use Modules\Project\Http\Requests\DeleteTaslRquest;

use Modules\Project\Http\Services\TaskService;


class TaskController extends Controller
{
    public $service;

    public function __construct(TaskService $service)
    {
        $this->service = $service;
    }

    public function show($project_id, $task_id)
    {
        return $this->service->showRow($project_id, $task_id);
    }

    public function store(CreateTaskRequest $request)
    {
        return $this->service->store($request->all());
    }

    public function destroy(DeleteTaslRquest $request)
    {
        $this->service->delete($request->all());
    }

    public function update(UpdateTaskRequest $request)
    {
        return $this->service->update($request->all());
    }

}
