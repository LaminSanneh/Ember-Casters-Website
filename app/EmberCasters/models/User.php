<?php
namespace EmberCasters\Models;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use EmberCasters\Models\Role as Role;

class User extends \Eloquent implements UserInterface, RemindableInterface {

    /**
     * Only field allowed to be filled
     */
    protected $fillable = ['first_name','last_name','email', 'email_confirmed','receive_updates'];

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

    /**
     * Get the roles a user has
     */
    public function roles(){
        return $this->belongsToMany('EmberCasters\Models\Role');
    }

    /**
     * Check if a user has a certain role
     */
    public function hasRole($givenRole){
        foreach($this->roles as $role){
//            dd($this->roles->toArray());
            if($givenRole->name == $role->name){
                return true;
            }
        }
        return false;
//        return in_array($role, array_filter($this->roles->toArray(), 'name'));
    }

    /**
     * Add a user to the specified role
     */

    public function addRole($roleId){
        $this->roles()->attach($roleId);
        return $this;
    }

    /**
     * Remove specified user from specified role
     */

    public function removeRole($roleId){
        $this->roles()->detach($roleId);
        return $this;
    }

    /**
     * returns true if user is a super user
     */

    public function isSuperUser(){
        $superUserId = Role::where('name','LIKE', "%super%")->first();
        return $this->hasRole($superUserId);
    }

}