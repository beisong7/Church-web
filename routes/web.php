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


Route::get('/', 'HomeController@index')->name('home');
Route::get('test-mail-invite', 'AdminInviteController@emailInviteTest');


Route::get('spirit-gate', 'Auth\LoginController@adminLogin')->name('admin.login');
Route::post('spirit-gate', 'Auth\LoginController@validateAdmin')->name('admin.auth');
Route::post('contact-us', 'HomeController@contactUs')->name('contact.us');
Route::get('download/wsf-outline/{uuid}', 'Dashboard\WsfOutlineController@download')->name('download.wsf.outline');



Route::get('spirit/reset_password', 'Auth\ForgotPasswordController@startPasswordReset')->name('admin.start.password_reset');

Route::group(['middleware'=>'admin'], function () {
    Route::prefix('dashboard')->group(function () {
        //logout
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');

        //dashboard
        Route::get('/', 'Dashboard\BoardController@dashboard')->name('dashboard');

        //file routes
        Route::get('files', 'Dashboard\BoardController@files')->name('files');
        Route::get('file/upload', 'Dashboard\BoardController@filesUpload')->name('file.upload');
        Route::post('file/upload', 'ImageUploadController@uploadFiles')->name('uploadStore');
        Route::post('post/img/delete/{unid}', 'ImageUploadController@deleteImage')->name('uploadDelete');

        //sliders and gallery
        Route::get('sliders', 'Dashboard\SliderController@index')->name('sliders');
        Route::get('gallery-list', 'Dashboard\GalleryController@galleryList')->name('gallery.list');
        Route::get('add-slider/{uuid}', 'Dashboard\SliderController@add')->name('add.slider');
        Route::get('pop-slider', 'Dashboard\SliderController@pop')->name('slider.pop');

        //Site info routes
        Route::get('site-info', 'Dashboard\BoardController@siteInfo')->name('site.info');
        Route::post('site-info', 'Dashboard\BoardController@siteInfoUpdate')->name('site.info.update');

        //Administrators (bundle)
        Route::resource('admin', 'Admin\AdminController');
        Route::get('disable-admin', 'Admin\AdminController@disable')->name('admin.pop');
        Route::get('invite-new/admin', 'Admin\AdminController@startInvite')->name('admin.start.invite');
        Route::post('invite-admin', 'Admin\AdminController@sendRoleInvite')->name('admin.invite');

        //WSF Routes
        Route::resource('wsf', 'Dashboard\WsfOutlineController');
        Route::get('delete-outline', 'Dashboard\WsfOutlineController@delete')->name('outline.pop');
        Route::get('outline/toggle/{uuid}', 'Dashboard\WsfOutlineController@toggleCurrent')->name('wsf.toggle');

        //Services Routes
        Route::resource('service', 'Dashboard\ServiceController');
        Route::get('delete-service', 'Dashboard\ServiceController@delete')->name('service.pop');
        Route::get('service/toggle/{uuid}', 'Dashboard\ServiceController@toggleCurrent')->name('service.toggle');

        //Roles Routes
        Route::resource('role', 'Dashboard\RoleController');
        Route::get('delete-role', 'Dashboard\RoleController@delete')->name('role.pop');
        Route::get('role/toggle/{uuid}', 'Dashboard\RoleController@toggleCurrent')->name('role.toggle');
        Route::get('profile/my-roles', 'Dashboard\RoleController@myRoles')->name('my.roles');

    });
});

//Admin External routes
Route::get('accept/admin/{token}', 'AdminInviteController@startAccept')->name('admin.accept.invite');
Route::get('action/failed', 'AdminInviteController@actionFailed')->name('action.failed');