<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAccount extends Model
{
    protected $fillable = [
        'account_id',
        'user_id',
        'profile',
        'token',
        'refresh_token',
        'expired_at',
    ];

    public function getAccountStatusAttribute(): string
    {
        return now() >= $this->expired_at ? 'Expired' : 'Connected';
    }

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
