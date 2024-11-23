<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- css links --}}
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/job-slide.css">
    <link rel="stylesheet" href="/css/category-card.css">
    <title>Home Page</title>
</head>
<body>
    <x-navbar/>
    @foreach($categories as $category)
    
    @endforeach
<section class="main">
    <div class="main-left">
        <h1>Find Your Dream Job Today</h1><br>
        <p>Browse thousands of job listings from leading companies. Apply directly from your phone or computer</p><br>
        <button onclick="window.location.href='/jobs'"><strong>Start Your Search</strong></button>
    </div>
    <div class="main-right"><img src="/img/seekers.png" alt=""></div>
</section>
<h1 class="section-header">Job Categories</h1>
<div class="categories-carousel">
    <button class="scroll-btn left" onclick="scrollingLeft()">&#8249;</button>
    <section class="categories">
        
        @foreach($categories as $category)
        <x-categoryCard 
        image="{{$category->avatar}}"
        title="{{$category->name}}"
        countJobs="{{count($category->jobs)}}"
        categoryId="{{$category->id}}"
        />
        @endforeach
    </section>
    <button class="scroll-btn right" onclick="scrollRight()">&#8250;</button>
</div>
<h1 class="section-header">Featured Jobs</h1>
<div class="custom-carousel">
    <button class="carousel-btn left" onclick="showPrev()">&#8249;</button>
    <div class="carousel-content">
        @foreach($featuredJobs as $job)
            <x-job-slide
            companyName="{{$job->company->name}}"
            companyAvatar="{{$job->company->avatar}}"
            jobTitle="{{$job->title}}"
            jobLocation="{{$job->location}}"
            jobCategory="{{$job->category->name}}"
            jobDescription="{{Str::limit($job->description,60)}}"
            jobId="{{$job->id}}"
            />
        @endforeach
    </div>
    <button class="carousel-btn right" onclick="showNext()">&#8250;</button>
</div>
<x-footer/>
<script src="/js/home.js"></script>

</body>
</html>

