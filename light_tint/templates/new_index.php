<?php
    include("../top.php");
?>

<nav class = "navbar navbar-expand-lg navbar-light">

      <a href = "index.php" class = "navbar-brand ml-3 "> <span style = "color:black;">LIGH</span><span style = "color:yellow;">T</span><span style = "color:black;">INT</span> </a>

      <button class = "navbar-toggler" type="button" data-toggle="collapse" data-target = "#navbarMenu"
      aria-controls="navbarMenu" aria-expanded = "false" aria-label="Toggle Navigation">

      <span class="navbar-toggler-icon"></span>
      </button>

      <!-- <div class="collapse navbar-collapse"></div>  THIS "CENTERS THE NAV"-->
      <!-- Below is code for the collapsable navbarMenu, try resizing page so you you can see the "hamburger" button.-->
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav mr-auto" >
          <li class="nav-item active">
            <a href="index.php" class="nav-link">Home </a>
          </li>
          <!-- <li class="nav-item">
            <a href="form2.php" class="nav-link">Form</a>
          </li> -->
          <li class="nav-item">
            <a href="#" class="nav-link">Code</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">References</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact Us</a>
          </li>

        </ul>

        <form action = "templates/new_index.php" method="get" class="form-inline my-2 my-lg-0">
          <button class="btn menu-right-btn border" type="submit">
            Application
          </button>
        </form>

      </div>

    </nav>

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
