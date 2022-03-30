<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::resource('projects', 'ProjectsController');

    // Admin
    Route::delete('admins/destroy', 'AdminController@massDestroy')->name('admins.massDestroy');
    Route::resource('admins', 'AdminController');

    // Kategori
    Route::delete('kategoris/destroy', 'KategoriController@massDestroy')->name('kategoris.massDestroy');
    Route::resource('kategoris', 'KategoriController');

    // Buku
    Route::delete('bukus/destroy', 'BukuController@massDestroy')->name('bukus.massDestroy');
    Route::resource('bukus', 'BukuController');

    // Categories
    // Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    // Route::resource('categories', 'CategoryController');

    // Kelas
    // Route::delete('kelas/destroy', 'KelasController@massDestroy')->name('kelas.massDestroy');
    // Route::resource('kelas', 'KelasController');

    // Kelase
    Route::delete('kelases/destroy', 'KelaseController@massDestroy')->name('kelases.massDestroy');
    Route::resource('kelases', 'KelaseController');

    // Angkatan
    Route::delete('angkatans/destroy', 'AngkatanController@massDestroy')->name('angkatans.massDestroy');
    Route::resource('angkatans', 'AngkatanController');

    // Anggota
    Route::delete('anggotas/destroy', 'AnggotaController@massDestroy')->name('anggotas.massDestroy');
    Route::resource('anggotas', 'AnggotaController');

    // Peminjaman
    Route::delete('peminjams/destroy', 'PeminjamController@massDestroy')->name('peminjams.massDestroy');
    Route::resource('peminjams', 'PeminjamController');

     // Pengembalian
     Route::delete('pengembalians/destroy', 'PengembalianController@massDestroy')->name('pengembalians.massDestroy');
     Route::resource('pengembalians', 'PengembalianController');

    // Pengunjung
    Route::delete('pengunjungs/destroy', 'PengunjungController@massDestroy')->name('pengunjungs.massDestroy');
    Route::resource('pengunjungs', 'PengunjungController');

    // Folders
    Route::delete('folders/destroy', 'FoldersController@massDestroy')->name('folders.massDestroy');
    Route::post('folders/media', 'FoldersController@storeMedia')->name('folders.storeMedia');
    Route::post('folders/ckmedia', 'FoldersController@storeCKEditorImages')->name('folders.storeCKEditorImages');
    Route::resource('folders', 'FoldersController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});
