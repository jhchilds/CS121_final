<!DOCTYPE html>
<html lang="en" dir="ltr" ng-app="myApp">
  <head>
    <meta charset="utf-8">
     <meta name = "viewport" content = "width=device-width, initial-scale=1.0">

     <meta name="author" content="Joshua Childs">
     <meta name="description" content="A comprehensive website/application for the 2018 UVM CS Fair.
           This site uses a RPi to turn off and on Smart Tint with a photocell." >
     <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
     <link rel="stylesheet" href="../css/custom.css" >

     <!-- %%%%%%%%%%%% LINKS FOR WEB APP %%%%%%%%%%%%-->
     <script data-require="angular.js@1.4.8" data-semver="1.4.8" src="https://code.angularjs.org/1.4.8/angular.js"></script>
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.css" /> -->
     <script src="/static/Controller.js"></script>
     <!-- <link rel="stylesheet" href="/static/style.css" /> -->
     <!-- %%%%%%%%%%%% LINKS FOR WEB APP %%%%%%%%%%%%-->

     <title>Light Tint</title>
  </head>



  <body>

<nav class = "navbar navbar-expand-lg navbar-light">

      <a href = "../index.php" class = "navbar-brand ml-3 "> <span style = "color:black;">LIGH</span><span style = "color:yellow;">T</span><span style = "color:black;">INT</span> </a>

      <button class = "navbar-toggler" type="button" data-toggle="collapse" data-target = "#navbarMenu"
      aria-controls="navbarMenu" aria-expanded = "false" aria-label="Toggle Navigation">

      <span class="navbar-toggler-icon"></span>
      </button>

      <!-- <div class="collapse navbar-collapse"></div>  THIS "CENTERS THE NAV"-->
      <!-- Below is code for the collapsable navbarMenu, try resizing page so you you can see the "hamburger" button.-->
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav mr-auto" >
          <li class="nav-item active">
            <a href="../index.php" class="nav-link">Home </a>
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

        <form action = "new_index.php" method="get" class="form-inline my-2 my-lg-0">
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
