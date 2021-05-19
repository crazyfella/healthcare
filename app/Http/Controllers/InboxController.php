<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inbox;
use Illuminate\Support\Facades\DB;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Inbox::all();
    
        return view('admin.inbox.index')->with('inbox',$data);
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
        $request->validate([
            'name'           => 'required',
            'address'        => 'required',
            'email'          => 'required|email',
            'phone'          => 'required|numeric',
            'message'        => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

       Inbox::create([
           'name'          => $request->name,
           'address'       => $request->address,
           'email'         => $request->email,
           'phone'         => $request->phone,
           'message'       => $request->message,
           'title'         => $request->title
       ]);

       return back()
                        ->with('success','Form is successfully Submitted.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inbox $inbox)
    {
     
        Inbox::where('id',$inbox->id)->update(['status'  => '1']);
        return view('admin.inbox.show',compact('inbox'));
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
    public function destroy(Inbox $inbox)
    {
        $inbox->delete();
        
        return redirect()->route('inbox.index')
            ->with('success', 'Message deleted successfully');
    }

    public function delete($id)
    {
        $inbox = Inbox::find($id);
        return view('admin.inbox.delete', compact('inbox'));
    }
    
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::table("inboxes")->whereIn('id',explode(",",$ids))->delete();
        return response()->json(['success'=>"Messages Deleted successfully."]);
    }

}
