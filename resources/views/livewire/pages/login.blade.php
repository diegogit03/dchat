<?php

use function Livewire\Volt\{state, rules, layout};
use Illuminate\Support\Facades\Auth;

layout('layouts.auth');

rules([
    'email' => 'required|email',
    'password' => 'required'
]);

state([
    'email' => '',
    'password' => ''
]);

$login = function () {
    $credentials = $this->validate();

    if (Auth::attempt($credentials)) {
        return $this->redirect('/chat', navigate: true);
    }

    return $this->addError('error', 'Oops, Algo deu errado!');
}

?>

<form wire:submit.prevent='login'>
    <h2 class="text-center">Entrar</h2>
    @error('error')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @enderror
    <div>
        <label for="" class="form-label">E-mail</label>
        <input wire:model='email' type="email" class="form-control @error('email') is-invalid @enderror" placeholder="e-mail">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">Senha</label>
        <input wire:model='password' type="password" class="form-control @error('email') is-invalid @enderror" placeholder="senha">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button class="btn btn-primary w-100 mt-2" type="submit">Entrar</button>
</form>
