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
    Controller,
    ImagemController,
    VolumeController,
    FitaController
};
use App\Models\Fita;
use App\Models\Musica;
use App\Models\Volume;
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

    Route::get('musicas', function () {
        return view('admin.musicas');
    })->name('musica');

    Route::post('musica', [MusicaController::class, 'store'])->name('musica.store');
    Route::get('musica/{id}', [MusicaController::class, 'show'])->name('musica.show');
    Route::post('artista', [ArtistaController::class, 'store'])->name('artista.store');
    Route::get('artista/{id}', [ArtistaController::class, 'show'])->name('artista.show');
    Route::post('galeria', [ImagemController::class, 'store'])->name('galeria.store');
    Route::get('galeria/{id}', [ImagemController::class, 'show'])->name('galeria.show');
    Route::post('volume', [VolumeController::class, 'store'])->name('volume.store');
    Route::get('volume/{id}', [VolumeController::class, 'show'])->name('volume.show');
    Route::post('fita', [FitaController::class, 'store'])->name('fita.store');
    Route::get('fita/{id}', [FitaController::class, 'show'])->name('fita.show');

    Route::get('videos', function () {
        return view('admin.videos');
    })->name('video');

    Route::get('galerias', function () {
        return view('admin.galeria');
    })->name('galeria');

    Route::get('musicos', function () {
        return view('admin.musico');
    })->name('musico');

    Route::get('volume', function () {
        return view('admin.volumes');
    })->name('volume');

    Route::get('fita', function () {
        return view('admin.fita');
    })->name('fita');
});


Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

Route::get('loadMusicas', function () {
    $volumes = Storage::disk('public')->directories('conteudo');

    foreach ($volumes as $volume) {
        //Cadastrar directorios. Cada directório é um volume
        $vol = Volume::whereTitulo(Controller::getName($volume))->first();
        if ($vol == null) {
            $vol = new Volume();
        }
        $vol->titulo = Controller::getName($volume);
        $vol->save();

        $fitas = Storage::disk('public')->directories($volume);


        foreach ($fitas as $fita) {
            //Cadastrar cada uma das fitas
            $fit = Fita::whereNome(Controller::getName($fita))->first();
            if ($fit == null) {
                $fit = new Fita();
            }
            $fit->nome = Controller::getName($fita);
            $fit->volumes_id = $vol->id;
            $fit->save();

            $musicas = Storage::disk('public')->files($fita);

            foreach ($musicas as $musica) {
                //cadastrar cada uma das músicas
                $mus = Musica::whereTitulo(Controller::getName($musica))->first();
                if ($mus == null) {
                    $mus = new Musica();

                    $mus->titulo = Controller::getName($musica);
                    $mus->fita_id = $fit->id;


                    $media = MediaUploader::fromSource(storage_path() . '/app/public/' . $musica)
                        ->toDirectory('processed_files')->onDuplicateIncrement()
                        ->useHashForFilename()
                        //->setAllowedAggregateTypes(['audio'])
                        ->upload();
                    Log::debug($media);

                    $mus->file = $media->basename;
                    $mus->save();
                }

                //var_dump($musica);
                //return ['msg' => 'All done'];
            }
        }
    }
    //return $files;
    return ['msg' => 'All done'];
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
