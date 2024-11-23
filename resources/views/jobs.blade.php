<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- css links --}}
    <link rel="stylesheet" href="/css/jobs.css">
    <link rel="stylesheet" href="/css/job-card.css">
    <title>Jobs Page</title>
    @php
    use Carbon\Carbon;    
    @endphp
</head>
<body>
    <x-navbar/>
<section class="filters">
    <form action="/job/category" method="GET" id="category-form">
    @csrf
    <select name="category_id" class="categories-select" id="category-select">
        <option disabled selected>Select a category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    </form>
    
    <form action="/search/jobs" method="GET" id="search-form">
        @csrf
    <input type="search" name="search" class="job-search" id="search-input" placeholder="Work Title">
</form>
</section>
<section class="job-list">
    @foreach($jobs as $job)
    <x-job-card
    companyName="{{$job->company->name}}"
    companyImage="{{$job->company->avatar}}"
    postedTime="{{Carbon::parse($job->created_at)->diffForHumans()}}"
    jobTitle="{{$job->title}}"
    jobDescription="{{$job->description}}"
    jobLocation="{{$job->location}}"
    jobSalary="{{$job->salary}}"
    jobCategory="{{$job->category->name}}"
    jobId="{{$job->id}}"
    />   
    @endforeach
</section>
<x-footer/>
<script>
    const searchForm=document.getElementById('search-form');
    const categoryForm=document.getElementById('category-form');
    const searchInput=document.getElementById('search-input');
    const categorySelect=document.getElementById('category-select');
    searchInput.addEventListener('click',function(event){
        if(event.key==="Enter"){
            searchForm.submit();
        }
    });
    categorySelect.addEventListener('change',function(event){
            categoryForm.submit(); 
    });
</script>
</body>
</html>


