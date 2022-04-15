<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $validated = preg_match("/^([a-zA-Z0-9\s_-])+$/", $request->keyword);

        if ($validated == 1) {
            // return redirect()->back()->with('message', "$request->keyword");;
            return redirect()->to("search/$request->keyword");
        } else if ($validated == 0) {
            return redirect()->back()->with('message', 'The keyword must not contains special character outside (space [ ]) (underscore [_]) and (hyphene [-])');
        } else {

            return print_r($validated);
        }

        return $validated;
    }

    public function search_result(string $keyword)
    {
        $not_done = Todo::where('completed', 0)->where(function ($q) use ($keyword) {
            $q->where('subject', 'like', "%$keyword%")->orWhere('detail', 'like', "%$keyword%");
        })->orderBy('deadline', 'asc')->paginate(5, ['*'], 'not_done');

        $done = Todo::where('completed', 1)->where(function ($q) use ($keyword) {
            $q->where('subject', 'like', "%$keyword%")->orWhere('detail', 'like', "%$keyword%");
        })->paginate(8, ['*'], 'done');

        return view('List.ListAll', [
            'not_done' => $not_done,
            'done' => $done,
        ]);
    }
}
