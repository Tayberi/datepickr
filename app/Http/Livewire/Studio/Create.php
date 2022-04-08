<?php

namespace App\Http\Livewire\Studio;

use App\Models\Resource;
use App\Models\Studio;
use Livewire\Component;

class Create extends Component
{
    public Studio $studio;

    public array $listsForFields = [];

    public function mount(Studio $studio)
    {
        $this->studio = $studio;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.studio.create');
    }

    public function submit()
    {
        $this->validate();

        $this->studio->save();

        return redirect()->route('admin.studios.index');
    }

    protected function rules(): array
    {
        return [
            'studio.name' => [
                'string',
                'required',
            ],
            'studio.resource_id' => [
                'integer',
                'exists:resources,id',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['resource'] = Resource::pluck('name', 'id')->toArray();
    }
}
