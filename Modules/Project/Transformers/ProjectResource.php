<?php

namespace Modules\Project\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class ProjectResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "project" => [
                "id" => $this->id,
                "title" => $this->title,
                "description" => $this->description,
              //  "owner" => UserResource::make($this->user),
               // "tasks" => TaskResource::collection($this->tasks),
            ],
            //'links' => ['self' => asset('/api/project/' . $this->id)],
            'links' => [
                'self' => url('/api/project/' . $this->id)
            ],
        ];
    }
}
