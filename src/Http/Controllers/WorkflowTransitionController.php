<?php

namespace Bantenprov\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Workflow\Facades\Workflow;
use Bantenprov\Workflow\Models\WorkflowTransition;
use Bantenprov\Workflow\Models\WorkflowState;
use That0n3guy\Transliteration;

class WorkflowTransitionController extends Controller
{
    
    public function index()
    {

        $transitions = WorkflowTransition::paginate(10);
        $state = array();
  
        return view('workflow.transition.index',compact('transitions'));
    }
    
    public function create()
    {
        $states = WorkflowState::all();
        
        return view('workflow.transition.create',compact('states'));
    }

    public function store(Request $request)
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $transition = WorkflowTransition::where('id',$id)->first();
        $states = WorkflowState::all();

        return view('workflow.transitionedit',['transition' => $transition, 'states' => $states]);
    }

    public function update(Request $request, $id)
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

    public function Active($id){
        WorkflowTransition::where('id',$id)->update(['status' => 1]);

        return redirect()->back();
    }

    public function DeActive($id){
        WorkflowTransition::where('id',$id)->update(['status' => 0]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
