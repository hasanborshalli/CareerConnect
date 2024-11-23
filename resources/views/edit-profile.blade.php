<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/signup.css">
    <title>EditProfile</title>
</head>
<body>
    <section class="centered-form">
        @if(request('part')==1)
        <h1>Edit {{$user->seeker->fname}} Profile</h1>
            <h2>Main Information</h2>
            <form action="/editUser/part1/{{$user->id}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <img src="/storage/seekers_avatars/{{$user->seeker->avatar}}" alt="" class="view-photo" id="view-photo"><br>
                <input type="text" required placeholder="First Name" name="fname" class="input-default" value="{{old('fname',$user->seeker->fname)}}">
                <br>
                @error('fname')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <input type="text" required placeholder="Last Name" name="lname" class="input-default" value="{{old('lname',$user->seeker->lname)}}"><br>
                    @error('lname')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <input type="text" required placeholder="Work Title" name="workTitle" class="input-default" value="{{old('workTitle',$user->seeker->workTitle)}}"><br>
                    @error('workTitle')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <input type="text" required placeholder="Address" name="address" class="input-default" value="{{old('address',$user->seeker->address)}}"><br>
                    @error('address')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <label for="file-upload" class="input-default file-input" > <span id="file-label-text">Change Profile Photo🔗</span></label>
                <input id="file-upload" type="file" name="avatar" accept="image/*" value="{{old('avatar',$user->seeker->avatar)}}" onchange="handleFile('seeker'); changePhoto('seeker');"/><br>
                    @error('avatar')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <div class="box"></div>
                <input type="submit" value="Confirm" class="signup-next">
    
            </form>
            @elseif(request('part')==2)
            <h1>Edit {{$user->seeker->fname}} Profile</h1>
            <h2>Personal Information</h2>
            <form action="/editUser/part2/{{$user->id}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <input type="email" required placeholder="Email" name="email" class="input-default" value="{{old('email',$user->email)}}"><br>
                    @error('email')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <input type="phone" required placeholder="Phone" name="phone" class="input-default" value="{{old('phone',$user->seeker->phone)}}"><br>
                    @error('phone')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <input type="text" required placeholder="Linkedin URL" name="linkedin" class="input-default" value="{{old('linkedin',$user->linkedin)}}"><br>
                    @error('linkedin')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <label for="file-upload-resume" class="input-default file-input" > <span id="file-label-text-resume">Upload Resume🔗</span></label>
                <input id="file-upload-resume" required type="file" name="resume" value="{{old('resume',$user->seeker->resume)}}" onchange="handleFile('resume')"/><br>
                    @error('resume')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <div class="box"></div>
                <input type="submit" value="Confirm" class="signup-next">
            </form>
            @elseif(request('part')==3)
            <h1>Edit {{$user->seeker->fname}} Profile</h1>
            <h2>About Me</h2>
            <form action="/editUser/part3/{{$user->id}}" method="POST">
                @csrf
                <textarea required  cols="30" rows="10" placeholder="Talk about yourself..." class="input-default" name="description" >{{old('description',$user->seeker->description)}}</textarea><br>
                @error('description')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br> 
            <div class="box"></div>
            <input type="submit" value="Confirm" class="signup-next">
        </form>
        @elseif(request('part')==4)
        <h1>Edit {{$user->seeker->fname}} Profile</h1>
            <h2>Job Preferences</h2>
            <form action="/editUser/part4/{{$user->id}}" method="POST" id='form-skills'>
                @csrf
                <input type="text" required placeholder="Prefered Location" name="jobLocation" class="input-default" value="{{old('jobLocation',$user->seeker->jobLocation)}}"><br>
                @error('jobLocation')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required placeholder="Career Goals" name="goals" class="input-default" value="{{old('goals',$user->seeker->goals)}}"><br>
                @error('goals')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <div class="skills-input-container">
                <div class="input-wrapper">
                    <div class="skill-tags">
                    </div>
                    <input type="text" class="skill-input" placeholder="Add a skill..." id="skillInput"  oninput="showSuggestions('skills')" onkeydown="handleKeyDown(event,'skills')">
                    <input type="hidden" id="hiddenSkillInput" name="skills">

                </div>
            
                <ul class="suggestions" id="suggestionsList-skill">
                </ul>
            </div>
                @error('skills')
                <p style="color:red">{{$message}}</p>
                @enderror
                <div class="box"></div>
            <input type="button" value="Confirm" class="signup-next" onclick="submitForm('skills')">
            </form>
            @elseif(request('part')==5)
            <h1>Edit {{$user->company->name}} Profile</h1>
            <h2>Main Information</h2>
            @endif
        </section>
        <script src="/js/signup.js"></script>
        <script src="/js/arrayInput.js">
        </script>
        <script>
            renderOldTags({!! $user->seeker->skills !!},'skill');
        </script>
</body>
</html>