<?php
namespace EmberCasters\Models;
use EmberCasters\Models\User as User;
class Role extends \Eloquent {
    protected $fillable = ['name'];

    /**
     * Get the users with a certain role
     */
    public function users(){
        return $this->belongsToMany('EmberCasters\Models\User');
    }
}