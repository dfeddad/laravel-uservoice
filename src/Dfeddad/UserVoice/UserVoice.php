<?php namespace Dfeddad\UserVoice;

use Illuminate\Support\Facades\Facade;

/**
 * @see UserVoice\Client
 */
class UserVoice extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'uservoice'; }
}