<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatistic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatistic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatistic query()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatistic whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatistic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatistic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatistic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatistic whereUserId($value)
 * @mixin \Eloquent
 */
class MessageStatistic extends Model
{
    use HasFactory;
}
