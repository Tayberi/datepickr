<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('studio.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.studio.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="studio.name">
        <div class="validation-message">
            {{ $errors->first('studio.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studio.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('studio.resource_id') ? 'invalid' : '' }}">
        <label class="form-label" for="resource">{{ trans('cruds.studio.fields.resource') }}</label>
        <x-select-list class="form-control" id="resource" name="resource" :options="$this->listsForFields['resource']" wire:model="studio.resource_id" />
        <div class="validation-message">
            {{ $errors->first('studio.resource_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.studio.fields.resource_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.studios.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>