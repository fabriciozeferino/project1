<?php

namespace Modules\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;


class UpdateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'project_id' => 'required|integer',
            'task_id' => 'required|integer',
        ];

        // Checkbox task status
        if ($this->has('status')) {
            $rules['status'] = 'required|bool';
        }

        // Modal 
        if ($this->has('description') || $this->has('due_at')) {
            $rules['description'] = 'required';
            $rules['due_at'] = 'required|date|after_or_equal:today';
        }
       // info($this);

        return $rules;
    }

    protected function prepareForValidation()
    {
        /**
         * Default prepareForValidation
         */
        $arrayPrepare = [
            'project_id' => (int)$this->route('project_id'),
            'task_id' => (int)$this->route('task_id'),
            'user_id' => \Auth::id(),
        ];

        /**
         * Check if due_at is setted to avoid Carbon NULL error
         */
        if ($this->has('due_at')) {
            if ($this->input('due_at')) {
                $due_at = Carbon::createFromFormat('d-m-Y', $this->input('due_at'));
            } else {
                $due_at = $this->input('due_at');
            }
        }

        /**
         * Bind status to prepareForValidation if its setted
         */
        if ($this->has('status')) {
            $arrayPrepare['status'] = (bool)$this->input('status');
        }

        /**
         * Bind description and due_at to prepareForValidation if its setted
         */
        if ($this->has('description') || $this->has('due_at')) {
            $arrayPrepare['description'] = filter_var($this->input('description'), FILTER_SANITIZE_STRING);
            $arrayPrepare['due_at'] = $due_at;
        }

        $this->replace($arrayPrepare);
    }
}
