<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'full_name', 'gender', 'age', 'occupation',
        'phone_number', 'email', 'address', 'subject',
        'image_path', 'additional_details', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->nullable();
    }

    public function statusLogs()
    {
        return $this->hasMany(ComplaintStatusLog::class);
    }
}
