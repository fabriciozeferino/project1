<?php

namespace Modules\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class CreateTaskRequest extends FormRequest
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
        return [
            'project_id' => 'required|integer',
            'description' => 'required',
            'due_at' => 'required|date|after_or_equal:today'
        ];
    }

    protected function prepareForValidation()
    {
        $this->replace([
            'user_id' => \Auth::id(),
            'project_id' => (int)$this->route('project_id'),
            'description' => filter_var($this->input('description'), FILTER_SANITIZE_STRING),
            'due_at' => Carbon::createFromFormat('d-m-Y', $this->input('due_at'))->toDateTimeString() //$this->input('due_at'),
        ]);
    }


}
