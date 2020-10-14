@extends('layouts.app')

@section('title', 'Criar problema')

@section('menu')
    @component('menu', ['active' => 'problems'])
        
    @endcomponent
@endsection

<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


@section('main')
<main class="box">
    <h1>Criar problema</h1>
    @if ($errors->any())
        <div class="alert danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST">
        @csrf
        <div class="input-group">
            <label for="name">Nome do problema</label>
            <input type="text" name="name" id="name">
        </div>
        <div class="input-group">
            <label for="description">Descrição breve do problema</label>
            <input type="text" name="description" id="description">
        </div>
        <div class="input-group">
            <label for="color">Selecione uma cor para o balão</label>
            <select name="color" id="color">
                <option value="yellow">amarelo</option>
                <option value="red">vermelho</option>
                <option value="blue">azul</option>
                <option value="green">verde</option>
                <option value="purple">roxa</option>
            </select>
        </div>
        <div class="input-group">
            <label for="event_id">Selecione o evento</label>
            <select name="event_id" id="event_id">
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group">
            <label for="text">Descricão detalhada do evento</label>
            <textarea name="text" id="text" cols="30" rows="10"></textarea>
        </div>
        <a class="button" href="/admin/problems">cancelar</a>
        <button type="submit" class="primary">Criar</button>
    </form>
</main>
    
<script>
    CKEDITOR.replace('text');
</script>

@endsection
    