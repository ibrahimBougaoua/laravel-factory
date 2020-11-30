<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'photo',
        'status',
        'subcate_id',
        'employee_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function scopeGetOnlyMyCategories($query)
    {
    	return $query->where('id',Auth::id());
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
