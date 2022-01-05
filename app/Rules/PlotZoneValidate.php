<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Plot;

class PlotZoneValidate implements Rule
{
    public $zone_id;
    /**
     * 
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($zone)
    {
        $this->zone_id=$zone;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
       $plot =Plot::where(['number'=>$value,'zone_id'=>$this->zone_id])->first();
         if(!$plot){
           return true;
         }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Plot Number Already Exist in selected zone';
    }
}
