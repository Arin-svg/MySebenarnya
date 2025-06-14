// app/Http/Controllers/PublicUserController.php

namespace App\Http\Controllers;

use App\Models\PublicUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PublicUserController extends Controller
{
    public function showForm()
    {
        return view('Registration.PublicUserRegistration');
    }

    public function register(Request $request)
    {
        $request->validate([
            'PU_Name' => 'required|string|max:255',
            'PU_Email' => 'required|email|unique:publicusers,PU_Email',
            'PU_Password' => 'required|string|min:8|confirmed',
        ]);

        $user = PublicUser::create([
            'PU_ID' => 'PU' . strtoupper(Str::random(5)),
            'PU_Name' => $request->PU_Name,
            'PU_Email' => $request->PU_Email,
            'PU_Password' => Hash::make($request->PU_Password),
        ]);

        Auth::guard('publicuser')->login($user);
        $user->sendEmailVerificationNotification();

        return redirect('/email/verify');
    }
}
