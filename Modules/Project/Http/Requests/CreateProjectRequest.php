<?php

namespace Modules\Project\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
        ];
    }

    /**
     *
     * @return array
     */
    protected function prepareForValidation()
    {
        $this->replace([
            'user_id' => 1,
            'title' => filter_var($this->input('description'), FILTER_SANITIZE_STRING),
            'description' => filter_var($this->input('description'), FILTER_SANITIZE_STRING),
        ]);
    }

}
