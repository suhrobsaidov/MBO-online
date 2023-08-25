<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Http\Requests\StoreGroupsRequest;
use App\Http\Requests\UpdateGroupsRequest;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups =Groups::all();
        return view('admin.groups.index' ,compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $group = new Groups();
       $group->number=$request->input('number');
       $group->time=$request->input('time');
       $group->user_id =$request->input('user_id');
        $group->save();
        return response('Успешно Создана Группа ');


    }

    /**
     * Display the specified resource.
     */
    public function show(Groups $groups)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Groups $groups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupsRequest $request, Groups $groups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groups $groups)
    {
        //
    }
}
