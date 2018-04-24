<?php

namespace App\Http\Controllers\web;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Validator;
use Mob\Facades\MobUsers;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->isAdmin()) {
            $users = MobUsers::all();
            return view('users.index', compact('users'));
        }
        else{
            return Redirect::to('logout');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if($user->isAdmin()) {
            $validator = Validator::make($request->all(), User::rules());
            if ($validator->fails()) {
                return Redirect::to('users/create')
                    ->withErrors($validator)
                    ->withInput($request->all());
            }

            $data = [
                'username' => $request['username'],
                'phone' => $request['phone'],
                'email' => $request['email'],
                'password' => bcrypt($request['password'])
            ];

            User::create($data);
            Session::flash('message', 'User successfully added!');
            return Redirect::route('users.index');
        }
        else{
            return Redirect::to('logout');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->edit($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), User::rules($id));
        if ($validator->fails()) {
            return Redirect::route('users.edit', $id)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        $user = Auth::user();

        if($user->isAdmin()) {
            $user = User::findOrFail($id);
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->phone = Input::get('phone');
            if (Input::get('password')) {
                $user->password = bcrypt(Input::get('password'));
            }
            $user->save();
            return Redirect::route('users.index');
        }
        else{
            return Redirect::to('logout');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $haha = Auth::user();
        if($haha->isAdmin()) {
            $user = User::findOrFail($id);
            $user->delete();
            Session::flash('message', 'User successfully deleted!');
            return Redirect::route('users.index');
        }else{
            return Redirect::to('logout');
        }

    }
    public function confirm($id)
    {
        $user = User::findOrFail($id);
        return view('users.confirm', compact('user'));
    }
}
