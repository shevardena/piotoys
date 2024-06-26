<?php

namespace App\Providers;

use App\Interfaces\AthleteRepositoryInterface;
use App\Interfaces\BackendUserRepositoryInterface;
use App\Interfaces\FileAttachmentRepositoryInterface;
use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Interfaces\SettingRepositoryInterface;
use App\Interfaces\SportTypeRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Interfaces\ToyPurchaseRepositoryInterface;
use App\Repositories\AthleteRepository;
use App\Repositories\BackendUserRepository;
use App\Repositories\FileAttachmentRepository;
use App\Repositories\PermissionRepository;
use App\Repositories\PostRepository;
use App\Repositories\RoleRepositoryRepository;
use App\Repositories\SettingRepository;
use App\Repositories\SportTypeRepository;
use App\Repositories\TagRepository;
use App\Repositories\ToyPurchaseRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BackendUserRepositoryInterface::class, BackendUserRepository::class);
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepositoryRepository::class);
        $this->app->bind(ToyPurchaseRepositoryInterface::class, ToyPurchaseRepository::class);
    }
}
