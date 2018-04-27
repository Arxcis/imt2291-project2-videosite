<?php
use MVC\Core\Route;
use MVC\Http\Request;
use App\Models\UsersModel;

// Route::get('/', 'SimpleJSONController.hello')
//     ->withMiddlewares(['IsAuthenticated']);
Route::get('/hello', 'SimpleJSONController.sayHelloJSON');

Route::get('/', function() {
    
    return ['hey'];
});

// ->withMiddlewares(['IsAuthenticated'])
//->withValidators(['UserValidations.login']);


Route::post('/user/login', 'AuthController.postLogin')
    ->withValidators(['UserValidations.login']);

Route::post('/user/register', 'AuthController.postRegister')
    ->withValidators(['UserValidations.register']);

Route::put('/user/password', 'AuthController.putPassword')
    ->withMiddlewares(['IsAuthenticated'])
    ->withValidators(['UserValidations.changePassword']);

Route::post('/user/refresh', 'AuthController.refreshToken')
    ->withMiddlewares(['IsAuthenticated']);



// VideosController
Route::post('/video', 'VideosController.postVideo')
    ->withMiddlewares(['IsAuthenticated']);

Route::put('/video/{videoid}', 'VideosController.putVideo')
    ->withMiddlewares(['IsAuthenticated']);

    // VideoTagController requiered before VideosController
    Route::delete('/video/{videoid}/tag/{tagname}', 'VideoTagsController.deleteTag')
        ->withMiddlewares(['IsAuthenticated']);
        
Route::delete('/video/{videoid}', 'VideosController.deleteVideo')
    ->withMiddlewares(['IsAuthenticated']);


// FilesController
Route::post('/tempfile', 'FilesController.postTempfile')
    ->withMiddlewares(['IsAuthenticated']);


// UsersController
Route::get('/user', "UsersController.getUser");

Route::put('/user', 'UsersController.putUser')
    ->withMiddlewares(['IsAuthenticated']);

Route::delete('/user', 'UsersController.deleteUser')
    ->withMiddlewares(['IsAuthenticated']);


// PlaylisTagController
Route::post('/playlist/{playlistid}/tag', 'PlaylistTagController.postTag')
    ->withMiddlewares(['IsAuthenticated']);

Route::delete('/playlist/{playlistid}/tag/{tagname}', 'PlaylistTagController.deleteTag')
    ->withMiddlewares(['IsAuthenticated']);


// VideoTagController
Route::post('/video/{videoid}/tag', 'VideoTagsController.postTag')
    ->withMiddlewares(['IsAuthenticated']);

// Route::get('adsfgnjwd', 'gnrgwklgweg')
//     ->withMiddlewares(['IsAuthenticated'])
//     ->withValidators(['FileName.function.function.function']);

Route::get('error', function() {
    return \MVC\Http\Response::statusCode(201, "hello world");
});


Route::get('test', functioN() {
    $users = new UsersModel();
    $users->search([
        'name' => 'username'
    ], 2);
    var_dump($users);
});

Route::get('graphql', 'GraphQLController.query');
Route::post('graphql', 'GraphQLController.query');


// Error class
Route::notFound(function() {
    echo "404 not found";
});

Route::onInternal(function() {
    die("ERROR 500");
    // return MVC\Core\View::render('500');
});
