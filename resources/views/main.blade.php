@extends('layouts.index',['title'=>'Главная'])

@section('content')
    <div class="mainForm">
        <form action="{{ route('mainPage') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputText">Текст на проверку</label>
                <textarea class="form-control" id="exampleInputText" name="checkText"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Проверить</button>
        </form>
    </div>
@endsection

