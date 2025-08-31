<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'message',
        'status',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Status constants
    const STATUS_UNREAD = 0;
    const STATUS_READ = 1;

    public function scopeUnread($query)
    {
        return $query->where('status', self::STATUS_UNREAD);
    }

    public function scopeRead($query)
    {
        return $query->where('status', self::STATUS_READ);
    }

    // Helper methods to get status text
    public function getStatusTextAttribute()
    {
        return $this->status == self::STATUS_READ ? 'Read' : 'Unread';
    }

    public function getStatusClassAttribute()
    {
        return $this->status == self::STATUS_READ ? 'badge-success' : 'badge-warning';
    }
}
