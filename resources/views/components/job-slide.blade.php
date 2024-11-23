
<div class="job-slide">
    <div class="job-company">
        <div class="company-photo">
            <img src="/storage/companies_avatars/{{$companyAvatar}}" alt="{!! $companyName !!}">
            <h4>{!! $companyName !!}</h4>
        </div>
        <div class="job-title">
            <h1>{!! $jobTitle !!}</h1>
            <div><p style="margin-right:10px;">{!! $jobCategory !!}</p><p >📍 {!! $jobLocation !!} </p></div>
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

