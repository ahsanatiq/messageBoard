<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','auth.role'], ['except' => 'view']);
        $this->middleware('first.login');
    }

    public function index()
    {
        $pages = Page::all();
        return view('pages.index', compact('pages'));
    }

    public function add() {
        return view('pages.add');
    }

    public function create(Request $request) {
        $rules = Page::$rules;
        $this->validate($request, $rules);

        Page::create([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'menu_name' => $request->input('menu_name'),
            'status' => $request->input('status'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('pages.index')
            ->with(['status'=>'success'])
            ->with(['message'=>'Page successfully created']);
    }

    public function edit($id) {
        $page = Page::find($id);
        return view('pages.edit', compact('page'));
    }

    public function update($id, Request $request) {
//        $rules = array_except(Page::$rules,['email']);
        $this->validate($request, Page::$rules);

        $page = Page::find($id);
        $page->update([
            'name' => $request->input('name'),
            'detail' => $request->input('detail'),
            'menu_name' => $request->input('menu_name'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('pages.index')
            ->with(['status'=>'success'])
            ->with(['message'=>'Page successfully updated']);
    }

    public function delete(Request $request) {
        Page::destroy($request->input('id'));
        return redirect()->route('pages.index');
    }

    public function view($id) {
        $page = Page::find($id);
        return view('pages.view',compact('page'));
    }
}
