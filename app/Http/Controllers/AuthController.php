<?php

namespace App\Http\Controllers;


use App\Role;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    //protected $redirectTo = '/home';
    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function GoogleHandleProviderCallback()
    {
//        $user = Socialite::driver('google')->user();
//      return JsonResponse::create($user);

        try {
            $user = Socialite::driver('google')->user();
            $create['name'] = $user->name;
            $create['email'] = $user->email;

            $exist = User::where('email',$user->email)->first();

            if(empty($exist)) {
                $createdUser = User::create($create);
//
//
//
//                $role = Role::where('slug', 'normal')->first();
//                $account = User::with('roles')->findOrFail($createdUser->id);
//                $account->detachAllRoles();
//                $account->attachRole($role);


                //Auth::login($createdUser, true);

                return response()->json($user);
            }else{
                //Auth::login($exist, true);
                return response()->json($user);
                return Redirect::to('home');
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'error']);
            return redirect('login');
        }

    }
}
