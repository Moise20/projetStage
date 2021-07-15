<?php

namespace App\Http\Controllers;

use App\Mail\EnvoiLienClient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PasswordClientController extends Controller
{
    public function showForm()
    {
        return view('demander-mailClient');
    }

    public function sendPasswordResetToken(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) return redirect()->back()->withErrors(['error' => '404']);

        //create a new token to be sent to the user. 
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60), //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')
            ->where('email', $request->email)->first();

        $token = $tokenData->token;
        $email = $request->email; // or $email = $tokenData->email;
        Mail::to($email)->send(new EnvoiLienClient($token));
        return redirect()->to('/connexionClient');
        /**
         * Send email to the email above with a link to your password reset
         * something like url('password-reset/' . $token)
         * Sending email varies according to your Laravel version. Very easy to implement
         */
    }

    public function showPasswordResetForm($token)
    {
        $tokenData = DB::table('password_resets')
            ->where('token', $token)->first();

        if (!$tokenData) return redirect()->to('/connexionClient'); //redirect them anywhere you want if the token does not exist.
        return view('passwordsClient',[
            'token'=>$token,
        ]);
    }

    public function resetPassword()
    {
        //some validation
        request()->validate([
            
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
            'token'=>['required'],
        ], [
            'password.min' => 'Pour des raisons de sécurité, votre mot de passe doit faire :min caractères.'
        ]);


        $password = request('password');
        $token=request('token');
        $tokenData = DB::table('password_resets')
            ->where('token', $token)->first();

        $user = User::where('email', $tokenData->email)->first();
        if (!$user) return redirect()->to('/connexionClient'); //or wherever you want

        //$user->password = Hash::make($password);
        $user->password = bcrypt($password);
        $user->update(); //or $user->save();

        //do we log the user directly or let them login and try their password for the first time ? if yes 
        //Auth::login($user);

        // If the user shouldn't reuse the token later, delete the token 
         DB::table('password_resets')->where('email', $user->email)->delete();

        //  redirect where we want according to whether they are logged in or not.
        return redirect()->to('/connexionClient');
    }
}
