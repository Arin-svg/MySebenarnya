<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PublicUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PublicUserController extends Controller
{
    // Show registration form
    public function showForm()
    {
        return view('Registration.PublicUserRegistration'); // make sure your blade file is in resources/views/Registration/
    }

    // Handle registration form submission
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'PU_Name' => 'required|string|max:255',
            'PU_IC' => 'required|numeric|unique:publicuser,PU_IC',
            'PU_Age' => 'required|numeric|min:1|max:120',
            'PU_Address' => 'required|string',
            'PU_Email' => 'required|email|unique:publicuser,PU_Email',
            'PU_PhoneNum' => 'required|numeric',
            'PU_Gender' => 'required|string',
            'PU_Password' => 'required|string|min:8|max:255',
            'PU_ProfilePicture' => 'nullable|image|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $profilePicturePath = null;
        if ($request->hasFile('PU_ProfilePicture')) {
            $profilePicturePath = $request->file('PU_ProfilePicture')->store('profile_pictures', 'public');
        }

        PublicUser::create([
            'PU_ID' => 'PU' . strtoupper(Str::random(5)),
            'PU_Name' => $request->PU_Name,
            'PU_IC' => $request->PU_IC,
            'PU_Age' => $request->PU_Age,
            'PU_Address' => $request->PU_Address,
            'PU_Email' => $request->PU_Email,
            'PU_PhoneNum' => $request->PU_PhoneNum,
            'PU_Gender' => $request->PU_Gender,
            'PU_Password' => $request->PU_Password,
            'PU_ProfilePicture' => $profilePicturePath
        ]);

        return redirect()->route('publicuser.login')->with('success', 'Registration successful! Please login.');
    }
}
