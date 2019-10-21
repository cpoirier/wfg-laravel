<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use HTMLPurifier;
use Parsedown;


class Listing extends Model
{
    use SoftDeletes;

    public function getAdvisoriesAttribute()
    {
        $advisories = [];
        if ($this->graphic_sex != 'none') {
            $advisories['graphic sex'] = $this->graphic_sex;
        }
        if ($this->graphic_violence != 'none') {
            $advisories['graphic violence'] = $this->graphic_violence;
        }
        if ($this->harsh_language != 'none') {
            $advisories['harsh language'] = $this->harsh_language;
        }

        return $advisories;
    }

    public function tags()
    {
        return $this->belongsToMany('App\ListingTag', 'listing_tag_sets', 'listing_id', 'tag_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'listing_id');
    }

}
