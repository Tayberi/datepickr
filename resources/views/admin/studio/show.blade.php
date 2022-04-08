@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.studio.title_singular') }}:
                    {{ trans('cruds.studio.fields.id') }}
                    {{ $studio->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.studio.fields.id') }}
                            </th>
                            <td>
                                {{ $studio->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studio.fields.name') }}
                            </th>
                            <td>
                                {{ $studio->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.studio.fields.resource') }}
                            </th>
                            <td>
                                @if($studio->resource)
                                    <span class="badge badge-relationship">{{ $studio->resource->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('studio_edit')
                    <a href="{{ route('admin.studios.edit', $studio) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.studios.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection