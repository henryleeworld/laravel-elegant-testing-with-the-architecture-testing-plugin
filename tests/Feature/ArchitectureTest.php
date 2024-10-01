<?php

namespace Tests\Feature;

arch()->preset()->php();
arch()->preset()->security();
arch()->preset()->laravel();

arch('We do not directly use Eloquent Models in our APIs.')
    ->expect('App\Models')
    ->not->toBeUsedIn('App\Http\Controllers\Api');

arch('Action classes should be invokable.')
    ->expect('App\Actions')
    ->toBeInvokable();

arch('Repositories classes should implement the repository interface.')
    ->expect('App\Repositories')
    ->toImplement('App\Repositories\RepositoryInterface');

arch('Do not access session data in Async jobs')
    ->expect([
        'session',
        'auth',
        'request',
        'Illuminate\Support\Facades\Auth',
        'Illuminate\Support\Facades\Session',
        'Illuminate\Http\Request',
        'Illuminate\Support\Facades\Request'
    ])
    ->each->not->toBeUsedIn('App\Jobs');

/*
arch('Use string type check.')
    ->expect('App')
    ->toUseStrictTypes();

arch('Services classes should have proper suffix.')
    ->expect('App\Services')
    ->toHaveSuffix('Service');

arch('Our API controllers return responses that we expect.')
    ->expect('Illuminate\Contracts\Support\Http\Responsable')
    ->toBeUsedIn('App\Http\Controllers\Api');

arch('We always use Resouce classes when responding.')
    ->expect('App\Http\Resources')
    ->toBeUsedIn('App\Http\Controllers\Api');

arch('We use Query classes where we need them in the Catalog domain.')
    ->expect('Domains\Catalog\Queries')
    ->toBeUsedIn('App\Http\Controllers\Api\V1\Products\Read');

arch('Query classes are used for read operations.')
    ->expect('Domains\*\Queries')
    ->toBeUsedIn('App\Http\Controllers\Api\*\*\IndexController')
    ->toBeUsedIn('App\Http\Controllers\Api\*\*\ShowController')
    ->not->toBeUsedIn('App\Http\Controllers\Api\*\*\StoreController')
    ->not->toBeUsedIn('App\Http\Controllers\Api\*\*\UpdateController')
    ->not->toBeUsedIn('App\Http\Controllers\Api\*\*\DeleteController');
*/
