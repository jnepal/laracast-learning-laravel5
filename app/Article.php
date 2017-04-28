<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

    protected  $fillable = [
        'title',
        'body',
        'published_at',
        'excerpt',
        'user_id' //temporary
    ];
    
    //To Let Framework behave as Carbon instance
    protected $dates = ['published_at'];
    
    //Mutator
    public function setPublishedAtAttribute($date){
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        //Carbon::parse will ignore the time and set the date to the midnight
        //$this->attributes['published_at'] = Carbon::parse($date);
    }

    //Another Mutator
    /**
     * Get published_at Attribute
     * @param $date
     * @return Carbon
     */
    public function getPublishedAtAttribute($date){
        return new Carbon($date);
    }

    //Query Scope
    public function scopePublished($query){
        $query->where('published_at', '<=', Carbon::now());
        
    }
    
    public function scopeUnpublished($query){
        $query->where('published_at', '>', Carbon::now());
    }
    /**
     * A Article is Owned by a user
     * @return type
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tags associated with the given article
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags(){
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag ids associated with article
     * @return array
     */
    public function getTagListAttribute(){
        return $this->tags()->lists('id');
    }
}
