var myApp = angular.module('myApp', [])
    .config(function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[').endSymbol(']]');
    });

var addImageToRelayObjects = function(relayObjects) {
	for (var i=0; i < relayObjects.length; i++) {
  		var relay = relayObjects[i];
		if (relay.state == 'on') {
			relay.image = '/static/on_button.gif';
		}
		else {
			relay.image = '/static/off_button.gif';
		}
  	}
	return relayObjects;
};

myApp.controller('RelaysController', ['$scope', '$http', function($scope, $http) {

  $scope.header = 'Relay status';

  var getRelayInfo = function() {
    $http.get("api/relays").then(function(response) {
      var relays = response.data.relays;
      addImageToRelayObjects(relays)
      $scope.relays = relays;
    }, function(error) {}
    );
  };

  $scope.toggleRelay = function(relay) {

    //!switched lines 37-45
    // set default position
    var newState = 'off';

    console.log($scope.relays);
    console.log("state: " + newState);
    // set new position
    if (relay.state == 'off') {
    	newState = 'on';

    // if being turned on, check if other relay is already on
    console.log(relay.name);
    } else if (relay.name == 'Smart Tint'){
        // if photocell already on


        if ($scope.relays[1].state == "off") {
            console.log("photocell is already on");
            // or turn photocell off

            //TODO: condense these functions

            $http.put("/WebRelay/api/relays/2", { state : "on"}).then(function(response) {
                relay = response.data.relay;
                if (relay.state == 'on') {
                    relay.image = '/static/on_button.gif';
                }
                else {
                    relay.image = '/static/off_button.gif';
                }
                for (var i=0; i < $scope.relays.length; i++) {
                    if ($scope.relays[i].id == relay.id) {
                        $scope.relays[i] = relay;
                        break;
                    }
                }
            }, function(error) {}
            );


        }

     } else if ($scope.relays[0].state == "off") {
            console.log("smart tint is already on");

            // dont let photocell turn on

            $http.put("/WebRelay/api/relays/1", { state : "on"}).then(function(response) {
                relay = response.data.relay;
                if (relay.state == 'on') {
                    relay.image = '/static/on_button.gif';
                }
                else {
                    relay.image = '/static/off_button.gif';
                }
                for (var i=0; i < $scope.relays.length; i++) {
                    if ($scope.relays[i].id == relay.id) {
                        $scope.relays[i] = relay;
                        break;
                    }
                }
            }, function(error) {}
            );



     } else {
            console.log("no if statements triggered");
     }

     console.log("changed state: " + newState);



        $http.put("/WebRelay/api/relays/"+relay.id, { state : newState}).then(function(response) {
            relay = response.data.relay;
            if (relay.state == 'on') {
                relay.image = '/static/on_button.gif';
            }
            else {
                relay.image = '/static/off_button.gif';
            }
            for (var i=0; i < $scope.relays.length; i++) {
                if ($scope.relays[i].id == relay.id) {
                    $scope.relays[i] = relay;
                    break;
                }
            }
        }, function(error) {}
        );
  }
  getRelayInfo();

}]);/**
 * Created by joshuachilds on 10/31/18.
 */
