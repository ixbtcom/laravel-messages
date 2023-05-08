<?php

namespace VojislavD\LaravelMessages\Providers;

use App\Actions\CreateMessage;
use App\Actions\CreateThread;
use App\Actions\MarkMessageAsSeen;
use App\Contracts\CreatesMessage;
use App\Contracts\CreatesThread;
use App\Contracts\MarksMessageAsSeen;

class ActionServiceProvider extends LaravelMessagesServiceProvider
{
    /**
     * @var array
     */
    public $bindings = [
        CreatesMessage::class => CreateMessage::class,
        MarksMessageAsSeen::class => MarkMessageAsSeen::class,
        CreatesThread::class => CreateThread::class
    ];
}