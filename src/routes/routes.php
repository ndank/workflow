<?php

Route::group(['prefix' => 'workflow'], function() {
    Route::get('demo', 'Bantenprov\Workflow\Http\Controllers\WorkflowController@demo');
});

// state add route (GET)
Route::get('/workflow/state/create', 'Bantenprov\Workflow\Http\Controllers\WorkflowStateController@create')->name('stateFormCreate');

// state list route (GET)
Route::get('/workflow/state', 'Bantenprov\Workflow\Http\Controllers\WorkflowStateController@index')->name('state');

// state active route (GET)
Route::get('/workflow/state/{id}/active', 'Bantenprov\Workflow\Http\Controllers\WorkflowStateController@Active')->name('stateActive');

// state deactive route (GET)
Route::get('/workflow/state/{id}/deactive', 'Bantenprov\Workflow\Http\Controllers\WorkflowStateController@DeActive')->name('stateDeactive');

// state edit view route (GET)
Route::get('/workflow/state/{id}/edit', 'Bantenprov\Workflow\Http\Controllers\WorkflowStateController@edit')->name('stateFormEdit');

// state add action route (POST)
Route::post('/workflow/state/add', 'Bantenprov\Workflow\Http\Controllers\WorkflowStateController@store')->name('stateStore');

// state edit action route (POST)
Route::post('/workflow/state/{id}/edit', 'Bantenprov\Workflow\Http\Controllers\WorkflowStateController@update')->name('stateUpdate');



/*Workflow transition*/

    // transition add route (GET)
Route::get('/workflow/transition/create', 'Bantenprov\Workflow\Http\Controllers\WorkflowTransitionController@create')->name('transitionFormCreate');
    
// transition list route (GET)
Route::get('/workflow/transition', 'Bantenprov\Workflow\Http\Controllers\WorkflowTransitionController@index')->name('transition');

// transition active route (GET)
Route::get('/workflow/transition/{id}/active', 'Bantenprov\Workflow\Http\Controllers\WorkflowTransitionController@Active')->name('transitionActive');

// transition deactive route (GET)
Route::get('/workflow/transition/{id}/deactive', 'Bantenprov\Workflow\Http\Controllers\WorkflowTransitionController@DeActive')->name('transitionDeactive');

// transition edit view route (GET)
Route::get('/workflow/transition/{id}/edit', 'Bantenprov\Workflow\Http\Controllers\WorkflowTransitionController@edit')->name('transitionFormEdit');

// transition add action route (POST)
Route::post('/workflow/transition/add', 'Bantenprov\Workflow\Http\Controllers\WorkflowTransitionController@store')->name('transitionCreate');

// transition edit action route (POST)
Route::post('/workflow/transition/{id}/edit', 'Bantenprov\Workflow\Http\Controllers\WorkflowTransitionController@update')->name('transitionUpdate');
