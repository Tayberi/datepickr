@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.event.title_singular') }}:
                    {{ trans('cruds.event.fields.id') }}
                    {{ $event->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.id') }}
                            </th>
                            <td>
                                {{ $event->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.studio') }}
                            </th>
                            <td>
                                @foreach($event->studio as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.name') }}
                            </th>
                            <td>
                                {{ $event->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.date_event') }}
                            </th>
                            <td>
                                {{ $event->date_event }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.time_start') }}
                            </th>
                            <td>
                                {{ $event->time_start }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.time_end') }}
                            </th>
                            <td>
                                {{ $event->time_end }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('event_edit')
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection