<?php

namespace Modules\Project\Http\Services;

use Modules\Project\Http\Repositories\ProjectRepository;
use Modules\Project\Transformers\ProjectResource;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Tymon\JWTAuth\Facades\JWTAuth;



class ProjectService
{
    public $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $payload = auth()->payload();


        $projects = $this->repository->index();

        return ProjectResource::collection($projects);
    }

    public function show($id)
    {
        $project = $this->repository->show($id);

        return ProjectResource::make($project);
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

        return response()->json($project, 200);
    }

    public function delete($data)
    {
        $project = $this->repository->show($data);

        $project->delete();

        return response()->json([null, 204]);
    }
}
