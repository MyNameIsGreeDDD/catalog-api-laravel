<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property int|null $category_id
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Review> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\ProductFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'category_id'];

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class,'favorites');
    }
}
