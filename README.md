# flutter-animated-login-Laravel
Animated Flutter Login for Laravel API with email and password Controller

You will need Laravel as backend and JWT Auth installed and configured.


Also make a route as api/applogin like <br>
Route::post('/applogin',[ <br>
    'uses' => 'AppAuthController@Applogin',<br>
    'as'   => 'Applogin'<br>
]);

