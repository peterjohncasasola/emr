        

<nav class="navbar navbar-expand-lg main-navbar">
<a href="index.html" class="navbar-brand sidebar-gone-hide">Online Health Facility Statistical Report System</a>
<a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
<div class="nav-collapse">
<a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
<i class="fas fa-ellipsis-v"></i>
</a>
<ul class="navbar-nav">
<li class="nav-item"><a href="#" class="nav-link">Reports</a></li>
<li class="nav-item"><a href="#" class="nav-link">Forms</a></li>
<li class="nav-item"><a href="#" class="nav-link">FAQs</a></li>
<li class="nav-item"><a href="#" ui-sref="nda({reportingyear:operationsMortalityDeathCtrl.reportingyear})" class="nav-link">NDA</a></li>
</ul>
</div>

<form class="form-inline ml-auto">
<select class="form-control selectric" ng-model="operationsMortalityDeathCtrl.reportingyear" ng-change="operationsMortalityDeathCtrl.selectReportingYear(operationsMortalityDeathCtrl.reportingyear)">
    <option value="<%reportingyear.year%>" ng-repeat="reportingyear in operationsMortalityDeathCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
</select>
</form>

<ul class="navbar-nav navbar-right">
<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
@if(Config::get('defaults.default.is_local')==1)
    <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
@else
    <img alt="image" src="public/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
@endif
<div class="d-sm-none d-lg-inline-block">Hi, Administrator</div></a>
<div class="dropdown-menu dropdown-menu-right">
    <a href="features-profile.html" class="dropdown-item has-icon">
    <i class="far fa-user"></i> Profile
    </a>
    <a href="features-activities.html" class="dropdown-item has-icon">
    <i class="fas fa-bolt"></i> Change Passord
    </a>
    <a href="features-settings.html" class="dropdown-item has-icon">
    <i class="fas fa-cog"></i> Settings
    </a>
    <div class="dropdown-divider"></div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            {{ csrf_field() }}
        </form>
        <a class="dropdown-item has-icon text-danger" href="" 
            onclick="event.preventDefault(); 
            document.getElementById('logout-form').submit();" ng-click="operationsMortalityDeathCtrl.routeTo('logout')"> 
            <i class="fas fa-sign-out-alt"></i>Sign out
        </a>
</div>
</li>
</ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
<div class="container">
<ul class="navbar-nav">
<!-- <li class="nav-item">
    <a href="dashboard.html" class="nav-link"><i class="far fa-chart-bar"></i><span>Dashboard</span></a>
</li> -->
<li class="nav-item" ui-sref="facility_profile({reportingyear:operationsMortalityDeathCtrl.reportingyear})">
    <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
</li>
<li class="nav-item" ui-sref="general-info({reportingyear:operationsMortalityDeathCtrl.reportingyear})">
    <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
</li>
<li class="nav-item active dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
    <ul class="dropdown-menu">
    <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:operationsMortalityDeathCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
        </ul>
    </li>
    <li class="nav-item active dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
        <li class="nav-item active" ui-sref="hospital-operations-mortality-death({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
        </ul>
    </li>
    <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
        </ul>
    </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:operationsMortalityDeathCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
</li>
<li class="nav-item" ui-sref="expenses({reportingyear:operationsMortalityDeathCtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
</li>
<li class="nav-item" ui-sref="revenues({reportingyear:operationsMortalityDeathCtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
</li>
</ul>
</div>
</nav>
    
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

        <div id="cover-spin" ng-if="operationsMortalityDeathCtrl.is_loader_disabled"></div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Ten Leading Causes of Mortality/Deaths Disaggregated as to Age and Sex  </h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputmortality" ng-click="operationsMortalityDeathCtrl.selectIcdType()"><i class="far fa-edit"></i> Input</a>
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
                                <a href="" class="fas fa-edit text-warning" ui-sref="hospital-operations-mortality-death-details({reportingyear:operationsMortalityDeathCtrl.reportingyear, icd10code:mortality_death.icd10code, action:'edit'})"></a>
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
        <button type="button" class="close" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-mortality-death({reportingyear:operationsMortalityDeathCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1" datatable="ng">
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-surgical-operations({reportingyear:operationsMortalityDeathCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!operationsMortalityDeathCtrl.collection_copy" ng-click="operationsMortalityDeathCtrl.createDischargeOPVBtn(operationsMortalityDeathCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="operationsMortalityDeathCtrl.collection_copy" ng-click="operationsMortalityDeathCtrl.updateDischargeOPVBtn(operationsMortalityDeathCtrl.collection)">Update changes</button>
        </div> -->
    </div>

</script>


<script type="text/ng-template" id="add-mortality-death-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Mortality/Deaths Disaggregated as to Age and Sex</h5>
        <button type="button" class="close" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-mortality-death({reportingyear:operationsMortalityDeathCtrl.reportingyear})">
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-surgical-operations({reportingyear:operationsMortalityDeathCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-click="operationsMortalityDeathCtrl.createOperationsMortalityDeathBtn(operationsMortalityDeathCtrl.collection)">Save changes</button>
        </div>
    </div>

</script>

<script type="text/ng-template" id="edit-mortality-death-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Mortality/Deaths Disaggregated as to Age and Sex</h5>
        <button type="button" class="close" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-mortality-death({reportingyear:operationsMortalityDeathCtrl.reportingyear})">
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
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsMortalityDeathCtrl.close()" ui-sref="hospital-operations-surgical-operations({reportingyear:operationsMortalityDeathCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-click="operationsMortalityDeathCtrl.updateOperationsMortalityDeathBtn(operationsMortalityDeathCtrl.collection)">Save changes</button>
        </div>
    </div>

</script>