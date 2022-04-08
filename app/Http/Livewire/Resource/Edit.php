<?php

namespace App\Http\Livewire\Resource;

use App\Models\Resource;
use Livewire\Component;

class Edit extends Component
{
    public Resource $resource;

    public function mount(Resource $resource)
    {
        $this->resource = $resource;
    }

    public function render()
    {
        return view('livewire.resource.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->resource->save();

        return redirect()->route('admin.resources.index');
    }

    protected function rules(): array
    {
        return [
            'resource.name' => [
                'string',
                'required',
            ],
        ];
    }
}
