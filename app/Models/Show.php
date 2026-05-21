<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Carbon\Carbon;

class Show extends Model implements Feedable
{
    protected $fillable = [
        'slug',
        'title',
        'poster_url',
        'duration',
        'created_in',
        'location_id',
        'bookable',
    ];
    protected $table = 'shows';
    public $timestamps = false;

    public function location() :BelongsTo {
        return $this->belongsTo(Location::class);
    }

    public function toFeedItem(): FeedItem
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->slug)
            ->updated(Carbon::parse(new \DateTime('2023-05-15')))
            ->link("http//localhost:8000/show/".$this->id)
            ->authorName("Bob Sull")
            ->authorEmail("bob@sull.com");
    }

    public static function getFeedItems()
    {
        return Show::all();
    }
}
