<?php

use App\Models\User;


it('token can be requested with credentials', function () {
    $user = User::factory()->create();
    $response = $this->post('/api/auth', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    expect($response)
        ->not->toBeEmpty()
        ->and($response->json('token'));
});

it('can not be requested without credentials', function () {
    $response = $this->post('/api/auth');

    expect($response->json('errors'))
        ->toEqual(['email' => ['The email must be a valid email address.'], 'password' => ['The password must be at least 8 characters.']]);
})->throws('Illuminate\Validation\ValidationException');

it('can be logout', function () {
    $user = User::factory()->create();
    $responseAuth = $this->post('/api/auth', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $token = $responseAuth->json('token');

    $response = $this->withHeaders([
        'Authorization' => 'Bearer ' . $token
    ])->post('/api/logout');

    expect($response->json('message'))->toEqual('Successfully logged out');
});

it('can not be logout without token', function () {
    $response = $this->post('/api/logout');

    expect($response->json('message'))->toEqual('Unauthenticated');
})->throws('Illuminate\Auth\AuthenticationException');
