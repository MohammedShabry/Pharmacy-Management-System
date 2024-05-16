<?php

namespace App\Models;
use DB;
use Mail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addPrescription extends Model
{
    use HasFactory;

    protected $table 		= "prescription";

	protected $primaryKey 	= 'id';

	protected $keyType 		= 'int';

	public $incrementing 	= true;

    public $timestamps = true;

    protected $fillable = [

        'id', 

        'user_id',

        'note',

        'delivery_address',

        'delivery_time_slot',

        'img1',

        'img2',

        'img3',

        'img4',

        'img5',

        'total_amount',

        'quoatation_status',

        
    ];

    protected function sendEmail($data){
       

        $recpnt_list = $data['to'];

        $sbjct = $data['subject'];

        $mail_data    = array('title' => $data['title'], 'content' => $data['msg']);

        $is_send = Mail::send('emailTemplate', $mail_data, function ($message) use ($recpnt_list, $sbjct) {

                $message->from('shabry967@gmail.com');
                $message->to($recpnt_list);
                $message->subject($sbjct);           
                
            });

       return 'send';
    }
}
