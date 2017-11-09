<?php 

namespace Bantenprov\Workflow;

use Bantenprov\Workflow\Models\WorkflowTransition;
use Bantenprov\Workflow\Models\WorkflowState;
use That0n3guy\Transliteration;
use Illuminate\Http\Request;
/**
 * The Workflow class.
 *
 * @package Bantenprov\Workflow
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class Workflow
{
    protected $workflowTransition;
    protected $workflowState;

    public function __construct()
    {
        $this->workflowTransition = new WorkflowTransition();
        $this->workflowState = new WorkflowState();        
    }

    public function welcome()
    {
        return 'Welcome to Bantenprov\Workflow package';
    }

    public function getStateName($id)
    {
        return $this->workflowState->where('id',$id)->first()->name;
    }

    public function getTransitionName($id)
    {
        return $this->workflowTranstion->where('id',$id)->first()->name;
    }

    
}
