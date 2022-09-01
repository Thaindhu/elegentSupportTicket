<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='reply_comment';
    protected $fillable=[
    'id',
    'support_ticket',
    'reply',
    'created_at',   
    'updated_at', 
    
   ];
}
