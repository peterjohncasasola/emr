<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Hospital Operations</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Hospital Operations</div>
        <div class="breadcrumb-item">Summary of Patients in the Hospital</div>
    </div>
    </div>

    <div class="section-body">
    <!-- <h2 class="section-title">Cards</h2>
    <p class="section-lead">
        Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
    </p> -->

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Summary of Patients in the Hospital  </h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputpatients" ui-sref="hospital-operations-summary-of-patients-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="summaryOfPatientsCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <thead>
                    <tr>
                    <th colspan="2">Inpatient Care  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalinpatients%></td>
                    <td>Total number of inpatients  </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalnewborn%></td>
                    <td>Total Newborn (In facility deliveries)  </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totaldischarges%></td>
                    <td>Total Discharges (Alive)  </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalpad%></td>
                    <td>Total patients admitted and discharged on the same day   </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalibd%></td>
                    <td>Total number of inpatient bed days (service days) </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalinpatienttransto%></td>
                    <td>Total number of inpatients transferred TO THIS FACILITY from another facility for inpatient care    </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalinpatienttransfrom%></td>
                    <td>Total number of inpatients transferred FROM THIS FACILITY to another facility for inpatient care    </td>
                    </tr>
                    <tr>
                    <td align="right"><%summaryOfPatientsCtrl.summary_of_patient.totalpatientsremaining%></td>
                    <td>Total number of patients remaining in the hospital as of midnight last day of previous year  </td>
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



<script type="text/ng-template" id="add-summary-of-patient-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Summary of Patients in the Hospital</h5>
        <button type="button" class="close" ng-click="summaryOfPatientsCtrl.close()" ui-sref="hospital-operations-summary-of-patients({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
    <div class="form-group row">
        <div class="col-sm-3">
            <input type="text" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalinpatients">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of inpatients*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="text" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalnewborn">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total Newborn (In facility deliveries)*   </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="text" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totaldischarges">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total Discharges (Alive)*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="text" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalpad">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total patients admitted and discharged on the same day*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="text" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalibd">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of inpatient bed days (service days)* </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="text" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalinpatienttransto">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of inpatients transferred TO THIS FACILITY from another facility for inpatient care*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="text" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalinpatienttransfrom">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of inpatients transferred FROM THIS FACILITY to another facility for inpatient care*  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="text" class="form-control" id="" placeholder="" ng-model="summaryOfPatientsCtrl.collection.totalpatientsremaining">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total number of patients remaining in the hospital as of midnight last day of previous year* </label>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="summaryOfPatientsCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!summaryOfPatientsCtrl.collection_copy" ng-click="summaryOfPatientsCtrl.createSummaryOfPatientBtn(summaryOfPatientsCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="summaryOfPatientsCtrl.collection_copy" ng-click="summaryOfPatientsCtrl.updateSummaryOfPatientBtn(summaryOfPatientsCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>