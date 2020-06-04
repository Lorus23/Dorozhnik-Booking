<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'fathers_name', 'transport', 'address', 'phone', 'email', 'country_id'];

    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setCountryIdAttribute($input)
    {
        $this->attributes['country_id'] = $input ? $input : null;
    }
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id')->withTrashed();
    }

    public function getFullNameAttribute()
    {
        return $this->last_name . ' ' .$this->first_name . ' ' .  $this->fathers_name;
    }
    
}
