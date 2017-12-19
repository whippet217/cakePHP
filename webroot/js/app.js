// angular js codes will be here
var app = angular.module('CakephpAngularjs', []);
app.controller('consolesCtrl', function ($scope, $http) {
    // more angular JS codes will be here
    $scope.showCreateForm = function () {
        // clear form
        $scope.clearForm();

        // change modal title
        $('#modal-console-title').text("Create New ");

        // hide update console button
        $('#btn-update-console').hide();

        // show create console button
        $('#btn-create-console').show();

    }
    // clear variable / form values
    $scope.clearForm = function () {
        $scope.id = "";
        $scope.name = "";

    }
    // create new console 
    $scope.createConsole = function () {

        // fields in key-value pairs
        $http.post('Consoles/add.json', {
            'name': $scope.name,
        }
        ).success(function (data, status, headers, config) {
            //console.log(data.response.result);
            // tell the user new console was created
            //Materialize.toast(data.response.result, 4000);

            // close modal
            $('#modal-console-form').modal('close');

            // clear modal content
            $scope.clearForm();

            // refresh the list
            $scope.getAll();
        });
    }
    // read console
    $scope.getAll = function () {
        $http.get("Consoles/index.json").success(function (response) {
            $scope.names = response.consoles;
        });
    }
    // retrieve record to fill out the form
    $scope.readOne = function (id) {

        // change modal title
        $('#modal-console-title').text("Edit Console");

        // show udpate console button
        $('#btn-update-console').show();

        // show create console button
        $('#btn-create-console').hide();

        // post id of console to be edited
        $http.post('Consoles/view.json', {
            'id': id
        })
                .success(function (data, status, headers, config) {

                    // put the values in form
                    
                    $scope.id = data.console.id;
                    $scope.name = data.console.name;
                    // show modal
                    $('#modal-console-form').modal('open');
                })
                .error(function (data, status, headers, config) {
                    Materialize.toast('Unable to retrieve record.', 4000);
                });
    }
    // update console record / save changes
    $scope.updateConsole = function () {
        $http.post('Consoles/edit.json', {
            'id': $scope.id,
            'name': $scope.name,
        })
                .success(function (data, status, headers, config) {
                    // tell the user console record was updated
                    console.log(data.response.result);
                    //Materialize.toast(data.response.result, 4000);

                    // close modal
                    $('#modal-console-form').modal('close');

                    // clear modal content
                    $scope.clearForm();

                    // refresh the console list
                    $scope.getAll();
                });
    }
    // delete console
    $scope.deleteConsole = function (id) {

        // ask the user if he is sure to delete the record
        if (confirm("Are you sure?")) {
            // post the id of console to be deleted
            $http.post('Consoles/delete.json', {
                'id': id
            }).success(function (data, status, headers, config) {

                // tell the user console was deleted
                console.log(data.response.result);
                //Materialize.toast(data.response.result, 4000);

                // refresh the list
                $scope.getAll();
            });
        }
    }
});

// jquery codes will be here
$(document).ready(function () {
    // initialize modal
    $('.modal').modal();
});



