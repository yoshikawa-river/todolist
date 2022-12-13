<?php

namespace App\Http\Requests;

use App\Enums\Priority;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
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
           'task_name' => [
               'required',
               'max:20'       
           ],
           'task_description' => [
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
           ],
           'tags.*' => [
               'nullable',
               'max:20'
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

        $this->merge([
            'user_id' => Auth::id()
        ]);
    }

    public function isBack() {
        return $this->has('back');
    }

    public function isCreate() {
        return $this->has('create');
    }
}