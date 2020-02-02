    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Hospital Operations </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Surgical Operations</div>
            <div class="breadcrumb-item active">10 Leading ER Consultations</div>
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
                <h4>Ten Leading ER Consultations</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" ng-click="dischargesERCtrl.createDischargeERBtn(dischargesERCtrl.ricd10_details)"><i class="far fa-plus-square"></i> Add</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesERCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-2">
                    Code:
                        <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesERCtrl.ricd10_details.icd10code">
                    </div>
                    <div class="col-sm-2">
                    Category:
                        <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesERCtrl.ricd10_details.icd10cat">
                    </div>
                    <div class="col-sm-6">
                        <textarea class="form-control" data-toggle="modal" 
                        ng-model="dischargesERCtrl.ricd10_details.icd10desc" 
                        ng-click="dischargesERCtrl.selectIcdType()" 
                        data-target="#input10er" readonly="" placeholder="Select ER Consultations"></textarea>
                    </div>
                    <div class="col-sm-2">
                    Number:
                        <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesERCtrl.ricd10_details.number">
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <thead>
                        <tr>
                        <th width="4%">Rank</th>
                        <th width="70%">Ten Leading ER Consultations</th>
                        <th width="8%">Number</th>
                        <th width="12%">ICD-10 Code</th>
                        <th width="12%">ICD-10 Category</th>
                        <th width="6%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="discharges_er in dischargesERCtrl.discharges_er">
                            <td><% $index+1 %></td>
                            <td><%discharges_er.erconsultations%></td>
                            <td><%discharges_er.number%></td>
                            <td><%discharges_er.icd10code%></td>
                            <td><%discharges_er.icd10category%></td>
                            <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesERCtrl.deleteDischargeERBtn(discharges_er.id)"></a></td>
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

<script type="text/ng-template" id="add-discharges-er-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">ICD-10 | PHILIPPINE MODIFICATION</h5>
        <button type="button" class="close" ng-click="dischargesERCtrl.close()" ui-sref="hospital-operations-discharges-er({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
            <thead>                                 
                <tr>
                    <th>ICD-10 Code</th>
                    <th>Description</th>
                    <th>Category</th>
                </tr>
                </thead>
                <tbody>                                 
                    <tr ng-repeat="ricd10 in dischargesERCtrl.ricd10">
                        <td><a href="" ng-click="dischargesERCtrl.chooseRicd10Code(ricd10.icd10code)"> <%ricd10.icd10code%> </a></td>
                        <td><%ricd10.icd10desc%></td>
                        <td><%ricd10.icd10cat%></td>
                    </tr>
            </tbody>
            </table>
        </div>
        <br>
        <p> To add a new surgical operation, please use the form below. *Please note, once you added new surgical operation it can not be removed! </p>
        <div class="form-group row">
            <label for="text" class="col-sm-3 col-form-label">Add a New Surgical Operation</label>
            <div class="col-sm-8"><input type="text" class="form-control" id=""></div>
            <div class="col-sm-1"><a href="#" class="btn btn-icon btn-light"><i class="far fa-plus-square"></i></a></div>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesERCtrl.close()" ui-sref="hospital-operations-surgical-operations({reporting_year:2019})">Close</button>
            <!-- <button type="button" class="btn btn-primary" ng-if="!dischargesERCtrl.collection_copy" ng-click="dischargesERCtrl.createDischargeOPVBtn(dischargesERCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesERCtrl.collection_copy" ng-click="dischargesERCtrl.updateDischargeOPVBtn(dischargesERCtrl.collection)">Update changes</button> -->
        </div>
    </div>

</script>