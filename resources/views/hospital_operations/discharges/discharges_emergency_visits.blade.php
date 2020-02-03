    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Hospital Operations</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Hospital Operations</div>
            <div class="breadcrumb-item active">Emergency Visits</div>
        </div>
        </div>

        <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Emergency Visits</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" ui-sref="hospital-operations-discharges-ev-details({reporting_year:2019})"><i class="far fa-plus-square"></i> Add</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesEVCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                        <th class="align-middle" width="15%"> Number </th>
                        <th width="85%">Emergency visits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td align="right"><%dischargesEVCtrl.ev.emergencyvisits%></td>
                        <td>Total number of emergency department visits  </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesEVCtrl.ev.emergencyvisitsadult%></td>
                        <td>Total number of emergency department visits, adult  </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesEVCtrl.ev.emergencyvisitspediatric%></td>
                        <td>Total number of emergency department visits, pediatric  </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesEVCtrl.ev.evfromfacilitytoanother%></td>
                        <td>Total number of patients transported <b>FROM THIS FACILITY'S EMERGENCY DEPARTMENT</b> to another facility for inpatient care </td>
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

    <script type="text/ng-template" id="add-discharges-ev-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Emergency Visits</h5>
        <button type="button" class="close" ng-click="dischargesEVCtrl.close()" ui-sref="hospital-operations-discharges-ev({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <div class="table-responsive">
                    <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                        <th class="align-middle" width="20%"> Number </th>
                        <th width="80%">Emergency visits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><input type="text" class="form-control" id="" ng-model="dischargesEVCtrl.collection.emergencyvisits"></td>
                        <td>Total number of emergency department visits  </td>
                        </tr>
                        <tr>
                        <td><input type="text" class="form-control" id="" ng-model="dischargesEVCtrl.collection.emergencyvisitsadult"></td>
                        <td>Total number of emergency department visits, adult  </td>
                        </tr>
                        <tr>
                        <td><input type="text" class="form-control" id="" ng-model="dischargesEVCtrl.collection.emergencyvisitspediatric"></td>
                        <td>Total number of emergency department visits, pediatric  </td>
                        </tr>
                        <tr>
                        <td><input type="text" class="form-control" id="" ng-model="dischargesEVCtrl.collection.evfromfacilitytoanother"></td>
                        <td>Total number of patients transported <b>FROM THIS FACILITY'S EMERGENCY DEPARTMENT</b> to another facility for inpatient care </td>
                        </tr>

                    </tbody>
                    </table>
                </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesEVCtrl.close()" ui-sref="hospital-operations-discharges-ev({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!dischargesEVCtrl.collection_copy" ng-click="dischargesEVCtrl.createDischargeEVBtn(dischargesEVCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesEVCtrl.collection_copy" ng-click="dischargesEVCtrl.updateDischargeEVBtn(dischargesEVCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>