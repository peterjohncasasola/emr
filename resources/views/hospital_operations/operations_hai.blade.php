    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Hospital Operations</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Hospital Operations</div>
            <div class="breadcrumb-item">Healthcare Associated Infections (HAI)</div>
        </div>
        </div>

        <div class="section-body">
        <p class="section-lead">
            HAI are infections that patients acquire as a result of healthcare interventions. For purposes of Licensing, the four(4) major HAI would suffice. 
            For All Hospitals
        </p>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Healthcare Associated Infections (HAI)    </h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputhai" ui-sref="hospital-operations-hai-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="operationsHAICtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <thead>
                        <tr>
                        <th colspan="6">Calculation</th>
                        <th colspan="4">Formula</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="9"><b>a. Device Related Infections</b></td>
                        </tr>
                            <tr align="center">
                            <td rowspan="2" class="align-middle">1</td>
                            <td rowspan="2" class="align-middle">1000.00</td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>100.00</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                            <td rowspan="2" class="align-middle"><b>Ventilator Acquired Pneumonia (VAP)</b></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>Number of Patients with VAP</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                        </tr>
                        <tr align="center">
                            <td>100.00</td>
                            <td>Total Number of Ventilator Days </td>
                        </tr>
                        <tr align="center">
                            <td rowspan="2" class="align-middle">2</td>
                            <td rowspan="2" class="align-middle">1000.00</td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>100.00</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                            <td rowspan="2" class="align-middle"><b>Blood Stream Infection (BSI) </b></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>Number of Patients with BSI</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                        </tr>
                        <tr align="center">
                            <td>100.00</td>
                            <td>Total Number of Central Line</td>
                        </tr>
                        <tr align="center">
                            <td rowspan="2" class="align-middle">3</td>
                            <td rowspan="2" class="align-middle">1000.00</td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>100.00</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                            <td rowspan="2" class="align-middle"><b>Urinary Tract Infection (UTI) </b></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>Number of Patients with UTI</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                        </tr>
                        <tr align="center">
                            <td>100.00</td>
                            <td>Total Number of Catheter Days </td>
                        </tr>

                        <tr>
                            <td colspan="9"><b>b. Non-Device Related Infections</b></td>
                        </tr>
                        <tr align="center">
                            <td rowspan="2" class="align-middle">4</td>
                            <td rowspan="2" class="align-middle">1000.00</td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>100.00</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                            <td rowspan="2" class="align-middle"><b>Surgical Site Infections (SSI) </b></td>
                            <td rowspan="2" class="align-middle">=</td>
                            <td>Number of Surgical Site Infections</td>
                            <td rowspan="2" class="align-middle">x1000</td>
                        </tr>
                        <tr align="center">
                            <td>100.00</td>
                            <td>Total number of Procedures done </td>
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

<script type="text/ng-template" id="add-operation-hai-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Healthcare Associated Infections (HAI)</h5>
            <br><h6>HAI are infections that patients acquire as a result of healthcare interventions. For purposes of Licensing, the four(4) major HAI would suffice. For All Hospitals</h6>
        <button type="button" class="close" ng-click="operationsHAICtrl.close()" ui-sref="hospital-operations-hai({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-md">
            <thead>
                <tr>
                <th colspan="6">Calculation</th>
                <th colspan="4">Formula</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td colspan="9"><b>a. Device Related Infections</b></td>
                </tr>
                <tr align="center">
                <td rowspan="2" class="align-middle">1</td>
                <td rowspan="2" class="align-middle"><input type="number" class="form-control" id="" disabled=""
                ng-init="operationsHAICtrl.collection.resultvap=(operationsHAICtrl.collection.patientnumvap*1000)/operationsHAICtrl.collection.totalventilatordays"
                ng-model="operationsHAICtrl.collection.resultvap">
                </td>
                <td rowspan="2" class="align-middle">=</td>
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.patientnumvap"></td>
                <td rowspan="2" class="align-middle">x1000</td>
                <td rowspan="2" class="align-middle"><b>Ventilator Acquired Pneumonia (VAP)</b></td>
                <td rowspan="2" class="align-middle">=</td>
                <td>Number of Patients with VAP</td>
                <td rowspan="2" class="align-middle">x1000</td>
                </tr>
                <tr align="center">
                <td><input type="number" class="form-control" ng-model="operationsHAICtrl.collection.totalventilatordays"></td>
                <td>Total Number of Ventilator Days </td>
                </tr>

                <tr align="center">
                <td rowspan="2" class="align-middle">2</td>
                <td rowspan="2" class="align-middle"><input type="number" class="form-control" id="" disabled="" ng-model="operationsHAICtrl.collection.resultbsi"></td>
                <td rowspan="2" class="align-middle">=</td>
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.patientnumbsi"></td>
                <td rowspan="2" class="align-middle">x1000</td>
                <td rowspan="2" class="align-middle"><b>Blood Stream Infection (BSI) </b></td>
                <td rowspan="2" class="align-middle">=</td>
                <td>Number of Patients with BSI</td>
                <td rowspan="2" class="align-middle">x1000</td>
                </tr>
                <tr align="center">
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.totalnumcentralline"></td>
                <td>Total Number of Central Line</td>
                </tr>

                <tr align="center">
                <td rowspan="2" class="align-middle">3</td>
                <td rowspan="2" class="align-middle"><input type="number" class="form-control" id="" disabled="" ng-model="operationsHAICtrl.collection.resultuti"></td>
                <td rowspan="2" class="align-middle">=</td>
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.patientnumuti"></td>
                <td rowspan="2" class="align-middle">x1000</td>
                <td rowspan="2" class="align-middle"><b>Urinary Tract Infection (UTI) </b></td>
                <td rowspan="2" class="align-middle">=</td>
                <td>Number of Patients with UTI</td>
                <td rowspan="2" class="align-middle">x1000</td>
                </tr>
                <tr align="center">
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.totalcatheterdays"></td>
                <td>Total Number of Catheter Days </td>
                </tr>

                <tr>
                <td colspan="9"><b>b. Non-Device Related Infections</b></td>
                </tr>
                <tr align="center">
                <td rowspan="2" class="align-middle">4</td>
                <td rowspan="2" class="align-middle"><input type="number" class="form-control" id="" disabled="" ng-model="operationsHAICtrl.collection.resultssi"></td>
                <td rowspan="2" class="align-middle">=</td>
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.numssi"></td>
                <td rowspan="2" class="align-middle">x1000</td>
                <td rowspan="2" class="align-middle"><b>Surgical Site Infections (SSI) </b></td>
                <td rowspan="2" class="align-middle">=</td>
                <td>Number of Surgical Site Infections</td>
                <td rowspan="2" class="align-middle">x1000</td>
                </tr>
                <tr align="center">
                <td><input type="number" class="form-control" id="" ng-model="operationsHAICtrl.collection.totalproceduresdone"></td>
                <td>Total number of Procedures done </td>
                </tr>
            </tbody>
            </table>
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsHAICtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!operationsHAICtrl.collection_copy" ng-click="operationsHAICtrl.createOperationsHAIBtn(operationsHAICtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="operationsHAICtrl.collection_copy" ng-click="operationsHAICtrl.updateOperationsHAIBtn(operationsHAICtrl.collection)">Update changes</button>
        </div>
    </div>

</script>