<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\GeolocationRequest
 *
 * @property int $id
 * @property string $geocode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GeolocationRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeolocationRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeolocationRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|GeolocationRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeolocationRequest whereGeocode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeolocationRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeolocationRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GeolocationRequest extends Model
{
    use HasFactory;
    protected $fillable = ['geocode'];

}
