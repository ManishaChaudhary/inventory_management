<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::resource('companies', 'Admin\CompanyController');
    Route::resource('godowns', 'Admin\GodownController');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('subcategories', 'Admin\SubCategoryController');
    Route::resource('types', 'Admin\ProductTypeController');
    Route::resource('batches', 'Admin\ProductBatchController');
    Route::resource('products', 'Admin\ProductController');
    Route::get('/remove-company/{user_id}/{company_id}', [
        'as' => 'company.detach',
        'uses' => 'UserController@removeCompany'
    ]);

    Route::resource('challans', 'ChallanInController');
    Route::resource('challan-out', 'ChallanOutController');

//   ========================= User Management Routes ================================
    Route::resource('roles', 'Admin\RoleController');
    Route::resource('permissions', 'Admin\PermissionController');
    Route::resource('users', 'Admin\UserController');
//   =========================End User Management Routes ================================

});

Route::get('/add-product-detail', [
    'as' => 'add.product',
    'uses' => 'ProductController@addProduct'
]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');