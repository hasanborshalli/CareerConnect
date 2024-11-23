<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/signup.css">
    <title>Post a Job</title>

</head>
<body>
    <section class="centered-form">
        <h1>Post A Job</h1>
            <h2>Job Information</h2>
            <form action="/jobs/add" method="POST" id="form-responsibility">
                @csrf
                <input type="text" placeholder="Job Title" class="input-default" name="title" required value="{{old('title')}}"><br>
                @error('title')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <textarea name="description" required id="" cols="30" rows="10" placeholder="Description" class="input-default">{{old('description')}}</textarea><br>
                @error('description')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <input type="text" placeholder="Location" class="input-default" name="location" required value="{{old('location')}}"><br>
                @error('location')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <div class="two-inputs">
                    <input type="number" placeholder="Min Salary" class="small-input" min="1" name="minSalary" value="{{old('minSalary')}}">@error('minSalary')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                    <input type="number" placeholder="Max Salary" class="small-input" min="1" name="maxSalary" value="{{old('maxSalary')}}">@error('maxSalary')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                    </div><br>
                <select name="category_id" class="input-default" >
                <option selected disabled>Choose Job Category</option>
                @foreach ($categories as $category)
                   <option value="{{$category->id}}">{{$category->name}}</option> 
                @endforeach
                </select><br>
                
                @error('category_id')
                <p style="color:red">{{$message}}</p>
                @enderror<br>
                <div class="responsibility-input-container">
                    <div class="input-wrapper">
                        <div class="responsibility-tags">
                        </div>
                        <input type="text" class="responsibility-input" placeholder="Job Responsibilities" id="responsibilityInput"  oninput="showSuggestions('responsibility')" onkeydown="handleKeyDown(event,'responsibility')">
                        <input type="hidden" id="hiddenResponsibilityInput" name="responsibility">

                    </div>
                    <ul class="suggestions" id="suggestionsList-responsibility">
                    </ul>
                </div>
                @error('responsibility')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <div class="requirement-input-container">
                    <div class="input-wrapper">
                        <div class="requirement-tags">
                        </div>
                        <input type="text" class="requirement-input" placeholder="Job Requirements" id="requirementInput"  oninput="showSuggestions('requirement')" onkeydown="handleKeyDown(event,'requirement')">
                        <input type="hidden" id="hiddenRequirementInput" name="requirement">

                    </div>
                    <ul class="suggestions" id="suggestionsList-requirement">
                    </ul>
                </div>
                @error('requirement')
                <p style="color:red">{{$message}}</p>
                @enderror
                <br>
                <input type="button" value="Post" class="post-btn" onclick="submitForm('responsibility')"><br><br>
            </form>
           <script src="/js/arrayInput.js">
            
           </script>
</body>
</html>