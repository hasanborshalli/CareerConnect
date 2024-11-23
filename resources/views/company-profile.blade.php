<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/company-profile.css">
    <title>{{$user->company->name}} Profile</title>
</head>
<body>
    <x-navbar/>
    <section class="company-profile">
        <div class="aboutme">
        <div class="company-profile-info">
            <img src="/storage/companies_avatars/{{$user->company->avatar}}" alt="">
            <div class="company-info-name">
                <h2>{{$user->company->name}}</h2>
                <p>{{$user->company->slogan}}</p> {{--max charcaters 50--}}
            </div>
        </div>
        @can('update',$user)
            <div class="edit"><button onclick="window.location.href='/company/edit/{{$user->id}}?part=1'"><img src="/img/pencil.png" alt=""></button></div>
            @endcan
    </div>
    <hr>
    <div class="aboutme">
        <div class="company-about">
            <h2>About Us:</h2>
            <p>{{$user->company->description}}</p>
        </div>
        @can('update',$user)
        <div class="edit"><button onclick="window.location.href='/company/edit/{{$user->id}}?part=2'"><img src="/img/pencil.png" alt=""></button></div>
        @endcan
    </div>
    <hr>
        <div class="company-profile-ul">
            <h2>Current Openings:</h2>
            <ul>
               @if(count($openings)>0)
                    @foreach($openings as $opening)
                        <li><a href="/jobs/{{$opening->id}}">{{$opening->title}}</a></li>
                    @endforeach
                @else
                <p>No Job Openings Right Now</p>
               @endif
            </ul>
        </div>
        
    <hr>
    <div class="aboutme">
        <div class="company-profile-ul">
            <h2>Why Work With Us:</h2>
            <ul>
               @foreach($special as $item)
               <li>{{$item}}</li>
               @endforeach
            </ul>
        </div>
        @can('update',$user)
        <div class="edit"><button onclick="window.location.href='/company/edit/{{$user->id}}?part=3'"><img src="/img/pencil.png" alt=""></button></div>
        @endcan
    </div>
    <hr>
    <div class="aboutme">
        <div class="company-profile-ul">
            <h2>Get in touch:</h2>
            <ul>
                <li><strong>Email:</strong> <a target="_blank" href="mailto:{{$user->email}}">{{$user->email}}</a></li>
                <li><strong>Phone:</strong> <a target="_blank" href="https://wa.me/961{{$user->company->phone}}">{{$user->company->phone}}</a></li>
                <li><strong>Address: </strong>{{$user->company->address}}</li>
            </ul>
        </div>
        @can('update',$user)
        <div class="edit"><button onclick="window.location.href='/company/edit/{{$user->id}}?part=4'"><img src="/img/pencil.png" alt=""></button></div>
        @endcan
    </div>
        <div class="company-profile-ul">
            <h2>Follow Us:</h2>
            <div class="company-links">
                <a target="_blank" href="{{$user->facebook}}"><img src="/img/facebook.png" alt="Facebook"></a>
                <a target="_blank" href="{{$user->instagram}}"><img src="/img/instagram.png" alt="Instagram"></a>
                <a target="_blank" href="{{$user->linkedin}}"><img src="/img/linkedin.png" alt="Linkedin"></a>
            </div>
        </div>
       
    </section>
    <x-footer/>
</body>
</html>