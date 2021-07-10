<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'order' => 'required|numeric',
           'name' => 'required|unique:pages,name|min:3|max:30',
            'status' => 'required|in:on,off',
        ]);

        $name = ucwords(strtolower($request->input('name')));
        $link = "/".str_replace(' ', '', strtolower($request->input('name')));

        $page = Page::create([
            "order" => $request->input('order'),
            "name" => $name,
            "link" => $link,
            "status" => $request->input('status'),
        ]);

        return redirect()->route('admin.pages.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'order' => 'required|numeric',
            'name' => 'required|min:3|max:30',
            'status' => 'required|in:on,off',
        ]);

        $name = ucwords(strtolower($request->input('name')));
        $link = "/".str_replace(' ', '', strtolower($request->input('name')));

        $page->update([
            "order" => $request->input('order'),
            "name" => $name,
            "link" => $link,
            "status" => $request->input('status'),
        ]);

        return redirect()->route('admin.pages.edit', ['page' => $page->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index');
    }

    public function changeStatus(Request $request, $page)
    {

        Page::where('id', $page)
            ->update([
                "status" => $request->input('status'),
            ]);

        return redirect()->route('admin.pages.index');
    }
}
