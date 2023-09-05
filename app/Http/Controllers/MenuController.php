<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::orderBy('id','desc')->get();
        return view('menu.index')->with('menus',$menus);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menus = Menu::where('is_active',1)->orderBy('id','desc')->get();
        return view('menu.create')->with('menus',$menus);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $menu = new Menu();
        $menu->menu_name = $request->input('menu_name');
        $menu->slug = $request->input('slug');
        $menu->parent_id = $request->input('parent_id',0);
        $menu->font_size = $request->input('font_size');
        $menu->color = $request->input('font_color');
        $menu->is_active = $request->input('is_active',0);
        $menu->save();
        return redirect()->route('menus.index')->with('success','Menu has been created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
        $menus = Menu::where('id','!=',$menu->id)->orderBy('id','desc')->get();
        echo $menu->menu_name;
        return view('menu.edit')->with('menu',$menu)->with('menus',$menus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        
        $menu->menu_name = $request->input('menu_name');
        $menu->slug = $request->input('slug');
        $menu->parent_id = $request->input('parent_id',0);
        $menu->font_size = $request->input('font_size');
        $menu->color = $request->input('font_color');
        $menu->is_active = $request->input('is_active',0);
        $menu->save();
        return redirect()->route('menus.index')->with('success','Menu has been updtaed successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success','Menu has been deleted successfully.');
    }

    public function displayTreeMenu()
    {
        $menu = new \App\Models\Menu;
        $menuList = $menu->tree();
        return view('menu.list')->with('menulist', $menuList);

    }

    public function search(Request $request) {

        $menus = Menu::where('menu_name', 'like', '%' . $request->get('search') . '%')->get();
        return view('menu.index')->with('menus',$menus);

        
        
    }
}
