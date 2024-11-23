<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Seeker;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function HomePage()
    {
        $featuredJobs=Job::orderBy('created_at', 'desc')->limit(5)->get();
        $categories=Category::orderBy('name', 'asc')->get();
        return view('home', ['categories'=>$categories,'featuredJobs'=>$featuredJobs]);

    }
    public function JobsPage()
    {
        $jobs=Job::orderBy('created_at', 'desc')->get();
        $categories=Category::orderBy('name', 'asc')->get();

        return view('jobs', ['categories'=>$categories,'jobs'=>$jobs]);

    }
    
    public function CompanySearch(Request $request)
    {
        $fields=$request->validate([
            'search'=>['required','max:255']
        ]);
        $companies=Company::search($fields['search'])->get();
        return view('companies', ['companies'=>$companies]);

    }
   
    public function JobDetailsPage(Job $job)
    {
        $responsibilities=json_decode($job->responsibility, true);
        $requirements=json_decode($job->requirement, true);
        $postedTime = Carbon::parse($job->created_at)->diffForHumans();

        return view('job-details', ['job'=>$job,'responsibilities'=>$responsibilities,'requirements'=>$requirements,'postedTime'=>$postedTime]);

    }
    public function UserPage(User $user)
    {
        $skills=json_decode($user->seeker->skills, true);
        return view('user-profile', ['user' => $user,'skills' => $skills]);

    }
    public function EditProfilePage(User $user)
    {
        return view('edit-profile', ['user' => $user]);

    }
    public function EditCompanyPage(User $user)
    {
        return view('edit-company', ['user' => $user]);

    }
    public function CompanyPage(User $user)
    {
        $special=json_decode($user->company->special, true);
        $openings=$user->company->jobs;
        return view('company-profile', ['user' => $user,'special' => $special,'openings' => $openings]);

    }
    public function LoginPage()
    {
        return view('login');

    }
    public function SignupPage()
    {
        return view('signup-step1');

    }
    
    public function SignupStep2($role)
    {
        if($role=='company'||$role=='seeker') {
            session(['signup_role'=>$role]);
            return view('signup-step2', ['role'=>$role]);

        } else {
            return redirect('signup');

        }

    }
    public function SignupStep3($role)
    {
        if($role=='company'||$role=='seeker') {
            return view('signup-step3', ['role'=>$role]);

        } else {
            return redirect('signup');

        }

    }
    public function AddJobPage()
    {
        $categories=Category::orderBy('name', 'asc')->get();

        return view('add-job', ['categories'=>$categories]);

    }
    public function EditJobPage(Job $job)
    {
        $parts = explode('-', $job->salary);
        $minSalary = (int)filter_var($parts[0], FILTER_SANITIZE_NUMBER_INT);
        $maxSalary = (int)filter_var($parts[1], FILTER_SANITIZE_NUMBER_INT);
        $categories=Category::orderBy('name', 'asc')->get();
        

        return view('edit-job', [
            'job' => $job,
            'minSalary' => $minSalary,
            'maxSalary' => $maxSalary,
            'categories'=>$categories,
            
        ]);
    }
    public function ApplicationsPage(Job $job)
    {
        $applications=$job->applications;
        return view('applications', ['applications'=>$applications,'job'=>$job]);

    }
    public function CompaniesPage()
    {
        $companies=Company::orderBy('name', 'asc')->get();
        return view('companies', ['companies'=>$companies]);

    }
    public function PrivacyPage()
    {
        return view('privacy-policy');

    }
    public function TermsPage()
    {
        return view('terms');

    }
    public function FaqPage()
    {
        return view('faq');

    }
}