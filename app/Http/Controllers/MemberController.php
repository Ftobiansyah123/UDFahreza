<?php

namespace App\Http\Controllers;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        $member = Member::all();
        return view('member.index', compact('member'));
    }
    public function create() {
        $member = Member::all();
        $Referensi = uniqid();
        return view('member.create', compact('member', 'Referensi'));
    }
    public function store(Request $request) {

        $request->validate([
           'noReferensi' => 'required',
           'namamember' => 'required',
           'nomortelpon' => 'required',
           'discount' => 'required',
          


       ]);
       Member::create($request->all());
       
       return redirect()->route('member');
   }
   public function edit($id){
   
 
    $member =Member::find($id);
    Return view('member.edit', compact('member'));
}

public function update(Request $request, $id){
    $member =Member::find($id);
    $member->update($request->all());
   
    return redirect()->route('member');
}

public function destroy($id){
    $member =Member::find($id);
    $member->delete();
    return redirect()->route('member');
}
}
