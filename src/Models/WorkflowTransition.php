<?php 

namespace Bantenprov\Workflow\Models;


use Illuminate\Database\Eloquent\Model;

class WorkflowTransition extends Model
{
    protected $table ='workflow_transitions';
    protected $fillable = ['name','label','from','to','message','status'];
}
