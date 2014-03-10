<?php
namespace EmberCasters\Modules\Admin\Controllers;
use \View as View;
use \Redirect as Redirect;
use \EmberCasters\Models\Lesson as Lesson;
use \EmberCasters\Models\User as User;
use \EmberCasters\Models\Role as Role;
use \Input as Input;
class UsersController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $users = User::with('roles')->get();
//        dd($users);
		return View::make('admin.users.index')->with(compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$user = new User;
        return View::make('admin.users.create')->with(compact('user'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::all();
        $user = new User($data);
        if($user->save()){
            return Redirect::route('admin.users.show',array($user->id));
        }

        return View::make('admin.users.create')->with(compact('user'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::with('roles')->find($id);
        $roles = $user->roles;
        $other_roles = Role::all()->diff($roles);
        return View::make('admin.users.show')->with(compact('user','roles','other_roles'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = User::find($id);
        return View::make('admin.users.edit')->with(compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);
        $data = Input::all();

        if($user->update($data)){
            return Redirect::route('admin.users.show',array($user->id));
        }

        return View::make('admin.users.edit')->with(compact('user'));

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(User::destroy($id)){
            return redirect::route('admin.users.index')->with('message', 'User deleted successfully');
        }

        return redirect::route('admin.users.index')->with('message', 'User couln\'t be deleted');
	}

    /**
     * Add specified user to specified role
     */
    public function addToRole($id, $role_id){
        $user = User::find($id);
        $user->addRole($role_id);

        return Redirect::route('admin.users.show', array($id));
    }

    /**
     * Remove specified user from specified role
     */
    public function removeFromRole($id, $role_id){
        $user = User::find($id);
        $user->removeRole($role_id);

        return Redirect::route('admin.users.show', array($id));
    }
}