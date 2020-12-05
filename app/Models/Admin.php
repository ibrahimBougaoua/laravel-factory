<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = "admins";
    
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
        'gender',
        'phone',
        'city',
        'address',
        'photo',
        'status',
        'trash',
        'manage_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function getMyEmployees()
    {
        return $this->hasMany('App\Models\Admin','manage_id','id');
    }

    public function getPointOfSales()
    {
        return $this->hasMany('App\Models\SalesMan','employee_id','id');
    }

    public function scopeExceptSelf($query)
    {
        return $query->where('manage_id',Auth::id());
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getPhotoAttribute($value)
    {
        if ( ! empty($value) )
            return asset('assets/' . $value);
        return asset('admin/images/profile.jpg');
    }

    public function getStatusAttribute($value)
    {
        if ( $value == 0 )
            return 'Active';
        return 'deactivated';
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order','id','id');
    }

}