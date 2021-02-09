<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Product extends Component
{

    public $item;

    /**
     * Create a new component instance.
     *
     * @param  \App\Models\Product  $item
     */
    public function __construct(\App\Models\Product  $item)
    {
        $this->item = $item;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.product');
    }
}
