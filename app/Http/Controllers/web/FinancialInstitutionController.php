<?php

namespace App\Http\Controllers\web;

use App\FinancialInstitution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class FinancialInstitutionController extends Controller
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
            $data = FinancialInstitution::all();
            return  view('financial_institution.index', compact('data'));
        }else{
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
        return view('financial_institution.create');
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
        if($user->isAdmin()){
            $validator = Validator::make($request->all(), FinancialInstitution::rules());
            if ($validator->fails()) {
                return Redirect::to('financial/create')
                    ->withErrors($validator)
                    ->withInput($request->all());
            }

            FinancialInstitution::create($request->all());
            Session::flash('message', 'Financial institution successfully added!');
            return Redirect::route('financial.index');
        }else{
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
        $data = FinancialInstitution::findOrFail($id);
        return view('financial_institution.edit', compact('data'));
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
        $validator = Validator::make($request->all(), FinancialInstitution::rules($id));
        if ($validator->fails()) {
            return Redirect::route('financial.edit', $id)
                ->withErrors($validator)
                ->withInput($request->all());
        }
        $user = Auth::user();

        if($user->isAdmin()) {
            $financial = FinancialInstitution::findOrFail($id);
            $data = $request->all();
            $financial->update($data);
            Session::flash('message', 'Financial institution updated successfully');
            return Redirect::route('financial.index');
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
            $financial = FinancialInstitution::findOrFail($id);
            $financial->delete();
            Session::flash('message', 'Financial institution successfully deleted!');
            return Redirect::route('financial_institution.index');
        }else{
            return Redirect::to('logout');
        }

    }
    public function confirm($id)
    {
        $financial = FinancialInstitution::findOrFail($id);
        return view('financial.confirm', compact('financial'));
    }
}
