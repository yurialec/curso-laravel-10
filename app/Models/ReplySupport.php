<?php

namespace App\Models;

use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    protected $with = ['user', 'replies'];

    protected static function booted(): void
    {
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->latest();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->belongsTo(ReplySupport::class);
    }
}
