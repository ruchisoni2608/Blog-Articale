<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
//use Mail;
//use Hash;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;



class ForgotPasswordController extends Controller
{
      public function showForgetPasswordForm()
      {
         return view('Auth.forgetPassword');
      }
      
  
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email',
          ]);

        
          $token = Str::random(64);
        

          DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now(),
              
          ]);

          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request) {
              $message->to($request->email);
              $message->subject('Reset Password');
          });

          return back()->with('message', 'We have e-mailed your password reset link!');
      }

      public function showResetPasswordForm($token)
      {
            $updatePassword = DB::table('password_resets')
              ->where('token', $token)
              ->first();

          $isLinkExpired = (!$updatePassword || Carbon::parse($updatePassword->created_at)->addMinutes(60)->isPast());

          return view('Auth.forgetPasswordLink', ['token' => $token, 'isLinkExpired' => $isLinkExpired]);
       }

      public function submitResetPasswordForm(Request $request)
      {
        
          $request->validate([
              'email' => 'required|email',
              'password' => 'required|string|min:8|confirmed',
              'password_confirmation' => 'required'
          ]);

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email,
                                'token' => $request->token,                                
                              ])
                              ->first();  
                          
         
          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect()->route('login')->with('message', 'Your password has been changed!');
      }
      
      //   public function submitForgetPasswordForm(Request $request)
    //   {
        
    //       $request->validate([
    //           'email' => 'required|email',
    //       ]);

    //       //$token = Str::random(64);
    //    $token = sha1(uniqid(time(), true));

    //       DB::table('password_resets')->insert([
    //           'email' => $request->email,
    //           'token' => $token,
    //             'used' => 0,
    //           'created_at' => Carbon::now()
    //         ]);
   
    //       Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){             
    //           $message->to($request->email);             
    //           $message->subject('Reset Password');               
    //       });
         
    //       return back()->with('message', 'We have e-mailed your password reset link!');
         
    //   }
// public function submitResetPasswordForm(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:8',
//         'password_confirmation' => 'required'
//     ]);

//     $token = sha1(uniqid(time(), true)); // Generate a new token
//     $expires_at = now()->addMinutes(1); // Expiration time is 1 minute from now

//     // Insert the reset record with expiration timestamp
//     DB::table('password_resets')->insert([
//         'email' => $request->email,
//         'token' => $token,
//         'used' => 0, // Token is not used yet
//         'created_at' => now(), // Current timestamp
//     ]);

//     // Check if the token exists, is not used, and has not expired
//     $updatePassword = DB::table('password_resets')
//         ->where([
//             'email' => $request->email,
//             'token' => $token,
//             'used' => 0,
//             'created_at' => ['>=', $expires_at->subMinutes(1)], // Token has not expired within the last minute
//         ])
//         ->first();

//     // if (!$updatePassword) {
//     //     return back()->withInput()->with('error', 'Invalid token, token has already been used, or token has expired.');
//     // }

//     // Update the user's password
//     $user = User::where('email', $request->email)
//                 ->update(['password' => Hash::make($request->password)]);

//     // Mark the token as used
//     DB::table('password_resets')
//         ->where('email', $request->email)
//         ->update(['used' => 1]);

//     // Delete the reset record
//     DB::table('password_resets')->where(['email'=> $request->email])->delete();

//     return redirect()->route('login')->with('message', 'Your password has been changed!');
// }
// public function submitResetPasswordForm(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|min:8',
//         'password_confirmation' => 'required'
//     ]);

//      $token = sha1(uniqid(time(), true)); // Generate a new token

   

//     // Check if the token exists, is not used, and has not expired
//     $updatePassword = DB::table('password_resets')
//         ->where([
//             'email' => $request->email,
//             'token' => $token,
//             'used' => 0,
//         ])
      
//         ->first();
 
//  if (!$updatePassword || Carbon::now()->diffInMinutes($updatePassword->created_at) > 1) {
//         return redirect()->route('reset.password.get', ['token' => $request->token])
//                          ->with('error', 'Invalid token or token has expired.');
//     }
//         $user = User::where('email', $request->email)
//             ->update(['password' => Hash::make($request->password)]);

//         DB::table('password_resets')
//             ->where('email', $request->email)
//             ->update(['used' => 1]);

//     return redirect()->route('login')->with('message', 'Your password has been changed!');
// }

}