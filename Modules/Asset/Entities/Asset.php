<?php

namespace Modules\Asset\Entities;

use App\Models\User\User;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Asset\Database\Factories\AssetFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Asset extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'assets';

    protected $appends = [
        'photos',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_id',
        'serial_number',
        'name',
        'status_id',
        'location_id',
        'notes',
        'assigned_to_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function category()
    {
        return $this->belongsTo(AssetCategory::class, 'category_id');
    }

    public function getPhotosAttribute()
    {
        return $this->getMedia('photos');
    }

    public function status()
    {
        return $this->belongsTo(AssetStatus::class, 'status_id');
    }

    public function location()
    {
        return $this->belongsTo(AssetLocation::class, 'location_id');
    }

    public function assigned_to()
    {
        return $this->belongsTo(User::class, 'assigned_to_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return Factory
     */
    protected static function newFactory()
    {
        return AssetFactory::new();
    }
}
