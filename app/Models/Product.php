<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Notifiable;
    
    protected $table = "products";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'quantity_unit',
        'unit_price',
        'size',
        'color',
        'note',
        'cateid',
        'status'
    ];
    
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function getStatusAttribute($value)
    {
        if ( $value == 0 )
            return 'Deactivated';
        return 'Active';
    }
}
