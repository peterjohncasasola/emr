<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Surgical Operations &nbsp;</h1> <span class="badge badge-light">Major</span>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Surgical Operations</div>
        <div class="breadcrumb-item active">10 Leading Major Operations</div>
    </div>
    </div>

    <div class="section-body">
    <p class="section-lead">
        (If no available data for this module: In the first row, search for "Not Applicable" then put Number zero (0) and Save)
    </p>

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>10 Leading Major Operations (excluding Caesarean Section)</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" ng-click="surgicalOperationsMajorCtrl.createSurgicalOperationtBtn(surgicalOperationsMajorCtrl.surgical_operation)"> <i class="far fa-plus-square"></i> Add</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="surgicalOperationsMajorCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-2">
                Code:
                <input type="text" class="form-control" id="" placeholder="" ng-model="surgicalOperationsMajorCtrl.surgical_operation.operationcode">
                </div>
                <div class="col-sm-8">
                Desc
                <textarea class="form-control" data-toggle="modal" 
                ng-model="surgicalOperationsMajorCtrl.surgical_operation.surgicaloperation" 
                ng-click="surgicalOperationsMajorCtrl.selectSurgeryType()" 
                data-target="#inputsurgical" readonly="" placeholder="Select a Major Surgical Operation"></textarea>
                </div>
                <div class="col-sm-2">
                Number:
                <input type="text" class="form-control" id="" placeholder="" ng-model="surgicalOperationsMajorCtrl.surgical_operation.number">
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <thead>
                    <tr>
                        <th width="4%">Rank  </th>
                        <th width="83%">Surgical Operations </th>
                        <th width="13%">Number  </th>
                        <th width="13%">Actions  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="surgical_operation in surgicalOperationsMajorCtrl.surgical_operations">
                        <td><% $index+1 %></td>
                        <td><%surgical_operation.surgicaloperation%></td>
                        <td><%surgical_operation.number%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="surgicalOperationsMajorCtrl.deleteSurgicalOperationtBtn(surgical_operation.id)"></a></td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-success">Success: Jan 20, 2020 07:07</span>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>

</div>


<script type="text/ng-template" id="add-surgical-operation-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">10 Leading Major Operations (excluding Caesarean Section) </h5>
        <button type="button" class="close" ng-click="surgicalOperationsMajorCtrl.close()" ui-sref="hospital-operations-surgical-operations({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1" datatable="ng">
            <thead>                                 
                <tr>
                <th>Code</th>
                <th>Surgical Operation</th>
                </tr>
                </thead>
                <tbody>                                 
                    <tr ng-repeat="sergery in surgicalOperationsMajorCtrl.serguries">
                        <td><a href="" ng-click="surgicalOperationsMajorCtrl.chooseOperaCode(sergery.proccode)"> <%sergery.proccode%> </a></td>
                        <td><%sergery.procdesc%></td>
                    </tr>
            </tbody>
            </table>
        </div>
    </div>

</script>