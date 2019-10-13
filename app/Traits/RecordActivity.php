<?php

namespace App\Traits;

use App\Activity;
use Illuminate\Support\Facades\Auth;
use ReflectionClass;

trait RecordActivity
{
    protected static function bootRecordActivity()
    {
        foreach (static::getEventsToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                //TODO Проверка есть ли уже активность по этой главе
                $model->recordActivity($event);
            });
        }
    }

    protected static function getEventsToRecord()
    {
        return ['created'];
    }

    public function recordActivity($event)
    {
        $this->activity()->create([
            'user_id' => Auth::id(),
            'type' => "{$event}_{$this->getTypeName()}",
        ]);
    }

    /**
     * @return string
     * @throws \ReflectionException
     */
    protected function getTypeName()
    {
        try {
            return strtolower((new ReflectionClass($this))->getShortName());
        } catch (\ReflectionException $e) {
            throw $e;
        }
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject');
    }
}
