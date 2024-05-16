<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescriptiondrugs extends Model
{
    use HasFactory;

    protected $table 		= "prescriptiondrugs";

	protected $primaryKey 	= 'id';

	protected $keyType 		= 'int';

	public $incrementing 	= true;

    public $timestamps = false;

    protected $fillable = [

        'id', 

        'prescription_id',

        'drug_id',

        'quantity',

        
    ];
}
