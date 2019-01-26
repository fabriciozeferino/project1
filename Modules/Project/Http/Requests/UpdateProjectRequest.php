<?php

namespace Modules\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => 'sometimes|required|min:3',
            'description' => 'sometimes|required|min:3'
        ];
    }

    protected function prepareForValidation()
    {
        $this->replace([
            'id' => (int)$this->route('project'),
            'title' => filter_var($this->input('title'), FILTER_SANITIZE_STRING),
            'description' => filter_var($this->input('description'), FILTER_SANITIZE_STRING),
        ]);
    }
}
