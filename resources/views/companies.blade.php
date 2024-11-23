<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/companies.css">
    <title>Companies</title>
</head>
<body>
    <x-navbar/>
    <section class="companies-list">
        <form action="/search/companies" method="GET" class="search-form">
            <input type="text" id="search" name="search" placeholder="Search for companies..." class="search-input">
            <button type="submit" class="search-button">Search</button>
        </form>
        <h2>All Companies</h2>
        @foreach($companies as $company)
        <div class="company-item">
            <img src="/storage/companies_avatars/{{$company->avatar}}" alt="{{$company->name}}">
            <div class="company-info">
                <h3><a href="/company/{{$company->user_id}}">{{$company->name}}</a></h3>
                <p>{{$company->slogan}}</p>
                <p>Location: {{$company->address}}</p>
                
            </div>
        </div>
        @endforeach
    </section>
    <x-footer/>
</body>
</html>