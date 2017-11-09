# Workflow
Workflow management for easily manage states and transitions in a business prosess

## Install Laravel :
```bash
$ composer create-project --prefer-dist laravel/laravel project-name "5.4.*"
```

## Install package :

```bash
$ composer bantenprov/workflow "1.0.0"
```

## Edit config/app.php
#### providers

```php
'providers' => [
    ...
    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    ...
    Collective\Html\HtmlServiceProvider::class,
    'That0n3guy\Transliteration\TransliterationServiceProvider',
    Bantenprov\Workflow\WorkflowServiceProvider::class,
```

### aliases
```php
'aliases' => [
    ...
    'Storage' => Illuminate\Support\Facades\Storage::class,
    'URL' => Illuminate\Support\Facades\URL::class,
    'Validator' => Illuminate\Support\Facades\Validator::class,
    'View' => Illuminate\Support\Facades\View::class,
    ...
    'Form' => Collective\Html\FormFacade::class,
    'Html' => Collective\Html\HtmlFacade::class,
    'Workflow' => Bantenprov\Workflow\Facades\Workflow::class,
```

## Artisan command :

```bash
$ php artisan vendor:publish --tag=workflow_migration
$ php artisan vendor:publish --tag=workflow_view
$ php artisan migrate
```

## Contoh penggunaan :

### Trait :
**1. WorkflowStateTrait**

```php
use Bantenprov\Workflow\Traits\WorkflowStateTrait;

class WorkflowStateController extends Controller
{
    use WorkflowStateTrait;

    public function index()
    {
        return WorkflowStateTrait::stateIndex();
    }
}
```

**2. WorkflowTransitionTrait**
```php
use Bantenprov\Workflow\Traits\WorkflowTransitionTrait;

class WorkflowTransitionController extends Controller
{
    use WorkflowTransitionTrait;

    public function index()
    {
        return WorkflowStateTrait::transitionIndex();
    }
}
```


**WorkflowStateTrait**

<div class="tg-wrap"><table class="tg">
  <tr>
    <th class="tg-amwm">#<br></th>
    <th class="tg-amwm">Method</th>
    <th class="tg-amwm">NULL</th>
    <th class="tg-amwm">Default</th>
    <th class="tg-amwm">Ex</th>
    <th class="tg-amwm">Type</th>
  </tr>
  <tr>
    <td class="tg-yw4l">1</td>
    <td class="tg-yw4l">stateIndex($page = 10)</td>
    <td class="tg-amwm">Y</td>
    <td class="tg-yw4l">10</td>
    <td class="tg-yw4l">$page=10</td>
    <td class="tg-yw4l">Integer</td>
  </tr>
  <tr>
    <td class="tg-yw4l">2</td>
    <td class="tg-yw4l">stateCreate()</td>
    <td class="tg-amwm">Y</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">-</td>
  </tr>
  <tr>
    <td class="tg-yw4l">3</td>
    <td class="tg-yw4l">stateStore($request,= array())</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$request-&gt;all()</td>
    <td class="tg-yw4l">Array<br></td>
  </tr>
  <tr>
    <td class="tg-yw4l">4</td>
    <td class="tg-yw4l">stateEdit($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-<br></td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer<br></td>
  </tr>
  <tr>
    <td class="tg-yw4l">5</td>
    <td class="tg-yw4l">stateUpdate($request= array(), $id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-<br></td>
    <td class="tg-yw4l">$request-&gt;all()<br>$id = 1<br></td>
    <td class="tg-yw4l">Array</td>
  </tr>
  <tr>
    <td class="tg-yw4l">6</td>
    <td class="tg-yw4l">stateActive($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer</td>
  </tr>
  <tr>
    <td class="tg-yw4l">7</td>
    <td class="tg-yw4l">stateDeActive($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer</td>
  </tr>
</table></div>

**WorkflowStateTrait**

<table class="tg">
  <tr>
    <th class="tg-amwm">#<br></th>
    <th class="tg-amwm">Method</th>
    <th class="tg-amwm">NULL</th>
    <th class="tg-amwm">Default</th>
    <th class="tg-amwm">Ex</th>
    <th class="tg-amwm">Type</th>
  </tr>
  <tr>
    <td class="tg-yw4l">1</td>
    <td class="tg-yw4l">transitionIndex($page = 10)</td>
    <td class="tg-amwm">Y</td>
    <td class="tg-yw4l">10</td>
    <td class="tg-yw4l">$page=10</td>
    <td class="tg-yw4l">Integer</td>
  </tr>
  <tr>
    <td class="tg-yw4l">2</td>
    <td class="tg-yw4l">transitionCreate()</td>
    <td class="tg-amwm">Y</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">-</td>
  </tr>
  <tr>
    <td class="tg-yw4l">3</td>
    <td class="tg-yw4l">transitionStore($request = array())</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$request-&gt;all()</td>
    <td class="tg-yw4l">Array<br></td>
  </tr>
  <tr>
    <td class="tg-yw4l">4</td>
    <td class="tg-yw4l">transitionEdit($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-<br></td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer<br></td>
  </tr>
  <tr>
    <td class="tg-yw4l">5</td>
    <td class="tg-yw4l">transitionUpdate($request = array(), $id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-<br></td>
    <td class="tg-yw4l">$request-&gt;all()<br>$id = 1<br></td>
    <td class="tg-yw4l">Array</td>
  </tr>
  <tr>
    <td class="tg-yw4l">6</td>
    <td class="tg-yw4l">transitionActive($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer</td>
  </tr>
  <tr>
    <td class="tg-yw4l">7</td>
    <td class="tg-yw4l">transitionDeActive($id)</td>
    <td class="tg-amwm">N</td>
    <td class="tg-yw4l">-</td>
    <td class="tg-yw4l">$id = 1<br></td>
    <td class="tg-yw4l">Integer</td>
  </tr>
</table>

**Contoh 2**

```php
//Controller
public function getStateName()
{
    $id = 1;
    return \Workflow::getStateName($id);
}

```

```php
//Controller
public function getTransitionName()
{
    $id = 1;
    return \Workflow::getTransitionName($id);
}

```
