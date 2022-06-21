<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Mail\EmailVerification;
use App\Models\User;
use App\Models\UserTeam;
use App\Models\UserTeamMember;
use File;
use DB;


class UserProfileController extends Controller
{
    public function accountInfo()
    {
        $teams = UserTeam::where('user_id', Auth::user()->id)->get();
        return view('page.account-info.account-info', compact('teams'));
    }

    public function updateProfile(Request $request)
    {
        switch($request->type) {      
        case 'name':
            $userFormField = [
                    'name' => $request->name,                   
                    'description' => $request->description,                   
                ];
            $data = $request->name;                         
        break;      
        case 'password':
            $userFormField = [                
                'password' => Hash::make($request->confirm_password),                    
            ];

            $data = '';
        break;
        case 'profile_image':            
            if ($request->user_profile_image) {
                $userProfile = $request->user_profile_image;
                $userProfileName = time() . '.' . $userProfile->getClientOriginalExtension();
                $destinationPath = public_path('/user');
                $userProfile->move($destinationPath, $userProfileName);
                $userProfile = $userProfileName;
            } else {
                $userProfile = '';
            }
            
            @$userImage = explode("user/", Auth::user()->image)[1];
            if(File::exists(public_path('user/'.@$userImage))) {
                File::delete(public_path('user/'.@$userImage));
            }            

            $userFormField = [
                'image' => $userProfile,                                               
            ];
            $data = asset('user').'/'.$userProfile;            
        break;
        default:      
            return 'default case'; 
        }       

        $userUpdatedProfile = User::where('id', Auth::user()->id)->update($userFormField);
        if ($userUpdatedProfile) {
            $messags['message'] = "Profile has beem updated!";
            $messags['data'] = $data;
            $messags['status'] = true; 
        } else {
            $messags['message'] = "Please try again!";
            $messags['status'] = false; 
        }
        return response()->json($messags, 200);
    }
}
