<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Categories
 *
 * @property int $id
 * @property string $name_cate
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereNameCate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categories whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Categories extends Model
{
    use HasFactory;
    protected $table= "categories";
    protected $guarded = [
        'id'
    ];

}
