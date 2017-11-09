<?php

namespace Bantenprov\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Workflow\Facades\Workflow;
use Bantenprov\Workflow\Models\WorkflowTransition;
use Bantenprov\Workflow\Models\WorkflowState;
use That0n3guy\Transliteration;

class WorkflowStateController extends Controller
{
    
    public function index()
    {
        $states = WorkflowState::paginate(10);
                        
        return view('workflow.state.index',compact('states'));
    }
    
    public function create()
    {
        return view('workflow.state.create');
    }
    
    public function store(Request $request)
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
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $state = WorkflowState::where('id',$id)->first();
        
        return view('workflow.state.edit',['state' => $state]);
    }
    
    public function update(Request $request, $id)
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

    public function Active($id){
        WorkflowState::where('id',$id)->update(['status' => 1]);

        return redirect()->back();
    }

    public function DeActive($id){
        WorkflowState::where('id',$id)->update(['status' => 0]);

        return redirect()->back();
    }
    
    public function destroy($id)
    {
        //
    }
}
