<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SupportTicket extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'support_ticket';
    protected $fillable = [
        'id',
        'ref_no',
        'customer_name',
        'problem_description',
        'email',
        'phone_number',
        'status',
        'isView',
        'created_at',
        'updated_at',
    ];


    public static function checkRef($RefNo)
    {
        $data = DB::table('support_ticket AS  master')
            ->leftJoin('reply_comment  AS chaild', 'master.id', '=', 'chaild.support_ticket')
            ->select('*')
            ->where('master.ref_no', '=', $RefNo)
            ->get();
        return $data;

        
    }
}
