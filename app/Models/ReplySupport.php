<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplySupport extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'replies_support';

    protected $fillable = [
        'user_id',
        'support_id',
        'content',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->belongsTo(ReplySupport::class);
    }
}
