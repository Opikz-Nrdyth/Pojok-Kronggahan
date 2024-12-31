<?php

namespace App\View\Components;

use App\Models\Website;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class About extends Component
{
    public $website;
    public function __construct()
    {
        $this->website = Website::where('name', 'About')->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about');
    }
}
