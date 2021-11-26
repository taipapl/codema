<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['topic_id', 'text', 'email', 'file'];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}