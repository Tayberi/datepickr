<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\Studio;
use Livewire\Component;

class Create extends Component
{
    public Event $event;

    public array $studio = [];

    public array $listsForFields = [];

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.event.create');
    }

    public function submit()
    {
        $this->validate();

        $this->event->save();
        $this->event->studio()->sync($this->studio);

        return redirect()->route('admin.events.index');
    }

    protected function rules(): array
    {
        return [
            'studio' => [
                'array',
            ],
            'studio.*.id' => [
                'integer',
                'exists:studios,id',
            ],
            'event.name' => [
                'string',
                'required',
            ],
            'event.date_event' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'event.time_start' => [
                'required',
                'date_format:' . config('project.time_format'),
            ],
            'event.time_end' => [
                'required',
                'date_format:' . config('project.time_format'),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['studio'] = Studio::pluck('name', 'id')->toArray();
    }
}
