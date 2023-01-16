<?php

use Illuminate\Support\Facades\Route;
use Plank\Mediable\Facades\MediaUploader;
use Plank\Mediable\Media;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\{
    MusicaController,
    ArtistaController,
    ImagemController
};
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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

Route::get('getStream/{param}', function (Request $req, $param) {
    $m = Media::whereBasename($param)->first();

    $path = $m->getAbsolutePath();

    $response = new BinaryFileResponse($path);
    BinaryFileResponse::trustXSendfileTypeHeader();

    return $response;
});

Route::get('getfile/{name}', function ($name,  Request $r) {
    $path = '';
    $media = Media::whereBasename($name)->first();
    if ($media != null) {
        $path = $media->getDiskPath();
    } else {
        $path = 'default.png';
    }
    $img = Image::make($media->getAbsolutePath());
    $w = 300;
    $h = 300;

    if (request()->w != null) {
        $w = request()->w;
    }
    if (request()->h != null) {
        $h = request()->h;
    }
    // resize the image to a width of 300 and constrain aspect ratio (auto height)
    $img->resize($w, $h, function ($constraint) {
        $constraint->aspectRatio();
    });

    $img->stream();
    return (new Response($img->__toString(), 200))
        ->header('Content-Type', 'image/jpeg');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::get('musicas', function () {
        return view('admin.musicas');
    })->name('musica');
    Route::post('musica', [MusicaController::class, 'store'])->name('musica.store');
    Route::post('artista', [ArtistaController::class, 'store'])->name('artista.store');
    Route::post('galeria', [ImagemController::class, 'store'])->name('galeria.store');

    Route::get('videos', function () {
        return view('admin.videos');
    })->name('video');

    Route::get('galerias', function () {
        return view('admin.galeria');
    })->name('galeria');

    Route::get('musicos', function () {
        return view('admin.musico');
    })->name('musico');
});
Route::get('musicas', function () {
    return view('admin.musicas');
})->name('musica');
Route::post('musica', [MusicaController::class, 'store'])->name('musica.store');
Route::post('artista', [ArtistaController::class, 'store'])->name('artista.store');
Route::post('galeria', [ImagemController::class, 'store'])->name('galeria.store');

Route::get('videos', function () {
    return view('admin.videos');
})->name('video');

Route::get('galerias', function () {
    return view('admin.galeria');
})->name('galeria');

Route::get('musicos', function () {
    return view('admin.musico');
})->name('musico');


Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
