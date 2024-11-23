<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/signup.css">
    {{-- Montserrat font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>Signup Step 3</title>
</head>
<body>
    <section class="centered-form">
        @if($role=='company')
        <h1>SIGNUP</h1>
            <h2>Contact Information</h2>
            <form action="/signup3" method="POST" >
                @csrf
                <input type="email" placeholder="Email" required name="email" value="{{old('email')}}" class="input-default"><br><br>
                <input type="text" placeholder="Phone" required name="phone" value="{{old('phone')}}" class="input-default"><br><br>
                <input type="text" placeholder="Address" required name="address" value="{{old('address')}}" class="input-default"><br><br>
                <input type="text" placeholder="Linkedin Link" required name="linkedin" value="{{old('linkedin')}}" class="input-default"><br><br>
                <input type="text" placeholder="Facebook Link" required name="facebook" value="{{old('facebook')}}" class="input-default"><br><br>
                <input type="text" placeholder="Instagram Link" required name="instagram" value="{{old('instagram')}}" class="input-default"><br><br>
                <div class="box"></div>
                <input type="submit" value="Signup" class="signup-next">
            </form>
        @elseif($role=='seeker')
            <h1>SIGNUP</h1>
            <h2>Job Preferences</h2>
            <form action="/signup3" method="post" id='form-skills' enctype="multipart/form-data">
                @csrf
                <select name="jobType" class="input-default" required value="{{old('jobType')}}">
                    <option selected disabled>Preffered Job Type</option>
                    <option >Full-time</option>
                    <option >Part-time</option>
                    <option >Internship</option>
                </select><br>
                @error('jobType')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <input type="text" placeholder="Prefered Location" class="input-default" required name="jobLocation" value="{{old('jobLocation')}}"><br>
                @error('jobLocation')
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
                <br>
                <input type="text" placeholder="Career Goals" class="input-default" name="goals" value="{{old('goals')}}"><br>
                @error('goals')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <input type="text" placeholder="Work Title" class="input-default" name="workTitle" value="{{old('workTitle')}}"><br>
                @error('workTitle')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <label for="file-upload-resume" class="input-default file-input" > <span id="file-label-text-resume">Upload Your Resume🔗</span></label>
                <input id="file-upload-resume" required type="file" name="resume" accept=".pdf" value="{{old('resume')}}" onchange="handleFile('resume')"/><br>
                @error('resume')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
                <div class="box"></div>
                <input type="button" value="Signup" class="signup-next" onclick="submitForm('skills')">
            </form>
        @else
        <h1>who are you</h1>
        @endif
    </section>
    <script src="/js/signup.js"></script>
    <script src="/js/arrayInput.js"></script>

</body>
</html>