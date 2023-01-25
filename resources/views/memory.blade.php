@extends('layouts.index',['title'=>'История проверок'])

@section('content')
    @if(isset($dataMemory[0]))
        <style>
            body {
                height: auto;
            }
        </style>
        <div class="memoryContainer">
            @foreach($dataMemory as $data)
                <div class="alert alert-secondary" role="alert">
                    <p>Запрос: <?php echo $data->form_text ?></p>
                    <p>Основной язык: <?php echo $data->lang ?></p>
                </div>
            @endforeach
        </div>
    @else
        <dvi class="d-flex flex-column">
            <h1>Вы ещё не сделали не одной проверки</h1>
            <a href="{{ route('mainPage') }}">Перейти к созданию</a>
        </dvi>

    @endif
@endsection

