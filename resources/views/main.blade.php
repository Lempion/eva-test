@extends('layouts.index',['title'=>'Главная'])
<?php
$currentText = session()->get('oldText');
?>
@section('content')
    <div class="mainForm">
        <form onsubmit="prepareForm()" action="{{ route('store') }}" method="post" id="formSub">
            @csrf
            <div class="form-group">
                <label for="exampleInputText">Текст на проверку</label>
                <input type="hidden" class="form-control" id="exampleInputText"
                       name="checkText" value="<?php echo $currentText ?? ' '?>">
                <div contenteditable="true" class="textContent"
                     id="textContent"><?php echo $currentText ?? ' '?></div>
            </div>
            <button type="submit" <?php echo($currentText ? 'hidden' : '') ?> class="btn btn-primary" id="submit">
                Проверить
            </button>
        </form>
        @if($currentText)
            <form action="{{ route('clearData') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="removeSession()">Ввести новый текст</button>
            </form>
        @endif
    </div>

    <script>
        function prepareForm() {
            document.getElementById('exampleInputText').value = document.getElementById('textContent').textContent;
        }

        window.addEventListener("load", function () {
            let addedBase = <?php echo session()->get('addedBase') ?? 'false'?>;

            if (addedBase) {
                setInterval(() => checkChanges(), 5000);
            }

            function checkChanges() {
                let textDiv = document.querySelector('.textContent').innerHTML;
                let textInp = document.getElementById('exampleInputText').value;

                if (textDiv != textInp) {
                    console.log(textDiv + '|' + textInp);
                    let elClick = document.getElementById('submit');
                    prepareForm();
                    elClick.click();

                }
            }

        });
    </script>
@endsection

