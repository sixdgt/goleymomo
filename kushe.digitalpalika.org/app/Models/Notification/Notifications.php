<?php

namespace App\Models\Notification;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notification;

class Notifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'notification_type',
        'notificaiton_message',
        'notification_send_by',
        'notification_to',
        'notification_status',
        'notification_pinned',
        'notification_url',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'notification_send_by');
    }


}
