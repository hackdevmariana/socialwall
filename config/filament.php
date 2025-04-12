<?php

return [
    'auth' => [
        'guard' => 'web',
        'user_model' => App\Models\User::class,
        'check' => fn ($user) => $user && $user->hasRole('admin') ? [$user] : [],
    ],
];
