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

    public static function getProductByFactoryId($id)
    {
        return Factory::where('factories.id',$id)->
        join('point_of_sales', 'factories.id', '=', 'point_of_sales.factory_id')->
        join('stores', 'point_of_sales.id', '=', 'stores.point_sale_id')->
        join('products', 'stores.product_id', '=', 'products.id')->
        select('products.id',
            'products.name as product_name',
            'products.description',
            'products.quantity_unit',
            'products.unit_price',
            'products.size',
            'products.color',
            'products.note',
            'products.status')->get();
    }

    public static function getCategoriesByFactoryId($id)
    {
        return Factory::where('factories.id',$id)->
        join('point_of_sales', 'factories.id', '=', 'point_of_sales.factory_id')->
        join('stores', 'point_of_sales.id', '=', 'stores.point_sale_id')->
        join('products', 'stores.product_id', '=', 'products.id')->
        join('categories', 'products.cateid', '=', 'categories.id')->
        select('categories.id','categories.name','categories.slug','categories.description','categories.created_at',)->get();
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
