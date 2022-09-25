<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserProfileRequest;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userprofiles = UserProfile::latest()->paginate(5);

        return view('usersprofiles.index',compact('userprofiles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function create()
    {
        return view('userprofiles.create');
    }


    public function store(StoreUserProfileRequest $request)
    {
        $input=$request->all();
        if($request->hasFile('profile_image')){
            $filename = $request->profile_image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');        }
            $input['profile_image']=$filename;
        UserProfile::create($input);
        return redirect()->route('userprofiles.index');
    }


    public function show(UserProfile $userprofile)
    {
    }


    public function edit(UserProfile $userprofile)
    {
    }


    public function update(StoreUserProfileRequest $request, UserProfile $userprofile)
    {

    }


    public function destroy(userprofile $userprofile)
    {

    }
}
