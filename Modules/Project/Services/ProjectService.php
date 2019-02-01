<?php

namespace Modules\Project\Http\Services;

use Modules\Project\Http\Repositories\ProjectRepository;





class ProjectService extends AbstractService
{
    public $repository;

    private $user;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;

        $this->user = auth()->user();
    }

    public function index()
    {
        $user_id = $this->user->id;

        $project = $this->repository->index($user_id);

        return $this->respondWithJson($project, 200);
    }

    public function show($id)
    {
        $project = $this->repository->show($id);

        return $this->respondWithJson($project, 200);
    }

    public function store($data)
    {
        $project = $this->repository->create($data);

        return response()->json($project, 201);
    }

    public function update($data)
    {
        $project = $this->repository->show($data['id']);

        $project->update($data);

        return $this->respondWithJson($project, 200);
    }

    public function delete($data)
    {
        $project = $this->repository->show($data);

        $project->delete();

        return $this->respondWithJson(null, 204);

    }
}
