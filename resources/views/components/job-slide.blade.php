<div class="job-slide">
<div class="job-container">
    <div class="job-main">
        <img src="/storage/companies_avatars/{{$companyAvatar}}" alt="{!! $companyName !!}">
        <h2 class="job-title">{!! $jobTitle !!}</h2>
    </div>
    <div class="job-info">
        <h4>{!! $companyName !!}</h4>
        <p>{!! $jobCategory !!}</p>
        <p>📍 {!! $jobLocation !!}</p>
    </div>
</div>
 <div class="job-desc"><p>{!! $jobDescription !!}...</p></div>
   <div class="job-btn">
        @auth
        @if(auth()->user()->role=='seeker')
        <button class="job-slide-btn" onclick="window.location.href = '/jobs/{{$jobId}}?apply=yes'">Apply Now</button>
        @elseif(auth()->user()->role=='company')
        <button class="job-slide-btn" onclick="window.location.href = '/jobs/{{$jobId}}'">Apply Now</button>
        @endif
        @endauth 
        @guest
        <button class="job-slide-btn" onclick="window.location.href = '/jobs/{{$jobId}}'">Apply Now</button>
        @endguest
        <button class="job-slide-btn" onclick="window.location.href = '/jobs/{{$jobId}}'">Details</button>

    </div>
</div>
