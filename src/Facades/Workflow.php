<?php namespace Bantenprov\Workflow\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The Workflow facade.
 *
 * @package Bantenprov\Workflow
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class Workflow extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'workflow';
    }
}
