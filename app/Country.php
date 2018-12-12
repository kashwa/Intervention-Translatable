<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Country extends Model
{
    # Use the trait.
    use Translatable;

    /**
     * $translatedAttributes[] in this model.
     * contains the names of the fields being translated in the "Translation" model.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];
    protected $fillable = ['code'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    // (optionaly)
    // protected $with = ['translations'];
}
