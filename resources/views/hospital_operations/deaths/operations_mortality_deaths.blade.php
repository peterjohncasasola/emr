    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Deaths</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Hospital Operations</div>
            <div class="breadcrumb-item active">Ten Leading Causes of Mortality/Deaths Disaggregated as to Age and Sex  </div>
        </div>
        </div>

        <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Ten Leading Causes of Mortality/Deaths Disaggregated as to Age and Sex  </h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputmortality" ng-click="operationsMortalityDeathCtrl.selectIcdType()"><i class="far fa-edit"></i> Select</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="operationsMortalityDeathCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md long-table" border="1">
                        <tr>
                            <th rowspan="3">Cause of Death (Underlying) </th>
                            <th colspan="34">Age Distribution of Patients </th>
                            <th rowspan="3">Total</th>
                            <th rowspan="3" colspan="2">ICD-10Code<br>/Tabular List</th>
                        </tr>
                        <tr>
                            <td colspan="2">Under 1 </td>
                            <td colspan="2">1-4 </td>
                            <td colspan="2">5-9 </td>
                            <td colspan="2">10-14 </td>
                            <td colspan="2">15-19 </td>
                            <td colspan="2">20-24 </td>
                            <td colspan="2">25-29 </td>
                            <td colspan="2">30-34 </td>
                            <td colspan="2">35-39 </td>
                            <td colspan="2">40-44 </td>
                            <td colspan="2">45-49 </td>
                            <td colspan="2">50-54 </td>
                            <td colspan="2">55-59 </td>
                            <td colspan="2">60-64 </td>
                            <td colspan="2">65-69 </td>
                            <td colspan="2">70 & Over </td>
                            <td colspan="2"><b>Subtotal</b></td>
                        </tr>
                        <tr>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                            <td class="m">M</td>
                            <td class="f">F</td>
                        </tr>

                        
                        <tr ng-repeat="mortality_death in operationsMortalityDeathCtrl.mortality_deaths">
                            <td><%mortality_death.icd10desc%></td>
                            <td><%mortality_death.munder1%></td>
                            <td><%mortality_death.funder1%></td>
                            <td><%mortality_death.m1to4%></td>
                            <td><%mortality_death.f1to4%></td>
                            <td><%mortality_death.m5to9%></td>
                            <td><%mortality_death.f5to9%></td>
                            <td><%mortality_death.m10to14%></td>
                            <td><%mortality_death.f10to14%></td>
                            <td><%mortality_death.m15to19%></td>
                            <td><%mortality_death.f15to19%></td>
                            <td><%mortality_death.m20to24%></td>
                            <td><%mortality_death.f20to24%></td>
                            <td><%mortality_death.m25to29%></td>
                            <td><%mortality_death.f25to29%></td>
                            <td><%mortality_death.m30to34%></td>
                            <td><%mortality_death.f30to34%></td>
                            <td><%mortality_death.m35to39%></td>
                            <td><%mortality_death.f35to39%></td>
                            <td><%mortality_death.m40to44%></td>
                            <td><%mortality_death.f40to44%></td>
                            <td><%mortality_death.m45to49%></td>
                            <td><%mortality_death.f45to49%></td>
                            <td><%mortality_death.m50to54%></td>
                            <td><%mortality_death.f50to54%></td>
                            <td><%mortality_death.m55to59%></td>
                            <td><%mortality_death.f55to59%></td>
                            <td><%mortality_death.m60to64%></td>
                            <td><%mortality_death.f60to64%></td>
                            <td><%mortality_death.m65to69%></td>
                            <td><%mortality_death.f65to69%></td>
                            <td><%mortality_death.m70over%></td>
                            <td><%mortality_death.f70over%></td>
                            <td><%mortality_death.msubtotal%></td>
                            <td><%mortality_death.fsubtotal%></td>
                            <td><%mortality_death.grandtotal%></td>
                            <td><%mortality_death.icd10code%></td>
                            <td>
                                <a href="" class="fas fa-edit text-warning" ui-sref="hospital-operations-mortality-death-details({reporting_year:2019, icd10code:mortality_death.icd10code, action:'edit'})"></a>
                                <a href="" class="fas fa-trash-alt text-danger" ng-click="operationsMortalityDeathCtrl.deleteOperationsMortalityDeathBtn(mortality_death.id)"></a>
                            </td>
                        </tr>
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

<script type="text/ng-template" id="select-mortality-death-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">ICD-10 | PHILIPPINE MODIFICATION</h5>
        <button type="button" class="close" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-mortality-death({reporting_year:2019})">
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
                    <tr ng-repeat="ricd10 in operationsMortalityDeathCtrl.ricd10">
                        <td><a href="" ng-click="operationsMortalityDeathCtrl.chooseRicd10Code(ricd10.icd10code)"> <%ricd10.icd10code%> </a></td>
                        <td><%ricd10.icd10desc%></td>
                        <td><%ricd10.icd10cat%></td>
                    </tr>
            </tbody>
            </table>
        </div>

        <!-- <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-surgical-operations({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!operationsMortalityDeathCtrl.collection_copy" ng-click="operationsMortalityDeathCtrl.createDischargeOPVBtn(operationsMortalityDeathCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="operationsMortalityDeathCtrl.collection_copy" ng-click="operationsMortalityDeathCtrl.updateDischargeOPVBtn(operationsMortalityDeathCtrl.collection)">Update changes</button>
        </div> -->
    </div>

</script>


<script type="text/ng-template" id="add-mortality-death-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Mortality/Deaths Disaggregated as to Age and Sex</h5>
        <button type="button" class="close" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-mortality-death({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <label for="text" class="col-sm-4 col-form-label">Cause of Mortality (Underlying)
            (Do not include cardio-respiratory Arrest and maternal deaths)</label>
            <div class="col-sm-8">
            <textarea class="form-control" readonly="" ng-value="operationsMortalityDeathCtrl.collection.icd10desc"></textarea>
        </div>
        <br>
        <div class="table-responsive">
        <div class="form-group row">
                <div class="col-sm-6">
                <table class="table table-sm table-inputage">
                    <thead>
                    <tr>
                        <th scope="col" width="35%">Age Distribution <br>of Patients</th>
                        <th scope="col">Male</th>
                        <th scope="col">Female</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Under 1 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.munder1"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.funder1"></td>
                    </tr>
                    <tr>
                        <th scope="row">1-4  </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m1to4"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f1to4"></td>
                    </tr>
                    <tr>
                        <th scope="row">5-9  </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m5to9"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f5to9"></td>
                    </tr>
                    <tr>
                        <th scope="row">10-14 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m10to14"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f10to14"></td>
                    </tr>
                    <tr>
                        <th scope="row">15-19 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m15to19"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f15to19"></td>
                    </tr>
                    <tr>
                        <th scope="row">20-24 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m20to24"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f20to24"></td>
                    </tr>
                    <tr>
                        <th scope="row">25-29 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m25to29"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f25to29"></td>
                    </tr>
                    <tr>
                        <th scope="row">30-34</th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m30to34"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f30to34"></td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <div class="col-sm-6">
                <table class="table table-sm table-inputage">
                    <thead>
                    <tr>
                        <th scope="col" width="35%">Age Distribution <br>of Patients</th>
                        <th scope="col">Male</th>
                        <th scope="col">Female</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">35-39  </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m35to39"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f35to39"></td>
                    </tr>
                    <tr>
                        <th scope="row">40-44 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m40to44"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f40to44"></td>
                    </tr>
                    <tr>
                        <th scope="row">45-49 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m45to49"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f45to49"></td>
                    </tr>
                    <tr>
                        <th scope="row">50-54 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m50to54"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f50to54"></td>
                    </tr>
                    <tr>
                        <th scope="row">55-59 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m55to59"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f55to59"></td>
                    </tr>
                    <tr>
                        <th scope="row">60-64 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m60to64"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f60to64"></td>
                    </tr>
                    <tr>
                        <th scope="row">65-69 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m65to69"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f65to69"></td>
                    </tr>
                    <tr>
                        <th scope="row">70 & Over </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m70over"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f70over"></td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div> 
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-surgical-operations({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-click="operationsMortalityDeathCtrl.createOperationsMortalityDeathBtn(operationsMortalityDeathCtrl.collection)">Save changes</button>
        </div>
    </div>

</script>

<script type="text/ng-template" id="edit-mortality-death-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Mortality/Deaths Disaggregated as to Age and Sex</h5>
        <button type="button" class="close" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-mortality-death({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <label for="text" class="col-sm-4 col-form-label">Cause of Mortality (Underlying)
            (Do not include cardio-respiratory Arrest and maternal deaths)</label>
            <div class="col-sm-8">
            <textarea class="form-control" readonly="" ng-value="operationsMortalityDeathCtrl.collection.icd10desc"></textarea>
        </div>
        <br>
        <div class="table-responsive">
        <div class="form-group row">
                <div class="col-sm-6">
                <table class="table table-sm table-inputage">
                    <thead>
                    <tr>
                        <th scope="col" width="35%">Age Distribution <br>of Patients</th>
                        <th scope="col">Male</th>
                        <th scope="col">Female</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">Under 1 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.munder1"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.funder1"></td>
                    </tr>
                    <tr>
                        <th scope="row">1-4  </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m1to4"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f1to4"></td>
                    </tr>
                    <tr>
                        <th scope="row">5-9  </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m5to9"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f5to9"></td>
                    </tr>
                    <tr>
                        <th scope="row">10-14 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m10to14"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f10to14"></td>
                    </tr>
                    <tr>
                        <th scope="row">15-19 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m15to19"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f15to19"></td>
                    </tr>
                    <tr>
                        <th scope="row">20-24 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m20to24"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f20to24"></td>
                    </tr>
                    <tr>
                        <th scope="row">25-29 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m25to29"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f25to29"></td>
                    </tr>
                    <tr>
                        <th scope="row">30-34</th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m30to34"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f30to34"></td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <div class="col-sm-6">
                <table class="table table-sm table-inputage">
                    <thead>
                    <tr>
                        <th scope="col" width="35%">Age Distribution <br>of Patients</th>
                        <th scope="col">Male</th>
                        <th scope="col">Female</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">35-39  </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m35to39"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f35to39"></td>
                    </tr>
                    <tr>
                        <th scope="row">40-44 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m40to44"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f40to44"></td>
                    </tr>
                    <tr>
                        <th scope="row">45-49 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m45to49"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f45to49"></td>
                    </tr>
                    <tr>
                        <th scope="row">50-54 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m50to54"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f50to54"></td>
                    </tr>
                    <tr>
                        <th scope="row">55-59 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m55to59"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f55to59"></td>
                    </tr>
                    <tr>
                        <th scope="row">60-64 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m60to64"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f60to64"></td>
                    </tr>
                    <tr>
                        <th scope="row">65-69 </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m65to69"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f65to69"></td>
                    </tr>
                    <tr>
                        <th scope="row">70 & Over </th>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.m70over"></td>
                        <td><input type="number" class="form-control input-age" ng-model="operationsMortalityDeathCtrl.collection.f70over"></td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div> 
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-surgical-operations({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-click="operationsMortalityDeathCtrl.updateOperationsMortalityDeathBtn(operationsMortalityDeathCtrl.collection)">Save changes</button>
        </div>
    </div>

</script>