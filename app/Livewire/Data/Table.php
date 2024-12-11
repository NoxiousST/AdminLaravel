<?php

namespace App\Livewire\Data;

use Livewire\Component;

class Table extends Component
{
    public $columns;
    public $data;
    public $title;
    public $route;

    public function render()
    {
        return view('livewire.data.table');
    }
}
