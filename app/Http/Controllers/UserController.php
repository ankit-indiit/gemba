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


class UserController extends Controller
{
    public function userLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => 'required',
        ]);
 
        if ($validator->fails()) {
            $messags['message'] = $validator->errors()->first();
            $messags['status'] = false;            
            return response()->json($messags, 200);
        }
   
        $credentials = $request->only('email', 'password');
        $checkUser = User::where('email', $request->email)
            ->first();

        if ($checkUser) {
            if (empty($checkUser->email_verified_at) || $checkUser->email_verified_at == '') {
                $message = 'Please Verify Your Mail First!';
                $status = false;
            } else {
                if (Auth::attempt($credentials)) {
                    $message = 'You have Successfully loggedin!';
                    $status = true;                
                } else {
                    $message = 'You have entered invalid credentials!';
                    $status = false;
                } 
            }
        } else {
            $message = 'User not found!';
            $status = false;
        }       

        $messags['message'] = $message;
        $messags['status'] = $status;
        return response()->json($messags, 200);
    }

    public function signUp(Request $request)
    {
        if (!User::where('email', $request->email)->exists()) {
            DB::beginTransaction();
        
                try {

                if ($request->file('image')) {
                    $image = $request->file('image');
                    $imagename = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/user');
                    $image->move($destinationPath, $imagename);
                    $image = $imagename;
                } else {
                    $image = '';
                }            

                $token = Str::random(64);

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'image' => $image,
                    'token' => $token,
                ]);

                if (!empty($request->item[0]['teams_name'])) {

                    foreach ($request->item as $item) {
                        if ($item['teams_logo']) {
                            $teamsLogo = $item['teams_logo'];
                            $teamsLogoName = time() . '.' . $teamsLogo->getClientOriginalExtension();
                            $destinationPath = public_path('/team');
                            $teamsLogo->move($destinationPath, $teamsLogoName);
                            $teamsLogo = $teamsLogoName;
                        } else {
                            $teamsLogo = '';
                        }

                        $userTeam = UserTeam::create([
                            'user_id' => $user->id,
                            'name' => $item['teams_name'],
                            'image' => $teamsLogo,
                            'adverts_count' => $item['advert_members']
                        ]);
                        foreach ($item['teams_email'] as $memberEmail) {

                            $teamMember = User::where('email', $memberEmail)->first();
                            if ($teamMember) {
                                $teamMember = $teamMember;
                            } else {
                                $token = Str::random(64);                    
                                $teamMember = User::create([
                                    'name' => NULL,
                                    'email' => $memberEmail,
                                    'password' => Hash::make(12345),
                                    'team_id' => $userTeam->id,
                                    'token' => $token,
                                ]);

                                $details = [
                                    'title' => 'Verification Mail',
                                    'body' => 'Please verify your mail for login!',
                                    'link' => route('verify.email', $token),
                                ];
                               
                                \Mail::to($teamMember)->send(new EmailVerification($details));
                            }

                            UserTeamMember::create([
                                'user_id' => $user->id,
                                'team_member_id' => $teamMember->id,
                            ]);
                        }
                    }                              
                }

                $details = [
                    'title' => 'Verification Mail',
                    'body' => 'Please verify your mail for login!',
                    'link' => route('verify.email', $token),
                ];
               
                \Mail::to($user)->send(new EmailVerification($details));

                DB::commit();

                $messags['message'] = "You have successfully registered! Please check your mail for verification!";
                $messags['status'] = true;
                return response()->json($messags, 200);

            } catch (\Exception $e) {
                $message['message'] = $e->getMessage();
                DB::rollback();
                $message['status'] = false;
                return response()->json($message, 200);

            }
        } else {
            $messags['message'] = "This email is already exists!";
            $messags['status'] = false;
            return response()->json($messags, 200);
        }    	
    }
    
    public function verifyEmail(Request $request, $token)
    {       
        $user = User::where('token', $token)->update([
            'email_verified_at' => now(),
        ]);

        if ($user) {
            return redirect()->route('login');
        }
    }

    public function uploadProfileImage(Request $request)
    {       
        if ($request->user_profile_image) {
            $userProfile = $request->user_profile_image;
            $userProfileName = time() . '.' . $userProfile->getClientOriginalExtension();
            $destinationPath = public_path('/user');
            $userProfile->move($destinationPath, $userProfileName);
            $userProfile = $userProfileName;
        } else {
            $userProfile = '';
        }
        
        $userImage = explode("user/", Auth::user()->image)[1];
        if(File::exists(public_path('user/'.$userImage))) {
            File::delete(public_path('user/'.$userImage));
        }

        $uploadProfile = User::where('id', Auth::user()->id)->update([
            'image' => $userProfile,
        ]);

        if ($uploadProfile) {
            $messags['message'] = "Profile has been uploded!";
            $messags['profile'] = asset('user').'/'.$userProfile;
            $messags['status'] = true;            
        } else {
            $messags['message'] = "Please try again!";
            $messags['status'] = false; 
        }
        return response()->json($messags, 200);
    }

    public function updateProfile(Request $request)
    {
        $userProfile = User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
        ]);
        if ($userProfile) {
            $messags['message'] = "Profile has beem updated!";
            $messags['name'] = $request->name;
            $messags['status'] = true; 
        } else {
            $messags['message'] = "Please try again!";
            $messags['status'] = false; 
        }
        return response()->json($messags, 200);
    }
}
