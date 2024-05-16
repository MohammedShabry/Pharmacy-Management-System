<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class drug extends Model
{
    use HasFactory;

    protected $table 		= "drugs";

	protected $primaryKey 	= 'drug_id';

	protected $keyType 		= 'int';

	public $incrementing 	= true;

	public $timestamps 		= false;

    protected $fillable = [

        'drug_id', 

        'drug',

        'unit_price'
    ];
}
