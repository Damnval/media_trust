<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param int  $id
     * @return view
     */
    public function show($id)
    {
        $user = User::find($id);

         return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return view
     */
    public function edit($id)
    {
        if($id != Auth::id()){ // this can be improved by using middleware and creating user service
            throw new \Exception('Unauthorized request ka choi. ;)');
            return redirect('home');
        }

        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Colletion  $user. Instance of user
     * @return view home
     */
    public function update(User $user)  // Can be improved by using form Request validation
    { 
        DB::beginTransaction();
        try {

            if($user->id != Auth::id()){ // this can be improved by using middleware and creating user service
                throw new \Exception('Unauthorized request.');
            }

            // Can be improved by using service for users (logic and conditions)
            $user->name = request('name');
            $user->email = request('email');
            
            $user->save();
        } catch (\Exception $e) {
            DB::rollBack(); // revert back mysql transactions (save, edit, delete)
        }
        
        DB::commit(); // perform mysql transactions (save, edit, delete)
        
        return redirect('/home');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {

            if($user->id != Auth::id()){ // this can be improved by using middleware and creating user service
                throw new \Exception('Unauthorized request.');
            }

            $user = User::destroy($id);

        } catch (\Exception $e) {
            DB::rollBack(); // revert back mysql transactions (save, edit, delete)
        }
        
        DB::commit(); // perform mysql transactions (save, edit, delete)
        return redirect('home');
    }

}
