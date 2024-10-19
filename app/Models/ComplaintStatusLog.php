<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintStatusLog extends Model
{
    use HasFactory;

    protected $fillable = ['complaint_id', 'status', 'changed_at'];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
