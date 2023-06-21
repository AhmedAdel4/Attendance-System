<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddGroupRequest;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Groups = Group::paginate(20);
        return view('Group.index',['Groups' => $Groups]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Group.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddGroupRequest $request)
    {
        $data = $request->validated();
        Group::insert($data);
        return redirect(route('Group.index'))->with('success','Data Saved Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Group = Group::find($id);
        return view('Group.edit',['Group' => $Group]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddGroupRequest $request, $id)
    {
        Group::whereId($id)->update($request->validated());
        return redirect(route('Group.index'))->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $Group = Group::find($id);
        $Group->delete();
        return redirect(route('Group.index'))->with('success','Data Deleted Successfully');
    }
}
