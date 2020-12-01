<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use DB;

class Store extends Model
{
    use Notifiable;
    
    protected $table = "stores";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'point_sale_id',
        'product_id',
        'quantity_store',
        'quantity_sold'
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
            return 'Deactivated';
        return 'Active';
    }

    public static function getAllStores()
    {
    	return Store::join('products', 'stores.product_id', '=', 'products.id')->
    	              join('point_of_sales', 'stores.point_sale_id', '=', 'point_of_sales.id')->
    	              select('products.name as product_name',
    	                     'point_of_sales.name as point_of_sales_name',
    	                     'point_of_sales.status',
    	                     'stores.quantity_store',
    	                     'stores.quantity_sold',
    	                     'stores.point_sale_id',
    	                     'stores.product_id'
    	              )->get();
    }

    public static function getStoreByIds($product_id,$point_sale_id)
    {
    	return Store::where([['stores.product_id','=',$product_id],['stores.point_sale_id','=',$point_sale_id]])->
    	            join('products', 'stores.product_id', '=', 'products.id')->
    	            join('point_of_sales', 'stores.point_sale_id', '=', 'point_of_sales.id')->
    	            select('products.name as product_name',
    	                   'point_of_sales.name as point_of_sales_name',
    	                   'point_of_sales.status',
    	                   'stores.quantity_store',
    	                   'stores.quantity_sold',
    	                   'stores.point_sale_id',
    	                   'stores.product_id'
    	            )->get();
    }
}
