<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/applications.css">
    <title>Applications</title>
</head>
<body>
    <x-navbar/>
    <section class="applications">
    <h1>{{$job->title}} Applications</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Applicant Name</th>
                <th>Applicant Title</th>
                <th>Resume</th>
                <th>Applied on</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
            <tr>
                <td data-label="No.">{{$loop->iteration}}</td>
                <td data-label="Applicant Name"><a href="/user/{{$application->user_id}}">{{$application->user->seeker->fname}} {{$application->user->seeker->lname}}</a></td>
                <td data-label="Applicant Title">{{$application->user->seeker->workTitle}}</td>
                <td data-label="Resume"><a href="/storage/seekers_resumes/{{$application->user->seeker->resume}}" download target="_blank">Download Resume</a></td>
                <td data-label="Applied on">{{$application->created_at->format('d-m-Y')}}</td>
            </tr>
            @endforeach
            
            
        </tbody>
    </table>
</section>
    <x-footer/>
</body>
</html>