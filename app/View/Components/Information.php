<?php

namespace App\View\Components;

use App\Models\Website;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Information extends Component
{
    public $website;
    public function __construct()
    {
        $this->website = Website::where('name', 'Information')->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.information');
    }
}
