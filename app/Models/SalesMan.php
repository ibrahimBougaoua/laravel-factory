<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class SalesMan extends Model
{
    use Notifiable;
    
    protected $table = "sales_men";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'manage_id',
        'employee_id',
        'point_sale_id',
        'date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public $timestamps = false;

    public function getStatusAttribute($value)
    {
        if ( $value == 0 )
            return 'Active';
        return 'deactivated';
    }

    public function scopeGetOnlyMyEmployees($query)
    {
    	return $query->where('manage_id',Auth::id());
    }

    public static function getSalesMen()
    {
        return SalesMan::join('admins', 'sales_men.employee_id', '=', 'admins.id')->
                              join('point_of_sales', 'sales_men.point_sale_id', '=', 'point_of_sales.id')->
                              select('admins.first_name','admins.email','admins.status','point_of_sales.name','sales_men.date','sales_men.employee_id','sales_men.manage_id','sales_men.point_sale_id','sales_men.id');
    }

    public static function getSalesManById($id)
    {
        return SalesMan::where('sales_men.id',$id)->
                              join('admins', 'sales_men.employee_id', '=', 'admins.id')->
                              join('point_of_sales', 'sales_men.point_sale_id', '=', 'point_of_sales.id')->
                              select('admins.first_name','admins.email','admins.status','point_of_sales.name','sales_men.date','sales_men.employee_id','sales_men.manage_id','sales_men.point_sale_id','sales_men.id')->
                              first();
    }
}
