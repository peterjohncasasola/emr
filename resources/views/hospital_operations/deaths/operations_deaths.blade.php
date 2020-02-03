    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Hospital Operations</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Hospital Operations</div>
            <div class="breadcrumb-item active">Total Number of Deaths </div>
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
                <h4>Total Number of Deaths    </h4>
                <!-- <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputtotaldeaths"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" id="swal-confirm"><i class="fas fa-paper-plane"></i> Submit Data (confirmation)</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" id="swal-success">(Submit Data for success)</a>
                    <a href="#" class="btn btn-icon icon-left btn-info"  id="swal-error">(Submit Data for error)</a>
                </div> -->
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" ui-sref="hospital-operations-death-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="operationsDeathCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <thead>
                        <tr>
                        <th>Types of deaths   </th>
                        <th>Number   </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td class="text-bold">Total deaths  </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totaldeaths%></td>
                        </tr>
                        <tr>
                        <td colspan="2" class="text-bold">Total number of inpatient deaths  </td>
                        </tr>
                        <tr>
                        <td>▪ Total deaths < 48 hours </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totaldeaths48down%></td>
                        </tr>
                        <tr>
                        <td>▪ Total deaths ≥ 48 hours  </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totaldeaths48up%></td>
                        </tr>
                        <tr>
                        <td>Total number of emergency room deaths  </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totalerdeaths%></td>
                        </tr>
                        <tr>
                        <td>Total number of cases declared 'dead on arrival' </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totaldoa%></td>
                        </tr>
                        <tr>
                        <td>Total number of stillbirths  </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totalstillbirths%></td>
                        </tr>
                        <tr>
                        <td>Total number of neonatal deaths   </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totalneonataldeaths%></td>
                        </tr>
                        <tr>
                        <td>Total number of maternal deaths    </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totalmaternaldeaths%></td>
                        </tr>
                        <tr>
                        <td colspan="2" class="text-bold">Gross Death Rate (This is optional)    </td>
                        </tr>
                        <tr>
                        <td>Total Deaths Newborn</td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totaldeathsnewborn%></td>
                        </tr>
                        <tr>
                        <td>Total Discharge Deaths </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.totaldischargedeaths%></td>
                        </tr>
                        <tr>
                        <td>Gross Death Rate  </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.grossdeathrate%></td>
                        </tr>
                        <tr>
                        <td colspan="2" class="text-bold">Net Death Rate (This is optional)</td>
                        </tr>
                        <tr>
                        <td>Numerator</td>
                        <td align="right"><%operationsDeathCtrl.operations_death.ndrnumerator%></td>
                        </tr>
                        <tr>
                        <td>Denominator</td>
                        <td align="right"><%operationsDeathCtrl.operations_death.ndrdenominator%></td>
                        </tr>
                        <tr>
                        <td>Net Death Rate  </td>
                        <td align="right"><%operationsDeathCtrl.operations_death.netdeathrate%></td>
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

<script type="text/ng-template" id="add-operations-death-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Total Number of Deaths</h5>
        <button type="button" class="close" ng-click="operationsDeathCtrl.close()" ui-sref="hospital-operations-death({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="table-responsive">
            
            <table class="table table-striped" id="table-1">
            <thead>
                <tr>
                <th>Types of deaths   </th>
                <th>Number   </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td class="text-bold">Total number of inpatient deaths  </td>
                <td><input type="text" disabled="" class="form-control" id="" ng-value="operationsDeathCtrl.collection.totaldeaths48down+
                    operationsDeathCtrl.collection.totaldeaths48up+
                    operationsDeathCtrl.collection.totalerdeaths+
                    operationsDeathCtrl.collection.totaldoa+
                    operationsDeathCtrl.collection.totalstillbirths+
                    operationsDeathCtrl.collection.totalneonataldeaths+
                    operationsDeathCtrl.collection.totalmaternaldeaths"></td>
                </tr>
                <tr>
                <td class="align-middle">▪ Total deaths < 48 hours </td>
                <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.totaldeaths48down"></td>
                </tr>
                <tr>
                <td class="align-middle">▪ Total deaths ≥ 48 hours  </td>
                <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.totaldeaths48up"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of emergency room deaths  </td>
                <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.totalerdeaths"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of cases declared 'dead on arrival'   </td>
                <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.totaldoa"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of stillbirths  </td>
                <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.totalstillbirths"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of neonatal deaths   </td>
                <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.totalneonataldeaths"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of maternal deaths    </td>
                <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.totalmaternaldeaths"></td>
                </tr>
            </tbody>
            </table>
        </div>

        <div class="table-responsive">
                <table class="table table-bordered table-md">
                <thead>
                    <tr>
                    <th colspan="6">Gross Death Rate & Net Death Rate (optional)</th>
                    <th colspan="4">Formula</th>
                    </tr>
                </thead>
                <tbody>
                    <tr align="center">
                    <td rowspan="2" class="align-middle"><input type="text" class="form-control" id="" disabled="" ng-value="(operationsDeathCtrl.collection.totaldeathsnewborn*100)/operationsDeathCtrl.collection.totaldischargedeaths"></td>
                    <td rowspan="2" class="align-middle">=</td>
                    <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.totaldeathsnewborn"></td>
                    <td rowspan="2" class="align-middle">x100</td>
                    <td rowspan="2" class="align-middle"><b>Gross Death Rate  </b></td>
                    <td rowspan="2" class="align-middle">=</td>
                    <td>Total Deaths Newborn</td>
                    <td rowspan="2" class="align-middle">x100</td>
                    </tr>
                    <tr align="center">
                    <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.totaldischargedeaths"></td>
                    <td>Total Discharge Deaths  </td>
                    </tr>

                    <tr align="center">
                    <td rowspan="2" class="align-middle"><input type="text" class="form-control" id="" disabled="" ng-value="(operationsDeathCtrl.collection.ndrnumerator*100)/operationsDeathCtrl.collection.ndrdenominator"></td>
                    <td rowspan="2" class="align-middle">=</td>
                    <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.ndrnumerator"></td>
                    <td rowspan="2" class="align-middle">x100</td>
                    <td rowspan="2" class="align-middle"><b>Net Death Rate    </b></td>
                    <td rowspan="2" class="align-middle">=</td>
                    <td>Total Deaths (including newborn for a given period) - death < 48 hours for the period</td>
                    <td rowspan="2" class="align-middle">x100</td>
                    </tr>
                    <tr align="center">
                    <td><input type="text" class="form-control" id="" ng-model="operationsDeathCtrl.collection.ndrdenominator"></td>
                    <td>Total Discharges (including deaths and newborn) - death < 48 hours for the period </td>
                    </tr>
                </tbody>
                </table>
            </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsDeathCtrl.close()" ui-sref="hospital-operations-death({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!operationsDeathCtrl.collection_copy" ng-click="operationsDeathCtrl.createOperationsDeathBtn(operationsDeathCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="operationsDeathCtrl.collection_copy" ng-click="operationsDeathCtrl.updateOperationsDeathBtn(operationsDeathCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>