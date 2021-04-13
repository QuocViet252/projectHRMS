<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = Branch::all();
        return view('admin.Branch.branch', compact('branch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Branch.add_branch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch = new Branch();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = $image->getClientOriginalName();
            $name = time().'_'.$file;
            $destinationPath = public_path('project_asset/images/image_branch/');
            $image->move($destinationPath, $name);
        }

        $branch->name_branch = $request->name_branch;
        $branch->image_branch = $request->image_branch;
        $branch->director_branch = $request->director_branch;
        $branch->email_branch = $request->email_branch;
        $branch->phone_branch = $request->phone_branch;
        $branch->local_branch = $request->local_branch;
        $branch->save();
        return redirect('branch');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        return view('admin.Branch.update_branch', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file = $image->getClientOriginalName();
            $name = time().'_'.$file;
            $destinationPath = public_path('project_asset/images/image_branch/');
            $image->move($destinationPath, $name);
        }

        $branch->name_branch = $request->name_branch;
        $branch->image_branch = $request->image_branch;
        $branch->director_branch = $request->director_branch;
        $branch->email_branch = $request->email_branch;
        $branch->phone_branch = $request->phone_branch;
        $branch->local_branch = $request->local_branch;
        $branch->save();
        return redirect('branch')->with('message', 'CẬP NHẬT THÀNH CÔNG!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Branch::find($id)->delete();
        return redirect('branch');
    }
}
