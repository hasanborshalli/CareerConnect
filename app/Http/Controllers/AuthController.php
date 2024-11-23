<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Seeker;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function signup2(Request $request)
    {
        if(session('signup_role')=='seeker') {
            $fields=$request->validate([
                'fname'=>['required','max:255'],
                'lname'=>['required','max:255'],
                'username'=>['required','max:20','min:4',Rule::unique('users', 'username')],
                'password'=>['required','min:8','max:255','confirmed'],
                'email'=>['required','email','max:255',Rule::unique('users', 'email')],
                'phone'=>['required','min:8', 'max:8'],
                'address'=>['required','max:255'],
                'avatar'=>['required','image','mimetypes:image/jpeg,image/png,image/gif,image/webp','max:2048','dimensions:max_width=750,max_height=750'],
                'description'=>['required','max:1000'],
                'linkedin'=>['required','url',Rule::unique('users', 'linkedin')],
                'facebook'=>['required','url',Rule::unique('users', 'facebook')],
                'instagram'=>['required','url',Rule::unique('users', 'instagram')],
                
            ]);
            $fields['role']='seeker';
            $fields['password']=bcrypt($fields['password']);
            $file=$request->file('avatar');
            $customName='-'.Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('seekers_avatars/'.$customName);
            $fields['avatar']=$customName;
            session(['signup_info'=>$fields]);
            return redirect('/signup/step3/seeker');
            
        } elseif(session('signup_role')=='company') {
            $fields=$request->validate([
                'name'=>['required','max:255'],
                'username'=>['required','max:20','min:4',Rule::unique('users', 'username')],
                'password'=>['required','min:8','max:255','confirmed'],
                'slogan'=>['required','max:50'],
                'avatar'=>['required','image','mimetypes:image/jpeg,image/png,image/gif,image/webp','max:2048','dimensions:max_width=750,max_height=750'],
                'description'=>['required','max:1000'],
                'special'=>['required','min:1']
            ]);
            $fields['role']='company';
            $fields['password']=bcrypt($fields['password']);
            $file=$request->file('avatar');
            $customName='-'.Str::uuid().'.'.$file->getClientOriginalExtension();
            $file->storeAs('companies_avatars', $customName);
            $fields['avatar']=$customName;
            session(['signup_info'=>$fields]);
            return redirect('/signup/step3/company');
        }
    }
    public function signup3(Request $request)
    {
        if(session('signup_info')) {
            if(session('signup_role')=='seeker') {
                $fields=$request->validate([
                    'jobType'=>['required'],
                    'jobLocation'=>['required'],
                    'skills'=>['required','min:1'],
                    'goals'=>['required','max:255'],
                    'resume'=>['required','file','mimes:pdf','max:3072'],
                    'workTitle'=>['required','max:50']
                ]);
                $file=$request->file('resume');
                $customName='-'.Str::uuid().'.'.$file->getClientOriginalExtension();
                $file->storeAs('seekers_resumes', $customName);
                $fields['resume']=$customName;
                $fields = array_merge($fields, session('signup_info'));

                $user=User::create([
                    'username'=>$fields['username'],
                     'password'=>$fields['password'],
                     'email'=>$fields['email'],
                     'role'=>$fields['role'],
                     'facebook'=>$fields['facebook'],
                     'linkedin'=>$fields['linkedin'],
                     'instagram'=>$fields['instagram']
                    ]);
                Auth::login($user);

                Seeker::create([
                    'user_id'=>$user['id'],
                    'fname'=>$fields['fname'],
                    'lname'=>$fields['lname'],
                    'phone'=>$fields['phone'],
                    'address'=>$fields['address'],
                    'description'=>$fields['description'],
                    'avatar'=>$fields['avatar'],
                    'jobType'=>$fields['jobType'],
                    'jobLocation'=>$fields['jobLocation'],
                    'skills'=>$fields['skills'],
                    'goals'=>$fields['goals'],
                    'workTitle'=>$fields['workTitle'],
                    'resume'=>$fields['resume'],
                ]);
                session()->forget('signup_info');
                session()->forget('signup_role');
                return redirect('/home');
            } elseif(session('signup_role')=='company') {
                $fields=$request->validate([
                    'email'=>['required','email',Rule::unique('users', 'email')],
                    'phone'=>['required'],
                    'address'=>['required','max:255'],
                    'linkedin'=>['required','url'],
                    'facebook'=>['required','url'],
                    'instagram'=>['required','url'],

                ]);
                $fields = array_merge($fields, session('signup_info'));

                $user=User::create([
                    'username'=>$fields['username'],
                     'password'=>$fields['password'],
                     'email'=>$fields['email'],
                     'role'=>$fields['role'],
                     'facebook'=>$fields['facebook'],
                     'linkedin'=>$fields['linkedin'],
                     'instagram'=>$fields['instagram']
                    ]);
                Auth::login($user);

                Company::create([
                    'user_id'=>$user['id'],
                    'name'=>$fields['name'],
                    'avatar'=>$fields['avatar'],
                    'slogan'=>$fields['slogan'],
                    'phone'=>$fields['phone'],
                    'address'=>$fields['address'],
                    'description'=>$fields['description'],
                    'special'=>$fields['special'],
                ]);
                session()->forget('signup_info');
                session()->forget('signup_role');
                return redirect('/home');
            }
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function Login(Request $request)
    {
        $fields=$request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username'=>$fields['username'],'password'=>$fields['password']])) {
            return redirect('/home');

        } else {
            return redirect('/login')->with("error", "Wrong Credentials");
        }
    }

}