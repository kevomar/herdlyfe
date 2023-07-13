<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataTable extends Component
{
    public $buttonName;
    public $resource;
    /**
     * Create a new component instance.
     */
    public function __construct($buttonName = null, $resource = 'cattle')
    {
        $this->buttonName = $buttonName;
        $this->resource = $resource;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-table');
    }
}
