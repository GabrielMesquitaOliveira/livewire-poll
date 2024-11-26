<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title = '';
    public $options = ['First'];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:2',
        'options.*' => 'required|min:1|max:255'
    ];

    protected $messages = [
        'options.*' => "The options cant be empty"
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {
        $this->validate();

        $poll = Poll::create([
            'title' => $this->title,
        ])->options()->createMany(
            collect($this->options)
                ->map(function ($option) {
                    return ['name' => $option];
                })
                ->all()
        );

        // foreach ($this->options as $optionName) {
        //     $poll->options()->create(['name' => $optionName]);
        // }

        $this->reset();
    }

    public function mount() {}
}
