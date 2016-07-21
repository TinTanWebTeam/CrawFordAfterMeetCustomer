<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','firstName','lastName','salutation','middleInitial','designations','sex',
        'birthDate','company','title','phone','address','bonusDate','userID_created','networkID_created',
        'userID_changed','networkID_changed','locked','lockedDetail','inactive',
        'inactiveDetail','defaultProfile','active','positionId','roleId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role(){
        return $this->belongsTo('App\Role','roleId','id')->first();
    }
}
