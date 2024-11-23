<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class jobCard extends Component
{
    public $companyImage;
    public $jobTitle;
    public $companyName;
    public $jobCategory;
    public $jobLocation;
    public $jobDescription;
    public $jobSalary;
    public $jobId;
    public $postedTime;
    public function __construct($companyImage, $jobCategory, $jobLocation, $jobDescription, $jobSalary, $jobTitle, $companyName, $postedTime, $jobId)
    {
        $this->companyImage = $companyImage;
        $this->companyName = $companyName;
        $this->postedTime = $postedTime;
        $this->jobCategory =$jobCategory;
        $this->jobDescription = $jobDescription;
        $this->jobSalary = $jobSalary;
        $this->jobTitle = $jobTitle;
        $this->jobLocation = $jobLocation;
        $this->jobId = $jobId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.job-card');
    }
}