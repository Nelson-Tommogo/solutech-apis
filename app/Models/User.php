<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $fillable = ['organization_id', 'name', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }
}