<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/job-details.css">
    <title>Job Details</title>
</head>
<body>
    <x-navbar/>
<section class="job-details">
    <div class="job-details-company" >
        <img src="/storage/companies_avatars/{{$job->company->avatar}}" alt="" onclick="window.location.href='/company/{{$job->company->user_id}}'">
        <h2 onclick="window.location.href='/company/{{$job->company->user_id}}'">{{$job->company->name}}</h2>
    </div><br>
    @can('update',$job)
        <button class="apply-button" onclick="window.location.href='/job/edit/{{$job->id}}'">Edit Job</button>
        <button class="apply-button delete-btn" onclick="openDeleteDialog('{{$job->title}}')">Delete Job</button>
    @endcan
   <div class="job-details-title" > <h3>{{$job->title}}</h3><h3 >{{$job->category->name}}</h3></div>
   <div class="job-details-location">
    <p>📍 {{$job->location}} </p>
    <p>Posted {{$postedTime}}</p>
    <p>Salary: {{$job->salary}}</p>
</div>
<h2>About Job:</h2>
<p style="margin-left:20px;">{{$job->description}}</p>
<hr>
<div class="job-details-ul">
    <h2>Job Responsibilities:</h2>
    <ul>
        @foreach($responsibilities as $responsibility)
        <li>{{$responsibility}}</li>
        @endforeach
    </ul>
</div>
<hr>
<div class="job-details-ul">
    <h2>Job Requirements</h2>
    <ul>
        @foreach($requirements as $requirement)
        <li>{{$requirement}}</li>
        @endforeach
    </ul>
</div>
<hr>
@auth
@if(auth()->user()->role=='seeker')
<button id="apply-btn" class="apply-button" onclick="openApplyDialog('{{$job->title}}','{{$job->company->name}}')">{{$job->is_applied_by_user() ?  'Remove Your Application' : 'Apply Now'}}</button>
@elseif(auth()->user()->role=='company')
@can('update',$job)
<button  class="apply-button" onclick="window.location.href='/applications/{{$job->id}}'">Show Applications</button>
@endcan
@endif
@endauth 
@guest
<button class="apply-button" onclick="window.location.href='/login'">Apply Now</button>
@endguest
<div id="custom-dialog" class="dialog-overlay">
    <div class="dialog-box">
      <h2>Confirmation</h2>
      <p id="dialog-text"></p>
      <div class="dialog-buttons">
        <button class="btn-confirm" id="btn-confirm" >Yes</button>
        <button class="btn-cancel" onclick="closeDialog()">No</button>
      </div>
    </div>
  </div>
  <div id="toast" class="toast-notification"></div>
</section>
<x-footer/>

<script>

const customDialog=document.getElementById('custom-dialog');
const dialogText=document.getElementById('dialog-text');
const confirmButton=document.getElementById('btn-confirm');
const applyBtn=document.getElementById('apply-btn');
let params = new URLSearchParams(window.location.search);
let paramValue = params.get('apply');
let isApplying={{$job->is_applied_by_user() ? 'false' : 'true'}};

function openApplyDialog(jobTitle, companyName) {
    if(isApplying) {
        dialogText.innerHTML=
        `Are you sure you want to apply for <strong>${jobTitle}</strong> at <strong>${companyName}</strong>?`;
    }else{
        dialogText.innerHTML=
        `Are you sure you want to remove your <strong>${jobTitle}</strong> application at <strong>${companyName}</strong>?`;
    }
    confirmButton.setAttribute('onclick','applyForJob()');
    customDialog.classList.add('showDialog');
}

if(paramValue==='yes'){
    openApplyDialog('{{$job->title}}','{{$job->company->name}}');
}
function openDeleteDialog(jobTitle){
    dialogText.innerHTML=`Are you sure you want to delete <strong>${jobTitle}</strong> job?`;
    confirmButton.setAttribute('onclick','deleteJob()');
    customDialog.classList.add('showDialog');
}
function closeDialog() {
  document.getElementById('custom-dialog').classList.remove('showDialog');
}
function applyForJob() {
    let options={
        method:"POST",
        headers:{
          'X-CSRF-TOKEN': '{{csrf_token()}}',
          'Content-Type': 'application/json'
        }
      }
      fetch('/job/apply/'+{{$job->id}},options)
      .then(response => response.json())
      .then((data)=>{
        if(data.applied=="added"){
            closeDialog();
            notifySuccess('success');
            applyBtn.textContent="Remove Your Application";
            isApplying=false;
        }else if(data.applied=="removed"){
            closeDialog();
            notifySuccess('removed');
            applyBtn.textContent="Apply Now";
            isApplying=true;

        }
        else{
            closeDialog();
            notifySuccess('failed');
        }
      });
}
function notifySuccess(message){
    const toast = document.getElementById("toast");
    if(message==='success'){
        toast.innerHTML='Your application has been sent successfully';
    }else if(message==='removed'){
        toast.innerHTML='Your application has been removed :(';
    }
    else if(message==='failed'){
        toast.innerHTML='An error has occurred while applying! Please try again';
    }
    // Show the toast
    toast.classList.add("showDialog");

    // Hide the toast after 3 seconds
    setTimeout(() => {
        toast.classList.remove("showDialog");
    }, 3000);
}
function deleteJob(){
    window.location.href="/job/delete/{{$job->id}}";
}
</script>
</body>
</html>

