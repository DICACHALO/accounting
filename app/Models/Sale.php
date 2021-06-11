<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 *
 * @property $id
 * @property $date_sale
 * @property $price_sale
 * @property $type_sale
 * @property $description_sale
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sale extends Model
{
    
    static $rules = [
		'date_sale' => 'required',
		'price_sale' => 'required',
		'type_sale' => 'required'
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date_sale','price_sale','type_sale','description_sale'];



}
