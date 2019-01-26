<?php

namespace Modules\Project\Http\Repositories;

use Illuminate\Support\Carbon;

class TaskRepository extends AbstractRepository
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'tasks';

    protected $guarded = [];

    protected $dates = ['due_at'];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function project()
    {
        return $this->belongsTo(ProjectRepository::class, 'project_id', 'id');
    }

    public function dueTo($date_created, $due_date)
    {
        $start = Carbon::createFromFormat('Y-m-d H:i:s', $date_created)->format('U');

        $end = Carbon::createFromFormat('Y-m-d H:i:s', $due_date)->format('U');

        $now = now()->format('U');

        return ((($start - $now) / ($start - $end)) * 100);
    }
}
