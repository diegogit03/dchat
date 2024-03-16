<?php

use function Livewire\Volt\{state, layout};

layout('layouts.app');

?>

<div class="container-fluid h-100">
    <div class="row bg-white h-100">
        <div class="col-3 h-100 p-0">
            <div class="bg-light h-100 px-2">
                <div class="d-flex align-items-center contact" style="height: 100px;">
                    <div style="width: 20%; margin-right: 20px">
                        <img src="https://avatar.iran.liara.run/public/boy" alt="" class="w-100">
                    </div>
                    <div style="width: 80%">
                        <h3 class="fs-5">Diego</h3>
                        <span>Olá, tudo bem?</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-9 h-100 d-grid" style="grid-template-rows: 100px 1fr 50px">
            <header class="d-flex" style="height: 100px;">
                <div class="d-flex align-items-center" style="width: 5%; margin-right: 20px">
                    <img src="https://avatar.iran.liara.run/public/boy" alt="" class="w-100">
                </div>
                <div style="width: 90%" class="h-100 d-flex align-items-center">
                    <h3 class="fs-5">Diego</h3>
                </div>
            </header>
            <main>
                <div class="bg-light p-2 rounded text-start d-block" style="width: fit-content">
                    Olá, tudo bem?
                </div>
                <div class="bg-primary p-2 rounded text-end text-white" style="width: fit-content; margin-left: auto">
                    Tudo, e contigo?
                </div>
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
    </div>
</div>
