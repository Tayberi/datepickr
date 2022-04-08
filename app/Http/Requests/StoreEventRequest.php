<?php

namespace App\Http\Requests;

use App\Models\Event;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEventRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('event_create'),
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
            'studio' => [
                'array',
            ],
            'studio.*.id' => [
                'integer',
                'exists:studios,id',
            ],
            'name' => [
                'string',
                'required',
            ],
            'date_event' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'time_start' => [
                'required',
                'date_format:' . config('project.time_format'),
            ],
            'time_end' => [
                'required',
                'date_format:' . config('project.time_format'),
            ],
        ];
    }
}
