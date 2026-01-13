<?php

namespace App\States\GithubRepository;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class GithubRepositoryState extends State
{
    abstract public function label(): string;

    public static function getMorphClass(): string
    {
        return \Str::snake(class_basename(static::class));
    }

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Initial::class)
            ->allowTransition(Initial::class, Creating::class)
            ->allowTransition(Creating::class, Created::class)
            ->allowTransition(Creating::class, CreateFailed::class)
            ->allowTransition(Created::class, Filling::class)
            ->allowTransition(Filling::class, Filled::class)
            ->allowTransition(Filling::class, FillFailed::class)
            ->allowTransition(Filled::class, Syncing::class)
            ->allowTransition(Syncing::class, Synced::class)
            ->allowTransition(Syncing::class, SyncFailed::class)
            ->allowTransition(Synced::class, Syncing::class);
    }
}
