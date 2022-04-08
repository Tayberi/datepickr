<?php

namespace App\Http\Requests;

use App\Models\Studio;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudioRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('studio_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'resource_id' => [
                'integer',
                'exists:resources,id',
                'nullable',
            ],
        ];
    }
}
