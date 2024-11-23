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

    <title>Signup Step 2</title>
</head>
<body>
    <section class="centered-form">
    @if($role=='company')
    <h1>SIGNUP</h1>
        <h2>Company Information</h2>
        <form action="/signup2" method="POST" id="form-specials" enctype="multipart/form-data">
            @csrf
            <input type="text" required placeholder="Company Name" name="name" class="input-default" value="{{old('name')}}" oninput="capitalizeFirstLetter(this)">
            <br>
            @error('name')
            <p style="color:red">{{$message}}</p>
            @enderror
            <br>
            <input type="text" required placeholder="Username" name="username" class="input-default" value="{{old('username')}}"><br>
                @error('username')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="password" required placeholder="Password" name="password" class="input-default" ><br>
                @error('password')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="password" required placeholder="Confirm Password" name="password_confirmation" class="input-default"><br>
                @error('password_confirmation')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <label for="file-upload-company" class="input-default file-input" > <span id="file-label-text-company">Upload Company Logo🔗</span></label>
            <input id="file-upload-company" required type="file" name="avatar" value="{{old('avatar')}}" onchange="handleFile('company')"/><br>
                @error('avatar')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required placeholder="Company slogan" class="input-default" name="slogan" value="{{old('slogan')}}"><br>
                @error('slogan')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <textarea required  cols="30" rows="10" placeholder="Talk about the company..." class="input-default" name="description" >{{old('description')}}</textarea><br>
                @error('description')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            
            <div class="special-input-container">
                <div class="input-wrapper">
                    <div class="special-tags">
                    </div>
                    <input type="text" class="special-input" placeholder="Why Join Your Team?" id="specialInput"  oninput="showSuggestions('specials')" onkeydown="handleKeyDown(event,'specials')">
                    <input type="hidden" id="hiddenSpecialInput" name="special">
                </div>
                <ul class="suggestions" id="suggestionsList-special">
                </ul>
            </div>
                @error('special')
                <p style="color:red">{{$message}}</p>
                @enderror
            <div class="box"></div>
            <input type="button" value="Next" class="signup-next" onclick="submitForm('specials')">

        </form>
    @elseif($role=='seeker')
        <h1>SIGNUP</h1>
        <h2>Personal Information</h2>
        <form action="/signup2" method="POST" enctype="multipart/form-data">
            @csrf
            <div class='two-inputs'><input type="text" placeholder="First Name"  name="fname" class="small-input" required value="{{old('fname')}}" oninput="capitalizeFirstLetter(this)"><input type="text" name="lname" placeholder="Last Name" class="small-input" required value="{{old('lname')}}" oninput="capitalizeFirstLetter(this)"></div>
                @error('fname')
                <p style="color:red">{{$message}}</p>
                @enderror
                @error('lname')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required value="{{old('username')}}" placeholder="Username" name="username" class="input-default"><br>
                @error('username')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="password" required  placeholder="Password" name="password" class="input-default"><br>
                @error('password')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="password" required  placeholder="Confirm Password" name="password_confirmation" class="input-default"><br>
                @error('password_confirmation')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="email" required value="{{old('email')}}" placeholder="Email" name="email" class="input-default"><br>
                @error('email')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required value="{{old('phone')}}" placeholder="Phone" name="phone" class="input-default"><br>
                @error('phone')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required value="{{old('address')}}" placeholder="Address" name="address" class="input-default"><br>
                @error('address')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <label for="file-upload"  class="input-default file-input"><span id="file-label-text">Upload Profile Photo🔗</span></label>
            <input id="file-upload" required value="{{old('avatar')}}" type="file" name="avatar" onchange="handleFile('seeker')"/><br>
                @error('avatar')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <textarea required   id="" cols="30" rows="10" placeholder="Talk About Yourself" class="input-default" name="description">{{old('description')}}</textarea><br>
                @error('description')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required value="{{old('linkedin')}}" placeholder="Linkedin Link" name="linkedin" class="input-default"><br>
                @error('linkedin')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required value="{{old('facebook')}}" placeholder="Facebook Link" name="facebook" class="input-default"><br>
                @error('facebook')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required value="{{old('instagram')}}" placeholder="Instagram Link" name="instagram" class="input-default"><br>
                @error('instagram')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <div class="box"></div>
            <input type="submit" value="Next" class="signup-next">
        </form>
    @else
    <h1>who are you</h1>
    @endif
</section>
<script src="/js/signup.js">
</script>
<script src="/js/arrayInput.js"></script>
</body>
</html>