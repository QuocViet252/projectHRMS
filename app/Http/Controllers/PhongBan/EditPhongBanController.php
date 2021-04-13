<?php

namespace App\Http\Controllers\PhongBan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PhongBan;
class EditPhongBanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $editPhongBan = PhongBan::find($id);
        
        return view('admin.Department.danhsach',compact('editPhongBan'));
    }
    public function postSua(Request $request,$id)
    {
        $phongban = PhongBan::find($id);
        $phongban->name = $request->name;
        $checkActiveOrClose = $request->get('group1');
        if( $checkActiveOrClose == 'active' ){
            $phongban->tinhtrang = "Hoạt động";
        }
        else if($checkActiveOrClose == 'close'){
            $phongban->tinhtrang = "Tạm ngừng";
        }
        
        if($phongban->save()){
            
            

            return redirect('phongban')->with('success',__('Bạn đã chỉnh sửa phòng ban thành công'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
