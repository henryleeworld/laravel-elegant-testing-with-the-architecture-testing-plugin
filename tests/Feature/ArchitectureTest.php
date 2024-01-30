<?php

namespace Tests\Feature;

arch('Do not leave debug statements.')
    ->expect(['dd', 'dump', 'ray', 'var_dump'])
    ->not->toBeUsed();

arch('We do not directly use Eloquent Models in our APIs.')
    ->expect('App\Models')
    ->not->toBeUsedIn('App\Http\Controllers\Api');

arch('Do not use env helper in code.')
    ->expect(['env'])
    ->not->toBeUsed();

arch('Action classes should be invokable.')
    ->expect('App\Actions')
    ->toBeInvokable();

arch('Job classes should have handle method.')
    ->expect('App\Jobs')
    ->toHaveMethod('handle');

arch('Repositories classes should implement the repository interface.')
    ->expect('App\Repositories')
    ->toImplement('App\Repositories\RepositoryInterface');

arch('Services classes should have proper suffix.')
    ->expect('App\Controllers')
    ->toHaveSuffix('Controller');

arch('Modules should be independent.')
    ->expect('Modules\RideSharing')
    ->not->toBeUsed('Modules\FoodDelivery');

arch('Do not access session data in Async jobs.')
    ->expect(['session', 'auth', 'request'])
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
