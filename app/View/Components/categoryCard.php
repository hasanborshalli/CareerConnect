<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class categoryCard extends Component
{
    /**
     * Create a new component instance.
     */
    public $image;
    public $title;

    public $countJobs;
    public $categoryId;

    public function __construct($image, $title, $countJobs, $categoryId)
    {
        $this->image = $image;
        $this->title = $title;
        $this->countJobs = $countJobs;
        $this->categoryId = $categoryId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.categoryCard');
    }
}