<?php

namespace App\Http\Requests;

use App\Enums\Priority;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class TaskRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
           'name' => [
               'required',
               'max:20'       
           ],
           'description' => [
               'required',
               'max:10000'
           ],
           'priority' => [
               'required',
               new Enum(Priority::class)
           ],
           'public' => [
                Rule::in([0, 1])
           ],
           'due_date' => [
               'required',
               'date'
           ]
        ];
    }

    protected function prepareForValidation()
    {
        if (!$this->has('public')) {
            $this->merge([
                'public' => 0,
            ]);
        }
    }

    public function isBack() {
        return $this->has('back');
    }

    public function isCreate() {
        return $this->has('create');
    }
}