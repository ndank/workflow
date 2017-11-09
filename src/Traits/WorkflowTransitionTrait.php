<?php

namespace Bantenprov\Workflow\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Workflow\Facades\Workflow;
use Bantenprov\Workflow\Models\WorkflowTransition;
use Bantenprov\Workflow\Models\WorkflowState;
use That0n3guy\Transliteration;

trait WorkflowTransitionTrait
{
    public static function transitionIndex($page = 10)
    {

        $transitions = WorkflowTransition::paginate($page);
        $state = array();
  
        return view('workflow::workflow.transition.index',compact('transitions'));
    }
    
    public static function transitionCreate()
    {
        $states = WorkflowState::all();
        
        return view('workflow::workflow.transition.create',compact('states'));
    }

    public static function transitionStore($request = array())
    {
        $name = str_replace('_','-',\Transliteration::clean_filename(strtolower($req->label)));
        $label = $request->label;
        $from = join(',',$request->from);
        $to = join(',',$request->to);
        $message = $request->message;

        try
        {
            WorkflowTransition::create([
                            'name' => $name,
                            'label' => $label,
                    'from' => $from,
                    'to' => $to,
                    'message' => $message
                ]);
        }
        catch(\Illuminate\Database\QueryException $e){
            // do what you want here with $e->getMessage();
            return redirect()->route('transition')->with('message', 'Error');
        }

    	return redirect()->route('transition')->with('message', 'Add data success');
    }    

    public static function transitionEdit($id)
    {
        $transition = WorkflowTransition::where('id',$id)->first();
        $states = WorkflowState::all();

        return view('workflow::workflow.transitionedit',['transition' => $transition, 'states' => $states]);
    }

    public static function transitionUpdate($request = array(), $id)
    {
        $name = str_replace('_','-',\Transliteration::clean_filename(strtolower($request->label)));
        $label = $request->label;
        $from = join(',',$request->from);
        $to = $request->to;

        try
        {
          WorkflowTransition::where('id',$id)->update([
                                                      'label' => $label,
                                                      'name' => $name,
                                                      'from' => $from,
                                                      'to' => $to
                                                    ]);
        }
        catch(\Illuminate\Database\QueryException $e){
            // do what you want here with $e->getMessage();
            return redirect()->route('transition')->with('message', 'Error');
        }



        return redirect()->route('transition')->with('message', 'Update data success');
    }

    public static function transitionActive($id){
        WorkflowTransition::where('id',$id)->update(['status' => 1]);

        return redirect()->back();
    }

    public static function transitionDeActive($id){
        WorkflowTransition::where('id',$id)->update(['status' => 0]);

        return redirect()->back();
    }

}
