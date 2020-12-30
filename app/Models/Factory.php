<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Factory extends Model
{

    use Notifiable;

    protected $table = "factories";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'desc',
        'logo',
        'phone',
        'status',
        'employee_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function getPointOfSales()
    {
        return $this->hasMany('App\Models\PointOfSale','factory_id','id');
    }

    public function scopeGetOnlyMyFactories($query)
    {
    	return $query->where('employee_id',Auth::id());
    }

    public function getLogoAttribute($value)
    {
        if ( ! empty($value) )
            return asset('assets/' . $value);
        return asset('admin/images/profile.jpg');
    }

    public function getStatusAttribute($value)
    {
        if ( $value == 0 )
            return 'Deactivated';
        return 'Active';
    }
}
