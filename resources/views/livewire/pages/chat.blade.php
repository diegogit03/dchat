<?php

use function Livewire\Volt\{state, layout, computed};
use Illuminate\Support\Facades\Auth;
use App\Models\Chat;
use App\Models\User;

layout('layouts.app');

state([
    'chatId' => false
]);

$chats = computed(function () {
    $user_id = Auth::id();
    return Chat::allFromUser($user_id);
});

$selectedChat = computed(function () {
    $chat = Chat::find($this->chatId);
    $chat->load('messages');
    return $chat;
});

$selectChat = function ($chatId) {
    $this->chatId = $chatId;
    unset($this->selectedChat);
}

?>

<div class="container-fluid h-100">
    <div class="row bg-white h-100">
        <div class="col-3 h-100 p-0">
            <div class="bg-light h-100 px-2" style="overflow-y: auto">
                @foreach ($this->chats as $chat)
                    <div wire:click='selectChat({{ $chat->id }})' class="d-flex align-items-center contact" style="height: 100px;">
                        <div style="width: 20%; margin-right: 20px">
                            <img src="https://avatar.iran.liara.run/public/boy" alt="" class="w-100">
                        </div>
                        <div style="width: 80%">
                            <h3 class="fs-5">{{ $chat->users[$chat->users[0]->id === Auth::id() ? 1 : 0]->name }}</h3>
                            <span>Olá, tudo bem?</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if($chatId)
            <div class="col-9 h-100 d-grid" style="grid-template-rows: 100px 1fr 50px">
                <header class="d-flex" style="height: 100px;">
                    <div class="d-flex align-items-center" style="width: 5%; margin-right: 20px">
                        <img src="https://avatar.iran.liara.run/public/boy" alt="" class="w-100">
                    </div>
                    <div style="width: 90%" class="h-100 d-flex align-items-center">
                        <h3 class="fs-5">Diego</h3>
                    </div>
                </header>
                <main style="overflow-y: scroll">
                    @foreach ($this->selectedChat->messages as $message)
                    {{-- <div class="bg-light p-2 rounded text-start d-block" style="width: fit-content">
                        Olá, tudo bem?
                    </div> --}}
                    <div class="bg-primary p-2 rounded text-end text-white" style="width: fit-content; margin-left: auto">
                        {{ $message->content }}
                    </div>
                    @endforeach
                </main>
                <footer>
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Digite sua mensagem aqui">
                            <button class="btn btn-primary input-group-text d-flex align-items-center justify-content-center"><i class="bi bi-send"></i></button>
                        </div>
                    </form>
                </footer>
            </div>
        @else
            <div class="col-9 h-100 d-flex justify-content-center align-items-center">
                Selecione algum contato.
            </div>
        @endif
    </div>
</div>
