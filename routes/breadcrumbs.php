<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > User Management
Breadcrumbs::for('user-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('user-management.users.index'));
});

// Dashboard > User Management > Users
Breadcrumbs::for('user-management.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Users', route('user-management.users.index'));
});

// Dashboard > User Management > Users > [User]
Breadcrumbs::for('user-management.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.users.index');
    $trail->push(ucwords($user->name), route('user-management.users.show', $user));
});

// Dashboard > User Management > Roles
Breadcrumbs::for('user-management.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Roles', route('user-management.roles.index'));
});

// Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('user-management.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('user-management.roles.index');
    $trail->push(ucwords($role->name), route('user-management.roles.show', $role));
});

// Dashboard > User Management > Permission
Breadcrumbs::for('user-management.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Permissions', route('user-management.permissions.index'));
});

// Dashboard > User Management > Affiliate
Breadcrumbs::for('user-management.affiliate.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Affiliate', route('user-management.affiliate.index'));
});

// Dashboard > User Management > affiliate
Breadcrumbs::for('user-management.affiliate.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.affiliate.index');
    $trail->push(ucwords($user->name), route('user-management.affiliate.show',$user));
});

// Dashboard > User Management > Partners
Breadcrumbs::for('user-management.partner.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Partner', route('user-management.partner.index'));
});

// Dashboard > User Management > Partner
Breadcrumbs::for('user-management.partner.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.partner.index');
    $trail->push(ucwords($user->name), route('user-management.partner.show',$user));
});

// Dashboard > User Management > Partner > Project Manager
Breadcrumbs::for('user-management.project-manager', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.partner.show',$user);
    $trail->push('Project Managers', route('user-management.project-manager',$user));
});

// Dashboard > User Management > Partner > Seller
Breadcrumbs::for('user-management.seller-list', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.partner.show',$user);
    $trail->push('Sellers', route('user-management.seller-list',$user));
});

// Dashboard > User Management > Partner > Stores
Breadcrumbs::for('user-management.store-list', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.partner.show',$user);
    $trail->push('Stores', route('user-management.store-list',$user));
});

// Dashboard > User Management > Partner > Coupons
Breadcrumbs::for('user-management.coupon-list', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.partner.show',$user);
    $trail->push('Coupons', route('user-management.coupon-list',$user));
});

// Dashboard > User Management > Partner > Products
Breadcrumbs::for('product-management.partner.products', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.partner.show',$user);
    $trail->push('Products', route('product-management.partner.products',$user));
});

// Dashboard > User Management > Partner > Proforma
Breadcrumbs::for('user-management.proforma-list', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.partner.show',$user);
    $trail->push('Proforma Invoices', route('user-management.proforma-list',$user));
});

// Dashboard > User Management > Partner > Invoice
Breadcrumbs::for('user-management.invoice-list', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.partner.show',$user);
    $trail->push('Invoices', route('user-management.invoice-list',$user));
});


// Dashboard > Stores
Breadcrumbs::for('store-management.store.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Stores', route('store-management.store.index'));
});


// Dashboard > Stores > [store]
Breadcrumbs::for('store-management.store.show', function (BreadcrumbTrail $trail,Store $store ) {
    $trail->parent('store-management.store.index');
    $trail->push(ucwords($store->name), route('store-management.store.show', $store));
});

// Dashboard > Stores > [store] > products
Breadcrumbs::for('store-management.store.products', function (BreadcrumbTrail $trail,Store $store ) {
    $trail->parent('store-management.store.show',$store);
    $trail->push('Products', route('store-management.store.products', $store));
});

// Dashboard > Stores > [store] > coupons
Breadcrumbs::for('store-management.coupon-list', function (BreadcrumbTrail $trail,Store $store ) {
    $trail->parent('store-management.store.show',$store);
    $trail->push('Coupons', route('store-management.coupon-list', $store));
});

// Dashboard > Stores > [store] > Seller
Breadcrumbs::for('store-management.seller-list', function (BreadcrumbTrail $trail,Store $store ) {
    $trail->parent('store-management.store.show',$store);
    $trail->push('Seller', route('store-management.seller-list', $store));
});
// Dashboard > Stores > [store] > Project Manager
Breadcrumbs::for('store-management.project-manager', function (BreadcrumbTrail $trail,Store $store ) {
    $trail->parent('store-management.store.show',$store);
    $trail->push('Project Manager', route('store-management.project-manager', $store));
});

// Dashboard > Customer
Breadcrumbs::for('user-management.customer.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Customers', route('user-management.customer.index'));
});

// Dashboard > Customer > [customer]
Breadcrumbs::for('user-management.customer.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.customer.index');
    $trail->push(ucwords($user->name), route('user-management.customer.show',$user));
});

// Dashboard > Orders
Breadcrumbs::for('user-management.order.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.customer.index');
    $trail->push('Orders', route('user-management.order.index'));
});
// Dashboard > Orders > [order]
Breadcrumbs::for('user-management.order.show', function (BreadcrumbTrail $trail, Order $order) {
    $trail->parent('user-management.order.index');
    $trail->push(ucwords($order->user->name), route('user-management.order.show',$order));
});

// Dashboard > Products
Breadcrumbs::for('product-management.product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Products', route('product-management.product.index'));
});
// Dashboard > Products > [product]
Breadcrumbs::for('product-management.product.show', function (BreadcrumbTrail $trail, Product $product) {
    $trail->parent('product-management.product.index');
    $trail->push('Products', route('product-management.product.show',$product));
});

// Dashboard > Products > [product]
Breadcrumbs::for('product-management.category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('product-management.product.index');
    $trail->push('Categories', route('product-management.category.index'));
});
