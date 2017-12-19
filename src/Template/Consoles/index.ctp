<?php $this->Html->script('app', ['block' => 'scriptBottom']); ?>

<!-- page content and controls will be here -->
<div class="container" ng-app="CakephpAngularjs" ng-controller="consolesCtrl">
    <div class="row">
        <div class="col s12">
            <h4>Consoles</h4>
            <!-- used for searching the current list -->
            <input type="text" ng-model="search" class="form-control" placeholder="Search consoles..." />

            <table>

                <thead>
                    <tr>
                        <th class="text-align-center">ID</th>
                        <th class="width-30-pct">Name</th>
                        <th class="text-align-center">Action</th>
                    </tr>
                </thead>

                <tbody ng-init="getAll()">
                    <tr ng-repeat="d in names| filter:search">
                        <td class="text-align-center">{{ d.id}}</td>
                        <td>{{ d.name}}</td>
                        <td>
                            <a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em">Edit</a>
                            <a ng-click="deleteConsole(d.id)" class="waves-effect waves-light btn margin-bottom-1em">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- modal for for creating new console -->
            <div id="modal-console-form" class="modal">
                <div class="modal-content">
                    <h4 id="modal-console-title">Create New Console</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="name">Name</label>
                            <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
                        </div>

                        <div class="input-field col s12">
                            <a id="btn-create-console" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createConsole()">Create</a>

                            <a id="btn-update-console" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateConsole()">Save Changes</a>

                            <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em">Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
</div> <!-- end container -->
<!-- floating button for creating console -->
<div class="fixed-action-btn" style="bottom:45px; right:24px;">
    <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-console-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a>
</div>

