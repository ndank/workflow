1. Complete the method in workflow class  
   - State :
     - getStateStatus($id)
     - getStateLabel($id)
     - addNewState($request = array())
     - destroyStateById($id)
     - destoryStateByName($name)
   - Transition :
     - getTransitionStatus($id)
     - getTransitionLabel($id)
     - getTransitionFrom($id)
      - getTransitionTo($id)
     - addNewTransition($request = array())
     - destroyTransitionById($id)
     - destoryTransitionByName($name)
2. Add desktop notification when transition was change (@ahmad)
3. Add mail notification when transition was change (@moey)
4. Add activity log when transition change (@desta)
