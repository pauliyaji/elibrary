<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Resource extends Model implements HasMedia
{
    use HasFactory, HasAdvancedFilter, SoftDeletes, Tenantable, InteractsWithMedia, Auditable;

    public $table = 'resources';

    protected $appends = [
        'cover_image',
        'file',
    ];

    protected $dates = [
        'date_of_publication',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static $search = [
        'title',
        'slug',
        'authors',
        'authors_affiliations',
        'publisher',
        'date_of_publication',
        'year_of_publication',
        'issn_isbn',
        'edition',
        'volume',
        'issue',
        'abstract',
        'references',
        'pages',
        'cover_image',
    ];

    protected $fillable = [
        'title',
        'slug',
        'authors',
        'authors_affiliations',
        'publisher',
        'date_of_publication',
        'year_of_publication',
        'issn_isbn',
        'edition',
        'volume',
        'issue',
        'abstract',
        'references',
        'pages',
        'book_category_id',
        'resource_category_id',
    ];

    public $orderable = [
        'id',
        'title',
        'slug',
        'authors',
        'authors_affiliations',
        'publisher',
        'date_of_publication',
        'year_of_publication',
        'issn_isbn',
        'edition',
        'volume',
        'issue',
        'abstract',
        'references',
        'pages',
        'book_category.name',
        'resource_category.name',
    ];

    public $filterable = [
        'id',
        'title',
        'slug',
        'authors',
        'authors_affiliations',
        'publisher',
        'date_of_publication',
        'year_of_publication',
        'issn_isbn',
        'edition',
        'volume',
        'issue',
        'abstract',
        'references',
        'pages',
        'tag.name',
        'book_category.name',
        'resource_category.name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateOfPublicationAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateOfPublicationAttribute($value)
    {
        $this->attributes['date_of_publication'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getCoverImageAttribute()
    {
        return $this->getMedia('resource_cover_image')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function getFileAttribute()
    {
        return $this->getMedia('resource_file')->map(function ($item) {
            $media        = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function tag()
    {
        return $this->belongsToMany(ContentTag::class);
    }

    public function bookCategory()
    {
        return $this->belongsTo(BookCategory::class);
    }

    public function resourceCategory()
    {
        return $this->belongsTo(ResourceCategory::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
