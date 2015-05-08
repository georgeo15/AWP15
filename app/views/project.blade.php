
 
 @extends('layout.main')
  <div class="container" ng-app="store">

     <div id="todos" ng-controller="TodoCtrl">
      <h3 class="page-header">
        <small ng-if="remaining()">{{remaining()}}</small>
      </h3>
      <ul class="unstyled"><li ng-repeat="todo in todos">
        <input type="checkbox" ng-model="todo.done">{{todo.text}}
      </li></ul>
    </div>
   </div>
  

