<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * Fillable Fields For a tag
     * @var array
     */
    protected $fillable =[
        'name'
    ];
    /**Get the Articles associated with the given tag
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function articles(){
        return $this->belongsToMany('App\Articles');
    }

}
