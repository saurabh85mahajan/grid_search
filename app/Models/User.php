<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\HasStatus;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
    use HasStatus;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'organisation_id',
        'is_active',
        'is_manager',
        'manager_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return  config('app.env') == 'local' || str_ends_with($this->email, 'admin@admin.com');
        }

        if ($panel->getId() === 'llc') {
            return  auth()->user()->organisation_id == 1;
        }

        if ($panel->getId() === 'ppc') {
            return  auth()->user()->organisation_id == 2;
        }

        return true;
    }

    public function scopeIsNotManager(Builder $query): Builder
    {
        return $query->where('is_manager', 0);
    }

    public function scopeIsManager(Builder $query): Builder
    {
        return $query->where('is_manager', 1);
    }

    public function scopeHasManager(Builder $query, $userId): Builder
    {
        return $query->where('manager_id', $userId);
    }

    public function scopeHasOrganisation(Builder $query, $organisationId): Builder
    {
        return $query->where('organisation_id', $organisationId);
    }

    public static function getSubordinates($organisationId): array
    {
        $results = User::query()
            ->active()
            ->isNotManager()
            ->hasManager(auth()->user()->id)
            ->hasOrganisation($organisationId)
            ->pluck('id')
            ->toArray();

        $results[] = auth()->user()->id;

        return $results;
    }
	
	public function isAdmin()
	{
		return is_null($this->organisation_id);
	}
}
