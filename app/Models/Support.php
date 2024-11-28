<?php

namespace App\Models;

use App\Enums\SupportStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Support extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'subject',
        'body',
        'status'
    ];

    public function status(): Attribute
    {
        return Attribute::make(
            set: fn(SupportStatus $status) => $status->name,
        );
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn(string $createdAt) => Carbon::make($createdAt)->format('d/m/Y H:m')
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(ReplySupport::class);
    }
}
