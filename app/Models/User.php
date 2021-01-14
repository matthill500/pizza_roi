<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
      return $this->belongsToMany('App\Models\Role', 'user_role');
    }

    public function shop(){
      return $this->belongsTo('App\Models\Shop', 'user_shop');
    }
    public function customer(){
      return $this->belongsTo('App\Models\Customer');
    }

    public function authorizeRoles($roles){
      if(is_array($roles)){
        return $this->hasAnyRole($roles) || abort(401, 'This action is unauthorized');
      }
      return $this->hasRole($roles) || abort(401, 'This action is unauthorized');
    }

    public function hasRole($role){
      return null !== $this->roles()->where('name', $role)->first();
    }

    public function hasAnyRole($roles){
      return null !== $this->roles()->whereIn('name', $roles)->first();
    }



}
