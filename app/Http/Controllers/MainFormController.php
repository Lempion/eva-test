<?php

namespace App\Http\Controllers;

use App\Models\TestMemory;
use Illuminate\Http\Request;

class MainFormController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function requestsMemory()
    {
        $dataMemory = TestMemory::all()->sortDesc();

        return view('memory', compact('dataMemory'));
    }

    public function store(Request $request)
    {
        if ($text = $request->checkText) {

            $ruChars = countCharsLangInStr($text);

            $enChars = countCharsLangInStr($text, 'en');

            $preparedText = detectLangAndReplace($ruChars, $enChars, $text);

            if (!session('addedBase')) {
                $post = new TestMemory();

                $post->lang = $preparedText['lang'];
                $post->form_text = $preparedText['text'];

                $post->save();

                session(['addedBase' => 'true']);

            }

            session(['oldText' => $preparedText['text']]);
        }

        return redirect()->route('mainPage');

    }

    public function clearData(Request $request)
    {
        session()->forget(['oldText', 'addedBase']);

        return redirect()->route('mainPage');
    }
}
