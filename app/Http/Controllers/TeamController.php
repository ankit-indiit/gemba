<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserTeam;
use App\Models\UserTeamMember;
use DB;
use File;
use Auth;
use Session;

class TeamController extends Controller
{    
    public function index(Request $request)
    {       
        // $gembas = GembaUserMeta::filter($request->all())
        //     ->where('user_id', Auth::user()->id)
        //     ->paginate(10);
        // return view('page.gemba.my-gemba', compact('gembas'));
    }

    public function show()
    {

    }

    public function create(Request $request)
    {
        
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        
        try {
        
            foreach ($request->item as $item) {
                if ($item['teams_logo']) {
                    $teamsLogo = $item['teams_logo'];
                    $imagename = time() . '.' . $teamsLogo->getClientOriginalExtension();
                    $destinationPath = public_path('/team');
                    $teamsLogo->move($destinationPath, $imagename);
                    $teamsLogo = $imagename;
                } else {
                    $teamsLogo = '';
                }            

                $userTeam = UserTeam::create([
                    'user_id' => Auth::user()->id,
                    'name' => $item['teams_name'],
                    'image' => $teamsLogo,
                    'adverts_count' => $item['advert_members'],
                ]);

                foreach ($item['teams_email'] as $teamEmail) {
                    $existUserId = User::where('email', $teamEmail)->pluck('id')->first();
                    if (isset($existUserId)) {
                        $teamMember = [
                            'user_id' => Auth::user()->id,
                            'team_member_id' => $existUserId,
                            'team_id' => $userTeam->id,
                        ];
                    } else {
                        $name = explode("@", $teamEmail);
                        $token = Str::random(64);
                        $createTeamMember = User::create([
                            'name' => $name[0],
                            'email' => $teamEmail,
                            'password' => Hash::make(12345),
                            'token' => $token,
                        ]);
                        $teamMember = [
                            'user_id' => Auth::user()->id,
                            'team_member_id' => $createTeamMember->id,
                            'team_id' => $userTeam->id,
                        ];    
                    }

                    UserTeamMember::create($teamMember);
                }
            }

            DB::commit();

            $messags['message'] = "Team successfully created !";
            $messags['status'] = true;
            return response()->json($messags, 200);
        
        } catch (\Exception $e) {
            $message['message'] = $e->getMessage();
            DB::rollback();
            $message['status'] = false;
            return response()->json($message, 200);

        }        
    }

    public function edit(Request $request, $id)
    {
        $userTeam = UserTeam::where('id', $request->teamId)->first();
        $teamMember = '';
        foreach ($userTeam->team_members as $member) {
            $teamMember .= '<div class="form-group">
                <div class="row memberEmail">
                    <div class="col-md-10">
                       <label class="frm_label team-form-label">Email address</label>
                       <div class="input-group">
                          <input class="form-control teams_email valid" name="team_member_email[]" placeholder="" value="'.$member->email.'" aria-invalid="false">
                       </div>
                    </div>
                    <div class="col-md-2 mt-4 pt-2">
                       <a href="javascript:void(0)" class="email-repeat-btn removeEmailField">
                       <i class="fa fa-minus" aria-hidden="true"></i>
                       </a>
                    </div>
                </div>
            </div>';           
        }                

        $form = '<div class="cloneTeamFormSection">
               <div class="form-group ">
                   <label class="team-form-label">Team Name</label>
                   <input type="text" class="form-control teams_name valid" name="teams_name" value="'.$userTeam->name.'">
               </div>
               <div class="form-group ">
                   <div class="row">
                        <div class="col-md-6">
                            <label class="team-form-label">Team Logo</label>
                            <input type="file" class="form-control teams_logo valid" name="teams_logo">
                        </div>
                        <div class="col-md-6 mt-4">
                            <img src="'.$userTeam->image.'" style="width: 50px;" />
                        </div>
                    </div>
               </div><br>
               <div class="form-group">
                    <div class="row">
                        <div class="col-md-10">
                        <label class="team-form-label">How many people you want to give access? ( up to 5, for free, with adverts )</label>
                        <input type="text" class="form-control advert_members membersCount0 error" id="advertTeamMember" name="new_adverts_count" data-inc="0" aria-invalid="true" value="'.$userTeam->adverts_count.'"> 
                        </div>
                        <div class="col-md-2 mt-4 pt-4">
                           <a href="javascript:void(0)" class="email-repeat-btn appendMemberEmail">
                           <i class="fa fa-plus" aria-hidden="true"></i>
                           </a>
                        </div>
                    </div>
                    <div class="addMoreMember"></div>
                </div>
               <div class="form-group">  
                    '.$teamMember.'
                </div>
                <input type="hidden" name="team_id" id="userTeamId" value="'.$userTeam->id.'">                
                <input type="hidden" name="old_team_logo" value="'.$userTeam->image.'">                
           </div>';

        $messags['message'] = "Team members!";
        $messags['form'] = $form; 
        $messags['status'] = true; 
        return response()->json($messags, 200);
    }

    public function updateTeam(Request $request)
    {       
        DB::beginTransaction();
        
        try {

            if ($request->hasFile('teams_logo')) {
                $teamsLogo = $request->teams_logo;
                $imagename = time() . '.' . $teamsLogo->getClientOriginalExtension();
                $destinationPath = public_path('/team');
                $teamsLogo->move($destinationPath, $imagename);
                $teamsLogo = $imagename;
                $userTeam = [
                    'name' => $request->teams_name,
                    'image' => $teamsLogo,
                    'adverts_count' => count($request->team_member_email),
                ];

                @$teamImage = explode("team/", $request->old_team_logo)[1];
                if(File::exists(public_path('team/'.@$teamImage))) {
                    File::delete(public_path('team/'.@$teamImage));
                }  
            } else {
                $userTeam = [
                    'name' => $request->teams_name,
                    'adverts_count' => count($request->team_member_email),
                ];
            }
            UserTeam::where('id', $request->team_id)->update($userTeam);
            UserTeamMember::where('team_id', $request->team_id)
                ->delete();

            foreach ($request->team_member_email as $email) {
                $existUserId = User::where('email', $email)->pluck('id')->first();
                if (isset($existUserId)) {
                    $teamMember = [
                        'user_id' => Auth::user()->id,
                        'team_member_id' => $existUserId,
                        'team_id' => $request->team_id,
                    ];
                } else {
                    $name = explode("@", $email);
                    $token = Str::random(64);
                    $createTeamMember = User::create([
                        'name' => $name[0],
                        'email' => $email,
                        'password' => Hash::make(12345),
                        'token' => $token,
                    ]);
                    $teamMember = [
                        'user_id' => Auth::user()->id,
                        'team_member_id' => $createTeamMember->id,
                        'team_id' => $request->team_id,
                    ];    
                }

                UserTeamMember::create($teamMember);         
            }
        
        DB::commit();

            $messags['message'] = "Team has been updated!";
            $messags['status'] = true;
            return response()->json($messags, 200);
        
        } catch (\Exception $e) {
            $message['message'] = $e->getMessage();
            DB::rollback();
            $message['status'] = false;
            return response()->json($message, 200);

        }  

    }

    public function destroy(Request $request, $id)
    {
        $deleteUserTeam = UserTeam::where('id', $id)->delete();
        UserTeamMember::where('team_id', $id)->delete();
        if ($deleteUserTeam == true) {
            $messags['message'] = "Team has beem deleted!";
            $messags['status'] = true; 
        } else {
            $messags['message'] = "Please try again!";
            $messags['status'] = false; 
        }
        return response()->json($messags, 200);
    }
}
