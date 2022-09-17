<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Short extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'vid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vid',
        'title',
        'thumbnails',
        'description',
        'channelTitle',
        'channel',
        'tags',
        'defaultAudioLanguage',
        'statistics',
        'content_details',
        'downloaded'
    ];

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Short  $short
     * @return \Illuminate\Http\Response
     */
    public function encode()
    {
        return base64_encode("{$this->vid}ibrahim");
    }

    /**
     * Interact with the news quote.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function title(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => ucfirst($value),
        );
    }

    /**
     * Interact with the news quote.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function thumbnails(): Attribute
    {
        return new Attribute(
            get: fn ($value) => !empty($value) ? json_decode($value) : [],
            set: fn ($value) => (!empty($value) && is_array($value)) ? json_encode($value) : json_encode([]),
        );
    }

    /**
     * Interact with the news quote.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function channel(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ($value != null) ? "https://www.youtube.com/channel/$value" : null,
            set: fn ($value) => $value,
        );
    }

    /**
     * Interact with the news quote.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function tags(): Attribute
    {
        return new Attribute(
            get: fn ($value) => !empty($value) ? json_decode($value) : [],
            set: fn ($value) => (!empty($value) && is_array($value)) ? json_encode($value) : json_encode([]),
        );
    }

    /**
     * Interact with the news quote.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function statistics(): Attribute
    {
        return new Attribute(
            get: fn ($value) => !empty($value) ? json_decode($value) : [],
            set: fn ($value) => (!empty($value) && is_array($value)) ? json_encode($value) : json_encode([]),
        );
    }

    /**
     * Interact with the news quote.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function contentDetails(): Attribute
    {
        return new Attribute(
            get: fn ($value) => !empty($value) ? json_decode($value) : [],
            set: fn ($value) => (!empty($value) && is_array($value)) ? json_encode($value) : json_encode([]),
        );
    }
}
