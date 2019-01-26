<?php

namespace Modules\Project\Http\Controllers;

use Modules\Project\Http\Controllers\Controller;

use Modules\Project\Http\Services\ProjectService;

use Modules\Project\Http\Requests\CreateProjectRequest;
use Modules\Project\Http\Requests\UpdateProjectRequest;
use Modules\Project\Http\Requests\DeleteProjectRequest;
use Modules\Project\Transformers\ProjectResource;

class ProjectController extends Controller
{
    public $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        return $this->respondWithJson($this->service->index());
    }

    public function show($project_id)
    {
        $project = $this->service->show($project_id);

        return $this->respondWithJson($project);
    }

    public function store(CreateProjectRequest $request)
    {
        return $this->service->store($request->all());
    }

    public function update(UpdateProjectRequest $request)
    {
        return $this->service->update($request->all());
    }

    public function delete(DeleteProjectRequest $request)
    {
        return $this->service->delete($request['id']);
    }
}
