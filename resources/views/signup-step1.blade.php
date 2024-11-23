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

    <title>Signup Step 1</title>
</head>
<body>
   
    <section class="step1">
        <h1>SIGNUP</h1>
        <h2>Welcome! Choose Your Path to Get Started</h2>
        <div class="choices">
            <div class="choice" onclick="navigateStep2('company')">
                <img src="/img/company.png" alt="Company">
                <h2>Company</h2>
                <p>Find top talent and manage your job postings easily</p>
            </div>
            <div class="choice" onclick="navigateStep2('seeker')">
                <img src="/img/file.png" alt="Job Seeker">
                <h2>Job Seeker</h2>
                <p>Discover job opportunities tailored to your skills</p>
            </div>
        </div>
    </section>
    <script>
        function navigateStep2(signup_role){
                window.location.href='/signup/step2/'+signup_role;
        }
    </script>
</body>
</html>