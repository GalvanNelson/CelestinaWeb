<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use App\Models\TeamUser;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'current_team_id',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
        'roles',
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

    /**
     * Get the team users for this user (relationship to TeamUser).
     */
    public function teamUsers()
    {
        return $this->hasMany(TeamUser::class);
    }

    /**
     * Accessor: roles assigned to the user via team memberships.
     * Returns an array of role names like ['propietario', 'vendedor', 'cliente'].
     * This reads from the pivot table 'team_user' to avoid requiring
     * relationships to be preloaded.
     *
     * @return array<int, string>
     */
    public function getRolesAttribute(): array
    {
        try {
            $roles = TeamUser::where('user_id', $this->id)
                ->pluck('role')
                ->unique()
                ->values()
                ->toArray();

            return $roles ?: [];
        } catch (\Throwable $e) {
            return [];
        }
    }
}
