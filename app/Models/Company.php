<?php

namespace App\Models;

use Database\Factories\CompanyFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Company
 *
 * @property int $id
 * @property string $name
 * @property string|null $contact
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static CompanyFactory factory(...$parameters)
 * @method static Builder|Company newModelQuery()
 * @method static Builder|Company newQuery()
 * @method static Builder|Company query()
 * @method static Builder|Company whereContact($value)
 * @method static Builder|Company whereId($value)
 * @method static Builder|Company whereName($value)
 * @mixin Eloquent
 */
class Company extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',
        'address',
        'zip_code',
        'town',
        'contact',
        'zip_code',
    ];

    /**
     * The users that belong to the company.
     *
     * @return HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
