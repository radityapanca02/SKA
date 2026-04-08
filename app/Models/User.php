<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'role',
        'Key',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    public static function SUPERADMIN_ROLE_KEY()
    {
        return env('SUPERADMIN_ROLE_KEY');
    }

    public static function ADMIN_ROLE_KEY()
    {
        return env('ADMIN_ROLE_KEY');
    }

    public static function EDITOR_ROLE_KEY()
    {
        return env('EDITOR_ROLE_KEY');
    }

    // Role keys dari env
    public static function ROLE_KEYS()
    {
        return [
            'SUPERADMIN' => self::SUPERADMIN_ROLE_KEY(),
            'ADMIN'      => self::ADMIN_ROLE_KEY(),
            'EDITOR'     => self::EDITOR_ROLE_KEY(),
        ];
    }

    // Boot method untuk set role_key otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->Key = self::ROLE_KEYS()[$user->role] ?? null;
        });

        static::updating(function ($user) {
            if ($user->isDirty('role')) {
                $user->Key = self::ROLE_KEYS()[$user->role] ?? null;
            }
        });
    }

    // Scope untuk role
    public function scopeSuperadmin($query)
    {
        return $query->where('role', 'SUPERADMIN');
    }

    public function scopeAdmin($query)
    {
        return $query->where('role', 'ADMIN');
    }

    public function scopeEditor($query)
    {
        return $query->where('role', 'EDITOR');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Check role
    public function isSuperadmin()
    {
        return $this->role === 'SUPERADMIN';
    }

    public function isAdmin()
    {
        return $this->role === 'ADMIN';
    }

    public function isEditor()
    {
        return $this->role === 'EDITOR';
    }

    // Check permissions
    public function canCreate()
    {
        return in_array($this->role, ['SUPERADMIN', 'ADMIN', 'EDITOR']);
    }

    public function canEdit()
    {
        return in_array($this->role, ['SUPERADMIN', 'ADMIN', 'EDITOR']);
    }

    public function canDelete()
    {
        return in_array($this->role, ['SUPERADMIN', 'ADMIN']);
    }

    public function canManageUsers()
    {
        return in_array($this->role, ['SUPERADMIN', 'ADMIN']);
    }

    public function canViewLogs()
    {
        return in_array($this->role, ['SUPERADMIN', 'ADMIN']);
    }

    public function canDeleteLogs()
    {
        return $this->role === 'SUPERADMIN';
    }

    // Verify role key
    public function verifyRoleKey()
    {
        return $this->Key === (self::ROLE_KEYS()[$this->role] ?? null);
    }

    // Relationships
    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }
}
