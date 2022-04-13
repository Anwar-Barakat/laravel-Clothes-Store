<?php

namespace App\Traits;

use Carbon\Carbon;

trait FormatDates
{
    protected $localFormat = 'd.m.Y H:i';


    // save the date in UTC format in DB table
    public function setCreatedAtAttribute($date)
    {
        $this->attributes['created_at'] = Carbon::parse($date);
    }

    // convert the UTC format to local format
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format($this->localFormat);
    }

    // get diffForHumans for this attribute
    public function getCreatedAtHumanAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    // save the date in UTC format in DB table
    public function setUpdatedAtAttribute($date)
    {
        $this->attributes['updated_at'] = Carbon::parse($date);
    }

    // convert the UTC format to local format
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::parse($date)->format($this->localFormat);
    }

    // get diffForHumans for this attribute
    public function getUpdatedAtHumanAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    // save the date in UTC format in DB table
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    // convert the UTC format to local format
    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format($this->localFormat);
    }

    // get diffForHumans for this attribute
    public function getPublishedAtHumanAttribute()
    {
        return Carbon::parse($this->attributes['published_at'])->diffForHumans();
    }

    // save the date in UTC format in DB table
    public function setDeletedAtAttribute($date)
    {
        $this->attributes['deleted_at'] = Carbon::parse($date);
    }

    // convert the UTC format to local format
    public function getDeletedAtAttribute($date)
    {
        return Carbon::parse($date)->format($this->localFormat);
    }

    // get diffForHumans for this attribute
    public function getDeletedAtHumanAttribute()
    {
        return Carbon::parse($this->attributes['deleted_at'])->diffForHumans();
    }
}