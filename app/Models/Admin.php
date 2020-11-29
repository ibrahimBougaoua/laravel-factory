<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public function scopeExceptSelf($query)
    {
        return $query->where([['id','!=',Auth::id()],['manage_id','=',Auth::id()]]);
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

}