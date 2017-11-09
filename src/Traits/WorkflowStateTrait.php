<?php

namespace Bantenprov\Workflow\Traits;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Workflow\Facades\Workflow;
use Bantenprov\Workflow\Models\WorkflowTransition;
use Bantenprov\Workflow\Models\WorkflowState;
use That0n3guy\Transliteration;

trait WorkflowStateTrait
{
    public static function stateIndex($page = 10)
    {
        $states = WorkflowState::paginate($page);
                        
        return view('workflow::workflow.state.index',compact('states'));
    }
    
    public static function stateCreate()
    {
        return view('workflow::workflow.state.create');
    }
    
    public static function stateStore($request  = array())
    {
        $name = \Transliteration::clean_filename(strtolower($request->label));
        $label = $request->label;

        try
        {
            WorkflowState::create([
                            'name' => $name,
                            'label' => $label,
                ]);
        }
        catch(\Illuminate\Database\QueryException $e){
            // do what you want here with $e->getMessage();
            return redirect()->route('state')->with('message', 'Error');
        }

        return redirect()->route('state')->with('message', 'Add data success');
    }    
    
    public static function stateEdit($id)
    {
        $state = WorkflowState::where('id',$id)->first();
        
        return view('workflow::workflow.state.edit',['state' => $state]);
    }
    
    public static function stateUpdate($request  = array(), $id)
    {
        $name = \Transliteration::clean_filename(strtolower($request->label));
        $label = $request->label;

        try
        {
          WorkflowState::where('id',$id)->update(['label' => $label, 'name' => $name]);
        }
        catch(\Illuminate\Database\QueryException $e){
            // do what you want here with $e->getMessage();
            return redirect()->route('state')->with('message', 'Error');
        }

        return redirect()->route('state')->with('message', 'Update data success');
    }

    public static function stateActive($id){
        WorkflowState::where('id',$id)->update(['status' => 1]);

        return redirect()->back();
    }

    public static function stateDeActive($id){
        WorkflowState::where('id',$id)->update(['status' => 0]);

        return redirect()->back();
    }        
}
