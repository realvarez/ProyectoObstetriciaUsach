<?php

use App\File;
use PDF as PDF;
use \Conner\Tagging\Model\Tagged;

Auth::routes(["register" => false]);



Route::middleware(['auth'])->group(function () {
    Route::get('/changePassword', 'UserController@firstUseChangePasswordView')->name('firstUsePassword');
    Route::post('/savePassword', 'UserController@savePassword')->name('savePassword');

    // Route::middleware(['verifyPassword'])->group(function(){
    Route::get('/', 'HomeController@index');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('academics', 'AcademicController');
    Route::resource('resumes', 'ResumeController');
    Route::resource('events', 'EventController');

    Route::resource('category', 'CategoryController');
    Route::resource('files', 'FileController');

    Route::post('/search', 'SearchController@search')->name('search');
    Route::post('/destroy', 'UserController@destroy')->name('destroy');

    Route::get('autocomplete', 'SearchController@autocomplete')->name('autocomplete');

    Route::get('/tag_saves', function () {
        $tag_db = Tag::all()->pluck('slug')->toArray();
        return response()->json($tag_db);
    });

    Route::get('storage/{archivo}', function ($archivo) {
        $file = File::find($archivo);

        //TODO: Por definir la direccion de storage
        //Variable global de storage

        //$public_path =  '/home/vagrant/code/ProyObste/storage/app/';

        $public_path =  storage_path() . '/app/';
        $url = $public_path . $file->file_path;
        //verificamos si el archivo existe y lo retornamos
        if (Storage::exists($file->file_path)) {
            return response()->download($url);
        }
        //si no se encuentra lanzamos un error 404.
        abort(404);
    });

    Route::get('stream/{archivo}', function ($archivo) {
        $file = File::find($archivo);
        //TODO: Por definir la direccion de storage
        //Variable global de storage
        // $public_path =  '/var/www/storage/app/';
        $public_path =  storage_path() . '/app/';
        $url = $public_path . $file->file_path;
        //verificamos si el archivo existe y lo retornamos
        if (Storage::exists($file->file_path)) {
            if ($file->file_extension == 'doc' || $file->file_extension == 'docx') {
                $phpWord = new \PhpOffice\PhpWord\PhpWord();
                $phpWord = \PhpOffice\PhpWord\IOFactory::load($url);
                $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
                try {
                    $objWriter->save(storage_path('temp.html'));
                } catch (Exception $e) { }
                return PDF::loadFile(storage_path('temp.html'))->save(storage_path('tempPdf.html'))->stream('temporalview.pdf');
            } else {
                return response()->file($url);
            }
        }
        //si no se encuentra lanzamos un error 404.
        abort(404);
    });
    // });
});
