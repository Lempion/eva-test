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

            preg_match_all('/[а-яё]/ui', $text, $matches);
            $ruChars = count($matches[0]);
            preg_match_all('/[a-z]/ui', $text, $matches);
            $enChars = count($matches[0]);

            if ($ruChars >= $enChars) {
                $text = preg_replace('/([a-z])/ui', '<strong>\1</strong>', $text);
                $lang = 'ru';
            } else {
                $text = preg_replace('/([а-яё])/ui', '<strong>\1</strong>', $text);
                $lang = 'en';
            }

            if (!session('addedBase')) {
                $post = new TestMemory();

                $post->lang = $lang;
                $post->form_text = $text;

                $post->save();

                session(['addedBase' => 'true']);

            }

            session(['oldText' => $text]);
        }

        return redirect()->route('mainPage');

    }

    public function clearData(Request $request)
    {
        session()->forget(['oldText', 'addedBase']);
        return redirect()->route('mainPage');
    }
}
