<?php

namespace Dena\IranLaravel\Models\Traits;

use Morilog\Jalali\Jalalian;

use Throwable;

/**
 * Use in Eloquent Model
 */
trait JalaliDates
{
    /**
     * The attributes that should be converet to jalali dates.
     *
     * @var array
     *
     * protected $jalali_dates = [
     *     'deleted_at',
     *     'created_at',
     *     'updated_at',
     * ];
     */

    /**
     * Add 'jalali' to eloquent $appends variable
     * @var array $jalali_dates add to model
     *
     * @return void
     */
    public function getJalaliAttribute(): object
    {
        $dates = [];

        if (isset($this->jalali_dates)) {
            foreach ($this->jalali_dates as $key => $value) {
                if (is_string($key)) {
                    $attribute = $key;
                    $format = $value;
                } else {
                    $attribute = $value;
                    $format = 'Y/m/d H:i:s';
                }
                
                try {
                    $dates[$attribute] = isset($this->$attribute) ? Jalalian::fromCarbon($this->$attribute)->format($format) : null;
                } catch(Throwable $th) {
                    $dates[$attribute] = null;
                }
                
            }
        }

        return (object) $dates;
    }
}
