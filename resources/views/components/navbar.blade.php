{{-- css links --}}
<link rel="stylesheet" href="/css/footer.css">
<link rel="stylesheet" href="/css/navbar.css">

{{-- Montserrat font --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

{{-- burger bar link --}}
<link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        />
<nav>
    <div class="logo" onclick="window.location.href='/home'"><img src="/img/c.png" alt=""><h1>CareerConnect</h1></div>
    <div class="links" id="links">
        <ul>
            <li><a href="/home">Home</a></li>
            <li><a href="/jobs">Jobs</a></li>
            <li><a href="/companies">Companies</a></li>

            @guest
            <li><a href="/login">Login</a></li>
            <li><a href="/signup">Signup</a></li>
            @endguest
            @auth
            @if(auth()->user()->role=='company')
            <li><a href="/job/add">Post a job</a></li>
            <li><a href="/company/{{auth()->id()}}">Profile</a></li>
            @endif
            @if(auth()->user()->role=='seeker')
            <li><a href="/user/{{auth()->id()}}">Profile</a></li>
            @endif
            <li><a href="/logout">Logout</a></li>
            @endauth
        </ul>
    </div>
    <button class="burger-bar" id="burger" onclick="showLinks()">
        <i class="fa fa-bars"></i>
    </button>
</nav>
<div class="hidden-links" id="hidden-links">
    <ul>
        <li><a href="/home">Home</a></li>
            <li onclick="showLinks()"><a href="/jobs">Jobs</a></li>
            <li onclick="showLinks()"><a href="/companies">Companies</a></li>

            @guest
            <li onclick="showLinks()"><a href="/login">Login</a></li>
            <li onclick="showLinks()"><a href="/signup">Signup</a></li>
            @endguest
            @auth
            @if(auth()->user()->role=='company')
            <li onclick="showLinks()"><a href="/job/add">Post a job</a></li>
            <li onclick="showLinks()"><a href="/company/{{auth()->id()}}">Profile</a></li>
            @endif
            @if(auth()->user()->role=='seeker')
            <li onclick="showLinks()"><a href="/user/{{auth()->id()}}">Profile</a></li>
            @endif
            <li onclick="showLinks()"><a href="/logout">Logout</a></li>
            @endauth
    </ul>
</div>
<script src="/js/navbar.js">
    
</script>