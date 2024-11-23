<div class="job-card" >
<div class="job-card-title"><img src="/storage/companies_avatars/{{$companyImage}}" alt=""><h3>{!! $jobTitle !!}</h3></div>
<div class="job-card-company"><h3>{!! $companyName !!}</h3><h3>{!! $jobCategory !!}</h3></div>
<h3>📍 {!! $jobLocation !!} </h3>
 <p>{!! $jobDescription !!}</p> {{--max 130 characters --}}
<p>Salary: {{$jobSalary}}</p>
<p>Posted {{$postedTime}}</p>
<button onclick="window.location.href='/jobs/{{$jobId}}'">See Details</button>
</div>