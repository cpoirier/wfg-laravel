<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function getRatingAttribute()
    {
        return $this->up_votes - 0.5 * $this->down_votes;
    }

    public function getExcerptAttribute()
    {
      $paragraphs = preg_split('/^\s*$/m', $this->text);
      return array_pop($paragraphs);
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function listing()
    {
      return $this->belongsTo('App\Listing', 'listing_id');
    }
}
