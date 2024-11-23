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
        <h1>Edit {{$user->company->name}} Profile</h1>
            <h2>Main Information</h2>
            <form action="/editCompany/part1/{{$user->id}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <img src="/storage/companies_avatars/{{$user->company->avatar}}" alt="{{$user->company->name}}" class="view-photo" id="view-photo"><br>
                <input type="text" required placeholder="Company Name" name="name" class="input-default" value="{{old('name',$user->company->name)}}">
                <br>
                @error('name')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <input type="text" required placeholder="Company Slogan" name="slogan" class="input-default" value="{{old('slogan',$user->company->slogan)}}"><br>
                    @error('slogan')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <label for="file-upload-company" class="input-default file-input" > <span id="file-label-text-company">Change Company Logo🔗</span></label>
                <input id="file-upload-company"  type="file" name="avatar" accept="image/*" value="{{old('avatar',$user->company->avatar)}}" onchange="handleFile('company'); changePhoto('company');"/><br>
                    @error('avatar')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                <br>
                <div class="box"></div>
                <input type="submit" value="Confirm" class="signup-next">
            </form>
            @elseif(request('part')==2)
            <h1>Edit {{$user->company->fname}} Profile</h1>
            <h2>About Us</h2>
            <form action="/editCompany/part2/{{$user->id}}" method="POST">
                @csrf
                <textarea required  cols="30" rows="10" placeholder="Talk about Your Company..." class="input-default" name="description" >{{old('description',$user->company->description)}}</textarea><br>
                @error('description')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br> 
            <div class="box"></div>
            <input type="submit" value="Confirm" class="signup-next">
        </form>
            @elseif(request('part')==3)
            <h1>Edit {{$user->Company->fname}} Profile</h1>
            <h2>Company Specializations</h2>
            <form action="/editCompany/part3/{{$user->id}}" method="POST" id="form-specials" >
            @csrf
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
                <input type="button" value="Confirm" class="signup-next" onclick="submitForm('specials')">
            </form>
            
        @elseif(request('part')==4)
        <h1>Edit {{$user->company->fname}} Profile</h1>
            <h2>Contact Information</h2>
            <form action="/editCompany/part4/{{$user->id}}" method="POST" id='form-skills'>
                @csrf
                <input type="email" required placeholder="Email" name="email" class="input-default" value="{{old('email',$user->email)}}"><br>
                @error('email')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required placeholder="Phone" name="phone" class="input-default" value="{{old('phone',$user->company->phone)}}"><br>
                @error('phone')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required placeholder="Address" name="address" class="input-default" value="{{old('address',$user->company->address)}}"><br>
                @error('address')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required placeholder="Linkedin Link" name="linkedin" class="input-default" value="{{old('linkedin',$user->linkedin)}}"><br>
                @error('linkedin')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required placeholder="Facebook Link" name="facebook" class="input-default" value="{{old('facebook',$user->facebook)}}"><br>
                @error('facebook')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
            <input type="text" required placeholder="Instagram Link" name="instagram" class="input-default" value="{{old('instagram',$user->instagram)}}"><br>
                @error('instagram')
                <p style="color:red">{{$message}}</p>
                @enderror
            <br>
                <div class="box"></div>
            <input type="submit" value="Confirm" class="signup-next" >
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
            renderOldTags({!! $user->company->special !!},'special');
        </script>
</body>
</html>