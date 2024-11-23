<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/user-profile.css">
    <title>{{$user->seeker->fname}} {{$user->seeker->lname}} Profile</title>
</head>
<body>
    <x-navbar/>
        <section class="user-profile">
            <div class="user-profile-info">
                <div class="user-profile-info-left">
                <img class="avatar" src="/storage/seekers_avatars/{{$user->seeker->avatar }}" alt=""> {{-- max height 750px and max width 750px--}}
                <div class="info-name">
                    <h2>{{$user->seeker->fname}} {{$user->seeker->lname}}</h2>
                    <p>{{$user->seeker->workTitle}}</p>
                    <p>{{$user->seeker->address}}</p>
                </div>
            </div>
            @can('update',$user)
            <div class="edit"><button onclick="window.location.href='/user/edit/{{$user->id}}?part=1'"><img src="/img/pencil.png" alt=""></button></div>
            @endcan
            </div>
            <hr>
            <div class="aboutme">
            <div class="user-profile-ul">
                <h2>Personal Information:</h2>
                <ul>
                    <li><strong>Email:</strong> <a target="_blank" href="mailto:{{$user->email}}">{{$user->email}}</a></li>
                    <li><strong>Phone:</strong> <a target="_blank" href="https://wa.me/961{{$user->seeker->phone}}">(+961) {{$user->seeker->phone}}</a></li>
                    <li><strong>Linkedin:</strong><a target="_blank" href="{{$user->linkedin}}"> {{$user->linkedin}}</a></li>
                    <li><strong>Resume:</strong><a target="_blank" download href="/storage/seekers_resumes/{{ $user->seeker->resume }}"> Download resume</a></li>
                </ul>
            </div>
            @can('update',$user)
            <div class="edit"><button onclick="window.location.href='/user/edit/{{$user->id}}?part=2'"><img src="/img/pencil.png" alt=""></button></div>
            @endcan
        </div>
            <hr>
            <div class="aboutme">
            <div class="user-about">
                <h2>About Me:</h2>
                <p>{{$user->seeker->description}}</p>
            </div>
            @can('update',$user)
            <div class="edit"><button onclick="window.location.href='/user/edit/{{$user->id}}?part=3'"><img src="/img/pencil.png" alt=""></button></div>
            @endcan
        </div>
            <hr>
            <div class="aboutme">
            <div class="user-profile-ul">
                <h2>Job Preferences:</h2>
                <ul>
                    <li><strong>Preferred Location: </strong>{{$user->seeker->jobLocation}}</li>
                    <li><strong>Skills: </strong>{{ implode(', ', $skills) }}</li>
                    <li><strong>Career Goals: </strong>{{$user->seeker->goals}}</li>
                </ul>
            </div>
            @can('update',$user)
            <div class="edit"><button onclick="window.location.href='/user/edit/{{$user->id}}?part=4'"><img src="/img/pencil.png" alt=""></button></div>
            @endcan
        </div>
            <hr>
            <div class="user-profile-ul">
                <h2>My Applications:</h2>
                <ul>
                    @if(count($user->applications)<=0)
                    <p>No Applications Right Now</p>
                    @endif
                    @foreach ($user->applications as $application)
                        <li class="applications-li" onclick="window.location.href='/jobs/{{$application->job_id}}'">{{$application->job->title}} at {{$application->job->company->name}} applied on {{$application->created_at->format('d-m-Y')}}</li>
                    @endforeach
                </ul>
            </div>
        </section>
    <x-footer/>
</body>
</html>