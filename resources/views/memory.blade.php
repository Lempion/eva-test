@extends('layouts.index',['title'=>'История проверок'])

@section('content')
    <style>
        body { height: auto;}
    </style>
    <div class="memoryContainer">
        @foreach($dataMemory as $data)
            <div class="alert alert-secondary" role="alert">
                <p>Запрос: <?php echo $data->form_text ?></p>
                <p>Основной язык: <?php echo $data->lang ?></p>
            </div>
        @endforeach
    </div>

@endsection

