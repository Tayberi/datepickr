<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('studio') ? 'invalid' : '' }}">
        <label class="form-label" for="studio">{{ trans('cruds.event.fields.studio') }}</label>
        <x-select-list class="form-control" id="studio" name="studio" wire:model="studio" :options="$this->listsForFields['studio']" multiple />
        <div class="validation-message">
            {{ $errors->first('studio') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.studio_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.event.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="event.name">
        <div class="validation-message">
            {{ $errors->first('event.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.date_event') ? 'invalid' : '' }}">
        <label class="form-label required" for="date_event">{{ trans('cruds.event.fields.date_event') }}</label>
        <x-date-picker class="form-control" required wire:model="event.date_event" id="date_event" name="date_event" picker="date" />
        <div class="validation-message">
            {{ $errors->first('event.date_event') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.date_event_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.time_start') ? 'invalid' : '' }}">
        <label class="form-label required" for="time_start">{{ trans('cruds.event.fields.time_start') }}</label>
        <x-date-picker class="form-control" required wire:model="event.time_start" id="time_start" name="time_start" picker="time" />
        <div class="validation-message">
            {{ $errors->first('event.time_start') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.time_start_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.time_end') ? 'invalid' : '' }}">
        <label class="form-label required" for="time_end">{{ trans('cruds.event.fields.time_end') }}</label>
        <x-date-picker class="form-control" required wire:model="event.time_end" id="time_end" name="time_end" picker="time" />
        <div class="validation-message">
            {{ $errors->first('event.time_end') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.time_end_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>