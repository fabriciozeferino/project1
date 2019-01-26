<?php

namespace Modules\Project\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class TaskResource extends Resource
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
            'id' => $this->id,
            'description' => $this->description,
            'status' => ($this->status == 0) ? 'false' : 'true',
            'due_at' => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->due_at)->format('d/m/Y')
        ];
    }
}
