<?php

use App\Models\BackendUser;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Setting;
use App\Models\ToyPurchase;
use App\Models\Locale;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// Dashboard
Breadcrumbs::for('backend.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('backend.dashboard'));
});

// Administrators
Breadcrumbs::for('administrators.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('Administrators', route('administrators.index'));
});

Breadcrumbs::for('administrators.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('administrators.index');
    $trail->push('Create');
});

Breadcrumbs::for('administrators.edit', function (BreadcrumbTrail $trail, int $administrator) {
    $admin = BackendUser::findOrFail($administrator);
    $trail->parent('backend.dashboard');
    $trail->parent('administrators.index');
    $trail->push($admin->first_name . ' ' . $admin->last_name);
});

// Roles
Breadcrumbs::for('roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('Roles', route('roles.index'));
});

Breadcrumbs::for('roles.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('roles.index');
    $trail->push('Create');
});

Breadcrumbs::for('roles.edit', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('backend.dashboard');
    $trail->parent('roles.index');
    $trail->push($role->name);
});

// Permissions
Breadcrumbs::for('permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('Permissions', route('permissions.index'));
});

Breadcrumbs::for('permissions.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('permissions.index');
    $trail->push('Create');
});

Breadcrumbs::for('permissions.edit', function (BreadcrumbTrail $trail, Permission $permission) {
    $trail->parent('backend.dashboard');
    $trail->parent('permissions.index');
    $trail->push($permission->name);
});

Breadcrumbs::for('profile.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push(auth()->user()->full_name ?? '');
});

// ToyPurchases
Breadcrumbs::for('toy_purchases.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('Toy Purchases', route('toy_purchases.index'));
});

Breadcrumbs::for('toy_purchases.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('toy_purchases.index');
    $trail->push('Create');
});

Breadcrumbs::for('toy_purchases.edit', function (BreadcrumbTrail $trail, int $toy_purchase) {

    $toy_purchase = ToyPurchase::findOrFail($toy_purchase);

    $trail->parent('backend.dashboard');
    $trail->parent('toy_purchases.index');
    $trail->push($toy_purchase->name);
});

// Categories
Breadcrumbs::for('categories.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('Categories', route('categories.index'));
});

Breadcrumbs::for('categories.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('categories.index');
    $trail->push('Create');
});

Breadcrumbs::for('categories.edit', function (BreadcrumbTrail $trail, int $category) {

    $category = Category::findOrFail($category);

    $trail->parent('backend.dashboard');
    $trail->parent('categories.index');
    $trail->push($category->name);
});


// Products
Breadcrumbs::for('products.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('Products', route('products.index'));
});

Breadcrumbs::for('products.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('products.index');
    $trail->push('Create');
});

Breadcrumbs::for('products.edit', function (BreadcrumbTrail $trail, int $product) {

    $product = Product::findOrFail($product);

    $trail->parent('backend.dashboard');
    $trail->parent('products.index');
    $trail->push($product->name);
});

Breadcrumbs::for('products.import_images', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('products.index');
    $trail->push('Import Product Images', route('products.index'));
});


// settings
Breadcrumbs::for('settings.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('Settings', route('settings.index'));
});

Breadcrumbs::for('settings.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('settings.index');
    $trail->push('Create');
});

Breadcrumbs::for('settings.edit', function (BreadcrumbTrail $trail, int $setting) {

    $setting = Setting::findOrFail($setting);

    $trail->parent('backend.dashboard');
    $trail->parent('settings.index');
    $trail->push($setting->name, route('settings.edit', $setting));

});

// menus
Breadcrumbs::for('menus.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('Menus', route('menus.index'));
});

Breadcrumbs::for('menus.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('menus.index');
    $trail->push('Create');
});

Breadcrumbs::for('menus.edit', function (BreadcrumbTrail $trail, int $menu) {

    $menu = Menu::findOrFail($menu);

    $trail->parent('backend.dashboard');
    $trail->parent('menus.index');
    $trail->push($menu->name, route('menus.edit', $menu));
});
// menu_items
Breadcrumbs::for('menu_items.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('MenuItems', route('menu_items.index'));
});

Breadcrumbs::for('menu_items.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('menu_items.index');
    $trail->push('Create');
});

Breadcrumbs::for('menu_items.edit', function (BreadcrumbTrail $trail, int $menuItem) {

    $MenuItem = MenuItem::findOrFail($menuItem);

    $trail->parent('backend.dashboard');
    $trail->parent('menu_items.index');
    $trail->push($menuItem->name, route('menu_items.edit', $menuItem));
});
// locales
Breadcrumbs::for('locales.index', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->push('Locales', route('locales.index'));
});

Breadcrumbs::for('locales.create', function (BreadcrumbTrail $trail) {
    $trail->parent('backend.dashboard');
    $trail->parent('locales.index');
    $trail->push('Create');
});

Breadcrumbs::for('locales.edit', function (BreadcrumbTrail $trail, int $locale) {

    $locale = Locale::findOrFail($locale);

    $trail->parent('backend.dashboard');
    $trail->parent('locales.index');
    $trail->push($locale->name, route('locales.edit', $locale));
});
