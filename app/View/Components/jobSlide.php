<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class jobSlide extends Component
{
    public $jobTitle;
    public $companyName;
    public $companyAvatar;
    public $jobLocation;
    public $jobCategory;
    public $jobDescription;
    public $jobId;
    public function __construct($jobTitle, $companyName, $jobLocation, $jobCategory, $jobDescription, $jobId, $companyAvatar)
    {
        $this->jobTitle = $jobTitle;
        $this->jobLocation = $jobLocation;
        $this->companyName = $companyName;
        $this->jobCategory = $jobCategory;
        $this->jobDescription =$jobDescription;
        $this->jobId = $jobId;
        $this->companyAvatar=$companyAvatar;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.job-slide');
    }
}