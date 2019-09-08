<?php

namespace App;

use Illuminate\Validation\ValidationException;
use LaravelArdent\Ardent\Ardent;

class ReadChapter extends Ardent
{
    public static $rules = [
        'chapter_id' => 'required|exists:chapters,id',
        'user_id' => 'required|exists:users,id',
    ];

    protected $fillable = [
        'chapter_id',
        'user_id',
    ];

    /**
     * @throws ValidationException
     */
    public function afterValidate()
    {
        if ($this->errors()->all()) {
            $error = ValidationException::withMessages($this->errors()->all());

            throw $error;
        }
    }
}
