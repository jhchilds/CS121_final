<?php
    include("../top.php");
    include("../header.php");
?>
<body>
<div ng-controller="RelaysController">
  <div>
    <h1 ng-bind="header"></h1>
  </div>
  <div>
    <table class="table table-hover">
      <thead class="thead-default">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>State</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="item in relays">
          <td class="vert-align" ng-bind="item.id"></td>
          <td class="vert-align">
            <b ng-bind="item.name"></b>
          </td>
          <td class="vert-align">
          <img ng-src=[[item.image]] ng-click="toggleRelay(item)">
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</body>

</html>
