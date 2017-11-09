<?php namespace Bantenprov\Workflow\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\Workflow\Facades\Workflow;
use Bantenprov\Workflow\Models\WorkflowTransition;
use Bantenprov\Workflow\Models\WorkflowState;
use That0n3guy\Transliteration;

/**
 * The WorkflowController class.
 *
 * @package Bantenprov\Workflow
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class WorkflowController extends Controller
{
    public function demo()
    {
        return Workflow::welcome();
    }
}
