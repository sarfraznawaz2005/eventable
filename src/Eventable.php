<?php
/**
 * Created by PhpStorm.
 * User: Sarfraz
 * Date: 9/17/2017
 * Time: 12:30 PM
 */

namespace Sarfraznawaz2005\Eventable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

trait Eventable
{
    protected static $LogEvents = [
        'created',
        'updated',
        'deleted',
    ];

    public static function bootEventable()
    {
        foreach (static::$LogEvents as $eventName) {
            static::$eventName(function (Model $model) use ($eventName) {
                try {

                    $reflect = new \ReflectionClass($model);
                    Event::fire(strtolower($reflect->getShortName()) . '.' . $eventName, $model);

                    return true;

                } catch (\Exception $e) {
                    return true;
                }
            });
        }
    }
}
