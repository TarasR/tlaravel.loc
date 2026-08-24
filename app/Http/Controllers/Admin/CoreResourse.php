<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;

class CoreResourse extends Controller
{
    public function index()
    {
        $pages = Page::all();

        return view('pages.index', ['pages' => $pages, 'title' => 'Pages']);
    }

    public function create()
    {
        return view('pages.create', ['title' => 'Create page']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'alias' => 'required|string|max:255|unique:pages,alias',
            'text'  => 'required|string',
        ]);

        Page::create($request->only('name', 'alias', 'text'));

        return redirect()->route('pages.index')->with('message', 'Page created.');
    }

    public function show($id)
    {
        $page = Page::findOrFail($id);

        return view('pages.show', ['page' => $page, 'title' => $page->name]);
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('pages.edit', ['page' => $page, 'title' => 'Edit page']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'alias' => 'required|string|max:255|unique:pages,alias,' . $id,
            'text'  => 'required|string',
        ]);

        Page::findOrFail($id)->update($request->only('name', 'alias', 'text'));

        return redirect()->route('pages.index')->with('message', 'Page updated.');
    }

    public function destroy($id)
    {
        Page::findOrFail($id)->delete();

        return redirect()->route('pages.index')->with('message', 'Page deleted.');
    }
}
