<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function EditProfile1(User $user, Request $request)
    {
        $fields=$request->validate([
            'fname'=>['required','max:255'],
            'lname'=>['required','max:255'],
            'address'=>['required','max:255'],
            'avatar'=>['image','mimetypes:image/jpeg,image/png,image/gif,image/webp','max:2048','dimensions:max_width=750,max_height=750'],
            'workTitle'=>['required','max:50']
        ]);
        if($request['avatar']) {
            $file=$request->file('avatar');
            $customName=Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('seekers_avatars', $customName);
            $fields['avatar']=$customName;
        }
        
        
        $user->seeker->update($fields);
        return redirect('/user/'.$user->id);
        
    }
    public function EditProfile2(User $user, Request $request)
    {
        $fields=$request->validate([
            'phone'=>['required','min:8', 'max:8'],
            'resume'=>['required','file','mimes:pdf','max:3072'],
        ]);
        if($request['email']!=$user->email) {
            $fields['email']=$request->validate([
                'email'=>['required','email','max:255',Rule::unique('users', 'email')],
            ])['email'];
        }
        if($request['linkedin']!=$user->linkedin) {
            $fields['linkedin']=$request->validate([
                'linkedin'=>['required','linkedin','max:255',Rule::unique('users', 'linkedin')],
            ])['linkedin'];
        }
        if($fields['resume']!=$user->seeker->resume) {
            $file=$request->file('resume');
            $customName=Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('seekers_resumes', $customName);
            $fields['resume']=$customName;
        }
        $user->seeker->resume=$fields['resume'];
        $user->seeker->phone=$fields['phone'];
        unset($fields['resume'],$fields['phone']);
        $user->seeker->save();
        $user->update($fields);
        return redirect('/user/'.$user->id);
    }
    public function EditProfile3(User $user, Request $request)
    {
        $fields=$request->validate([
            'description'=>['required','max:1000'],
        ]);
        $user->seeker->update($fields);
        return redirect('/user/'.$user->id);
    }
    public function EditProfile4(User $user, Request $request)
    {
        $fields=$request->validate([
            'jobLocation'=>['required'],
            'skills'=>['required','min:1'],
            'goals'=>['required','max:255'],
        ]);
        $user->seeker->update($fields);
        return redirect('/user/'.$user->id);
        
    }
    public function EditCompany1(User $user, Request $request)
    {
        $fields=$request->validate([
            'name'=>['required','max:255'],
            'slogan'=>['required','max:50'],
            'avatar'=>['image','mimetypes:image/jpeg,image/png,image/gif,image/webp','max:2048','dimensions:max_width=750,max_height=750'],
        ]);
        if($request['avatar']) {
            $file=$request->file('avatar');
            $customName=Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('companies_avatars', $customName);
            $fields['avatar']=$customName;
        }
        
        $user->company->update($fields);
        return redirect('/company/'.$user->id);
        
    }
    public function EditCompany2(User $user, Request $request)
    {
        $fields=$request->validate([
            'description'=>['required','max:1000'],
           ]);
        $user->company->update($fields);
        return redirect('/company/'.$user->id);
        
    }
    public function EditCompany3(User $user, Request $request)
    {
        $fields=$request->validate([
            'special'=>['required','min:1'],
           ]);
        $user->company->update($fields);
        return redirect('/company/'.$user->id);
        
    }
    public function EditCompany4(User $user, Request $request)
    {
        $fields=$request->validate([
            'phone'=>['required'],
            'address'=>['required','max:255'],
            
           ]);
        if($request['email']!=$user->email) {
            $fields['email']=$request->validate([
                'email'=>['required','email','max:255',Rule::unique('users', 'email')],
            ])['email'];
        }
        if($request['linkedin']!=$user->linkedin) {
            $fields['linkedin']=$request->validate([
                'linkedin'=>['required','url',Rule::unique('users', 'linkedin')],
            ])['linkedin'];
        }
        if($request['facebook']!=$user->facebook) {
            $fields['facebook']=$request->validate([
                'facebook'=>['required','url',Rule::unique('users', 'facebook')],
            ])['facebook'];
        }
        if($request['instagram']!=$user->instagram) {
            $fields['instagram']=$request->validate([
                'instagram'=>['required','url',Rule::unique('users', 'instagram')],
            ])['instagram'];
        }
        $user->company->phone=$fields['phone'];
        $user->company->address=$fields['address'];
        $user->company->save();
        unset($fields['phone'],$fields['address']);
        $user->update($fields);
        return redirect('/company/'.$user->id);
        
    }
}