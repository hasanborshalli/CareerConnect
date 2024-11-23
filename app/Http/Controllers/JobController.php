<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function AddJob(Request $request)
    {
        $fields=$request->validate([
        'title'=>['required','string','max:255'],
        'description'=>['required','string','max:130'],
        'location'=>['required', 'string','max:255'],
        'minSalary'=>['required','numeric','min:1'],
        'maxSalary'=>['required','numeric','min:1', 'gte:minSalary'],
        'category_id'=>['required','integer','exists:categories,id'],
        'responsibility'=>['required','min:1'],
        'requirement'=>['required','min:1'],
        ]);
        $fields['company_id']=Auth::user()->company->id;
        $fields['salary']=$fields['minSalary'].'$ - '.$fields['maxSalary'].'$';
        unset($fields['minSalary'], $fields['maxSalary']);
        Job::create($fields);
        return redirect('/home');
    }
    
    public function EditJob(Request $request, Job $job)
    {
        $fields=$request->validate([
            'title'=>['required','string','max:255'],
            'description'=>['required','string','max:130'],
            'location'=>['required', 'string','max:255'],
            'minSalary'=>['required','numeric','min:1'],
            'maxSalary'=>['required','numeric','min:1', 'gte:minSalary'],
            'category_id'=>['required','integer','exists:categories,id'],
            'responsibility'=>['required','min:1'],
            'requirement'=>['required','min:1'],
            ]);
        $fields['salary']=$fields['minSalary'].'$ - '.$fields['maxSalary'].'$';
        unset($fields['minSalary'], $fields['maxSalary']);
        $job->update($fields);
        return redirect('/jobs/'.$job->id);
    }
    public function ApplyJob(Job $job)
    {
        if($job->is_applied_by_user()) {
            $job->applications()->where('user_id', Auth::user()->id)->delete();
            return response()->json(['applied'=>"removed"]);
        }
        $job->applications()->create(['user_id'=>Auth::user()->id]);
        return response()->json(['applied'=>"added"]);
    }
    public function deleteJob(Job $job)
    {
        $job->delete();
        return redirect('/company/'.$job->company->user_id);
        
    }
    public function JobSearch(Request $request)
    {
        $fields=$request->validate([
            'search'=>['required','max:255']
        ]);
        $jobs=Job::search($fields['search'])->get();
        
        $categories=Category::orderBy('name', 'asc')->get();
        return view('jobs', ['categories'=>$categories,'jobs'=>$jobs]);

    }
    public function JobFilter(Request $request)
    {
        $fields = $request->validate([
            'category_id' =>['required','integer','min:1']
        ]);
        $jobs=Job::where('category_id', $fields['category_id'])->get();
        $categories=Category::orderBy('name', 'asc')->get();
        return view('jobs', ['categories'=>$categories,'jobs'=>$jobs]);
    }
}