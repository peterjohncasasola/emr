    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Hospital Operations</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Hospital Operations</div>
            <div class="breadcrumb-item active">Outpatient Visits, including Emergency Care  </div>
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
                <h4>Outpatient Visits, including Emergency Care  </h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputdischarges_d" ui-sref="hospital-operations-discharges-opv-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesOPVCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <thead>
                        <tr>
                        <th colspan="2">Outpatient Visits </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td align="right"><%dischargesOPVCtrl.opv.newpatient%></td>
                        <td>Number of outpatient visits, new patient  </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesOPVCtrl.opv.revisit%></td>
                        <td>Number of outpatient visits, re-visit </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesOPVCtrl.opv.adult%></td>
                        <td>Number of outpatient visits, adult   </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesOPVCtrl.opv.pediatric%></td>
                        <td>Number of outpatient visits, pediatric   </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesOPVCtrl.opv.adultgeneralmedicine%></td>
                        <td>Number of adult general medicine outpatient visits   </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesOPVCtrl.opv.specialtynonsurgical%></td>
                        <td>Number of specialty (non-surgical) outpatient visits   </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesOPVCtrl.opv.surgical%></td>
                        <td>Number of surgical outpatient visits   </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesOPVCtrl.opv.antenatal%></td>
                        <td>Number of antenatal/prenatal care visits   </td>
                        </tr>
                        <tr>
                        <td align="right"><%dischargesOPVCtrl.opv.postnatal%></td>
                        <td>Number of postnatal care visits  </td>
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

    


    <script type="text/ng-template" id="add-discharges-opv-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Outpatient Visits, including Emergency Care</h5>
        <button type="button" class="close" ng-click="dischargesOPVCtrl.close()" ui-sref="hospital-operations-discharges-opv({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesOPVCtrl.collection.newpatient">
            </div>
            <label for="" class="col-sm- col-form-label">Number of outpatient visits, new patient  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesOPVCtrl.collection.revisit">
            </div>
            <label for="" class="col-sm-8 col-form-label">Number of outpatient visits, re-visit   </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesOPVCtrl.collection.adult">
            </div>
            <label for="" class="col-sm-8 col-form-label">Number of outpatient visits, adult    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesOPVCtrl.collection.pediatric">
            </div>
            <label for="" class="col-sm-8 col-form-label">Number of outpatient visits, pediatric    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesOPVCtrl.collection.adultgeneralmedicine">
            </div>
            <label for="" class="col-sm-8 col-form-label">Number of adult general medicine outpatient visits    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesOPVCtrl.collection.specialtynonsurgical">
            </div>
            <label for="" class="col-sm-8 col-form-label">Number of specialty (non-surgical) outpatient visits    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesOPVCtrl.collection.surgical">
            </div>
            <label for="" class="col-sm-8 col-form-label">Number of surgical outpatient visits    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesOPVCtrl.collection.antenatal">
            </div>
            <label for="" class="col-sm-8 col-form-label">Number of antenatal/prenatal care visits    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesOPVCtrl.collection.postnatal">
            </div>
            <label for="" class="col-sm-8 col-form-label">Number of postnatal care visits   </label>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesOPVCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!dischargesOPVCtrl.collection_copy" ng-click="dischargesOPVCtrl.createDischargeOPVBtn(dischargesOPVCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesOPVCtrl.collection_copy" ng-click="dischargesOPVCtrl.updateDischargeOPVBtn(dischargesOPVCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>