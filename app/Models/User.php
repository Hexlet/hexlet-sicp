<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\User
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $github_name
 * @property string $hexlet_nickname
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Collection|Chapter[] $chapters
 * @property-read int|null $chapters_count
 * @property-read Collection|Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read Collection|CompletedExercise[] $completedExercises
 * @property-read int|null $completed_exercises_count
 * @property-read Collection|Exercise[] $exercises
 * @property-read int|null $exercises_count
 * @property-read Collection|ReadChapter[] $readChapters
 * @property-read int|null $read_chapters_count
 * @property-read Collection|Solution[] $solutions
 * @property-read int|null $solutions_count
 * @method static UserFactory factory(...$parameters)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;
    use HasFactory;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function chapters(): BelongsToMany
    {
        return $this->belongsToMany(Chapter::class, 'read_chapters')->withTimestamps();
    }

    public function readChapters(): HasMany
    {
        return $this->hasMany(ReadChapter::class);
    }

    public function completedExercises(): HasMany
    {
        return $this->hasMany(CompletedExercise::class);
    }

    public function exercises(): BelongsToMany
    {
        return $this->belongsToMany(Exercise::class, 'completed_exercises')->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function solutions(): HasMany
    {
        return $this->hasMany(Solution::class);
    }
}
