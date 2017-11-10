1. Complete the method in workflow class  
1.1. State :
  - getStateStatus($id)
  - getStateLabel($id)
  - addNewState($request = array())
  - destroyStateById($id)
  - destoryStateByName($name)
1.2. Transition :
  - getTransitionStatus($id)
  - getTransitionLabel($id)
  - getTransitionFrom($id)
  - getTransitionTo($id)
  - addNewTransition($request = array())
  - destroyTransitionById($id)
  - destoryTransitionByName($name)
2. Add desktop notification when transition was change
3. Add mail notification when transition was change
