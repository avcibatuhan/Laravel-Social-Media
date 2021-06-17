<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\UserActivity;
use App\Models\User;
use App\Models\Post;

use Auth;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::all();
        return view('activities.index', compact('activities'));
    }

    public function addUserActivity(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'activity_id' => 'required',
            'response' => 'required',
            ]);
        $userActivity = new UserActivity();
        $userActivity->user_id = $request->user_id;
        $userActivity->activity_id = $request->activity_id;
        $userActivity->response=$request->response;
          

        $userActivity->save();
        return redirect()->back()->with('addUserActivity', 'your message,here'); 
    }

    public function deleteUserActivity(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'activity_id' => 'required',
            ]);
        $userActivity = UserActivity::where('user_id',Auth::user()->id)->where('activity_id',$request->activity_id)->delete();
        return redirect()->back()->with('deleteUserActivity', 'Aktiviteden ayrıldınız.'); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
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
            'user_id' => 'required',
            'name' => 'required',
            'location' => 'required',
            'aciklama'=>'required',
            'start_date' => 'required',
            'type' => 'required',
        ]);
        $activity = new Activity();
        $activity->user_id = $request->user_id;
        $activity->name = $request->name;
        $activity->location=$request->location;
        $activity->type=$request->type;
        $activity->start_date=$request->start_date;   
        $activity->aciklama=$request->aciklama;           

        $activity->save();
        return redirect('/activities')->with('addActivity','activity created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        
        $activity=Activity::find($activity->id);
        
        $katilimcilar=$activity->getUser; 
        //echo $katilimcilar;
        $id = Auth::user()->id;
        $katilimDurumu=false;
        foreach($katilimcilar as $katilimci)
        {
            if($katilimci->user_id == $id)
                $katilimDurumu=true;            
                
        }
        //echo $kullanici->id;
        
        
        return view('activities.show', compact(['activity','katilimcilar','katilimDurumu']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Activity $activity,Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'type' => 'required',

            ]);
        $activity->name = $request->name;
        $activity->location = $request->location;
        $activity->type=$request->type;

        $activity->save();
        return redirect('/activities')->with('updateActivity','place updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect('/activities')->with('destroyActivity','activity deleted successfully!');
    }

}
