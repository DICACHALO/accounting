<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Expense
 *
 * @property $id
 * @property $date_expense
 * @property $invoice
 * @property $merchandise_supplier
 * @property $price_expense
 * @property $type_expense
 * @property $receipt_number
 * @property $description_expense
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Expense extends Model
{
    
    static $rules = [
		'date_expense' => 'required',
		'invoice' => 'required',
		'merchandise_supplier' => 'required',
		'price_expense' => 'required',
		'type_expense' => 'required',
		'receipt_number' => 'required',
		'description_expense' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['date_expense','invoice','merchandise_supplier','price_expense','type_expense','receipt_number','description_expense'];



}
