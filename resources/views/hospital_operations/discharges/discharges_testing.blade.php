<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Hospital Operations</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Hospital Operations</div>
        <div class="breadcrumb-item active">Testing and Other Services</div>
    </div>
    </div>

    <div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Testing and Other Services (Laboratory Examination)</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" ui-sref="hospital-operations-discharges-testing-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesTestingCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                <thead>
                    <tr>
                    <th class="align-middle" width="15%"> Number </th>
                    <th width="35%" style="border-right: 1px solid lightgray;">Total number of medical imaging tests (all types including x-rays, ultrasound, CT scans, etc.)  </th>
                    <th class="align-middle" width="15%"> Number </th>
                    <th width="35%">Total number of laboratory and diagnostic tests (all types, excluding medical imaging)  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.xray%></td>
                    <td>X-Ray </td>
                    <td><%dischargesTestingCtrl.testing.urinalysis%></td>
                    <td>Urinalysis </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.ultrasound%></td>
                    <td>Ultrasound </td>
                    <td><%dischargesTestingCtrl.testing.fecalysis%></td>
                    <td>Fecalysis </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.ctscan%></td>
                    <td>CT-Scan  </td>
                    <td><%dischargesTestingCtrl.testing.hematology%></td>
                    <td>Hematology  </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.mri%></td>
                    <td>MRI </td>
                    <td><%dischargesTestingCtrl.testing.clinicalchemistry%></td>
                    <td>Clinical chemistry   </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.mammography%></td>
                    <td>Mammography </td>
                    <td><%dischargesTestingCtrl.testing.immunology%></td>
                    <td>Immunology/Serology/HIV  </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.angiography%></td>
                    <td>Angiography </td>
                    <td><%dischargesTestingCtrl.testing.microbiology%></td>
                    <td>Microbiology (Smears/Culture & Sensitivity)  </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.linearaccelerator%></td>
                    <td>Linear Accelerator   </td>
                    <td><%dischargesTestingCtrl.testing.surgicalpathology%></td>
                    <td>Surgical Pathology  </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.dentalxray%></td>
                    <td>Dental X-Ray   </td>
                    <td><%dischargesTestingCtrl.testing.autopsy%></td>
                    <td>Autopsy </td>
                    </tr>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.others%></td>
                    <td>Others </td>
                    <td><%dischargesTestingCtrl.testing.others%></td>
                    <td>Cytology </td>
                    </tr>
                </tbody>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-md">
                <thead>
                    <tr>
                    <th class="align-middle" width="15%"> Number </th>
                    <th width="35%">Blood Service Facilities  </th>
                    <th> </th>
                    <th> </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><%dischargesTestingCtrl.testing.numberofbloodunitstransfused%></td>
                    <td>Number of Blood units Transfused  </td>
                    <td></td>
                    <td></td>
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

<script type="text/ng-template" id="add-discharges-testing-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Testing and Other Services</h5>
        <button type="button" class="close" ng-click="dischargesTestingCtrl.close()" ui-sref="hospital-operations-discharges-testing({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-bordered table-md">
            <thead>
                <tr>
                <th class="align-middle" width="15%"> Number </th>
                <th width="35%" style="border-right: 1px solid lightgray;">Total number of medical imaging tests (all types including x-rays, ultrasound, CT scans, etc.)  </th>
                <th class="align-middle" width="15%"> Number </th>
                <th width="35%">Total number of laboratory and diagnostic tests (all types, excluding medical imaging)  </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.xray"></td>
                <td>X-Ray </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.urinalysis"></td>
                <td>Urinalysis </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.ultrasound"></td>
                <td>Ultrasound </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.fecalysis"></td>
                <td>Fecalysis </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.ctscan"></td>
                <td>CT-Scan  </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.hematology"></td>
                <td>Hematology  </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.mri"></td>
                <td>MRI </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.clinicalchemistry"></td>
                <td>Clinical chemistry   </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.mammography"></td>
                <td>Mammography </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.immunology"></td>
                <td>Immunology/Serology/HIV  </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.angiography"></td>
                <td>Angiography </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.microbiology"></td>
                <td>Microbiology (Smears/Culture & Sensitivity)  </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.linearaccelerator"></td>
                <td>Linear Accelerator   </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.surgicalpathology"></td>
                <td>Surgical Pathology  </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.dentalxray"></td>
                <td>Dental X-Ray   </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.autopsy"></td>
                <td>Autopsy </td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.others"></td>
                <td>Others </td>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.cytology"></td>
                <td>Cytology </td>
                </tr>
            </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-md">
            <thead>
                <tr>
                <th class="align-middle" width="15%"> Number </th>
                <th width="35%">Blood Service Facilities  </th>
                <th> </th>
                <th> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><input type="number" class="form-control" ng-model="dischargesTestingCtrl.collection.numberofbloodunitstransfused"></td>
                <td>Number of Blood units Transfused  </td>
                <td></td>
                <td></td>
                </tr>
            </tbody>
            </table>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesTestingCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!dischargesTestingCtrl.collection_copy" ng-click="dischargesTestingCtrl.createDischargeTestingBtn(dischargesTestingCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesTestingCtrl.collection_copy" ng-click="dischargesTestingCtrl.updateDischargeTestingBtn(dischargesTestingCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>