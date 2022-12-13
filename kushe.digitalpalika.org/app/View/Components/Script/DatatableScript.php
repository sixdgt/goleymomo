<?php

namespace App\View\Components\Script;

use Illuminate\View\Component;

class DatatableScript extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $options;
    public function __construct(array $options=[])
    {
        $this->options=$options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.script.datatable-script');
    }
}
