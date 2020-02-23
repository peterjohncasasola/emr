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
    <li class="nav-item"><a href="#" ng-click="dischargesMorbidityCtrl.routeTo('nda/2019')"  class="nav-link">NDA</a></li>
    <li class="nav-item"><a href="#" ng-click="dischargesMorbidityCtrl.routeTo('eula/2019')"  class="nav-link">EULA</a></li>
    </ul>
</div>
 
<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="dischargesMorbidityCtrl.reportingyear" ng-change="dischargesMorbidityCtrl.selectReportingYear(dischargesMorbidityCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in dischargesMorbidityCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
            document.getElementById('logout-form').submit();" ng-click="dischargesMorbidityCtrl.routeTo('logout')"> 
            <i class="fas fa-sign-out-alt"></i>Sign out
        </a>
    </div>
    </li>
</ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
<div class="container">
    <ul class="navbar-nav">
    <li class="nav-item" ui-sref="dashboard({reportingyear:dischargesMorbidityCtrl.reportingyear})">
        <a href="dashboard.html" class="nav-link"><i class="far fa-chart-bar"></i><span>Dashboard</span></a>
    </li>
    <li class="nav-item" ui-sref="facility_profile({reportingyear:dischargesMorbidityCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:dischargesMorbidityCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item active dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item active" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:dischargesMorbidityCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:dischargesMorbidityCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:dischargesMorbidityCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:dischargesMorbidityCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:dischargesMorbidityCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div>
</nav>

<!-- Folating Submitted Report -->
<a href="submitted-reports.html" class="float" ui-sref="submitted-reports({reportingyear:dischargesMorbidityCtrl.reportingyear})">
<i class="fa fa-paper-plane my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Submitted Reports</div>
<i class="fa fa-play label-arrow"></i>
</div>
<!-- End Floating Submitted Report -->    
    
    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Discharges</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Hospital Operations</div>
              <div class="breadcrumb-item active">Ten Leading causes of Morbidity/Diseases Disaggregated based as to Age and Sex</div>
            </div>
        </div>

        <div class="section-body">
        <div id="cover-spin" ng-if="dischargesMorbidityCtrl.is_loader_disabled"></div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Ten Leading causes of Morbidity/Diseases Disaggregated based as to Age and Sex</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputmortality" ng-click="dischargesMorbidityCtrl.selectIcdType()"><i class="far fa-edit"></i> Select</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesMorbidityCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
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

                        
                        <tr ng-repeat="discharges_morbidity in dischargesMorbidityCtrl.discharges_morbidity">
                            <td><%discharges_morbidity.icd10desc%></td>
                            <td><%discharges_morbidity.munder1%></td>
                            <td><%discharges_morbidity.funder1%></td>
                            <td><%discharges_morbidity.m1to4%></td>
                            <td><%discharges_morbidity.f1to4%></td>
                            <td><%discharges_morbidity.m5to9%></td>
                            <td><%discharges_morbidity.f5to9%></td>
                            <td><%discharges_morbidity.m10to14%></td>
                            <td><%discharges_morbidity.f10to14%></td>
                            <td><%discharges_morbidity.m15to19%></td>
                            <td><%discharges_morbidity.f15to19%></td>
                            <td><%discharges_morbidity.m20to24%></td>
                            <td><%discharges_morbidity.f20to24%></td>
                            <td><%discharges_morbidity.m25to29%></td>
                            <td><%discharges_morbidity.f25to29%></td>
                            <td><%discharges_morbidity.m30to34%></td>
                            <td><%discharges_morbidity.f30to34%></td>
                            <td><%discharges_morbidity.m35to39%></td>
                            <td><%discharges_morbidity.f35to39%></td>
                            <td><%discharges_morbidity.m40to44%></td>
                            <td><%discharges_morbidity.f40to44%></td>
                            <td><%discharges_morbidity.m45to49%></td>
                            <td><%discharges_morbidity.f45to49%></td>
                            <td><%discharges_morbidity.m50to54%></td>
                            <td><%discharges_morbidity.f50to54%></td>
                            <td><%discharges_morbidity.m55to59%></td>
                            <td><%discharges_morbidity.f55to59%></td>
                            <td><%discharges_morbidity.m60to64%></td>
                            <td><%discharges_morbidity.f60to64%></td>
                            <td><%discharges_morbidity.m65to69%></td>
                            <td><%discharges_morbidity.f65to69%></td>
                            <td><%discharges_morbidity.m70over%></td>
                            <td><%discharges_morbidity.f70over%></td>
                            <td><%discharges_morbidity.msubtotal%></td>
                            <td><%discharges_morbidity.fsubtotal%></td>
                            <td><%discharges_morbidity.grandtotal%></td>
                            <td><%discharges_morbidity.icd10code%></td>
                            <td>
                                <a href="" class="fas fa-edit text-warning" ui-sref="hospital-operations-discharges-morbidity-details({reportingyear:dischargesMorbidityCtrl.reportingyear, icd10code:discharges_morbidity.icd10code, action:'edit'})"></a>
                                <a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesMorbidityCtrl.deleteDischargesMorbidityBtn(discharges_morbidity.id)"></a>
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

<script type="text/ng-template" id="select-discharges-morbidity-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">ICD-10 | PHILIPPINE MODIFICATION</h5>
        <button type="button" class="close" ng-click="dischargesMorbidityCtrl.close()" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesMorbidityCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="table-responsive">
        <table datatable="" dt-options="dischargesMorbidityCtrl.dtOptions" dt-columns="dischargesMorbidityCtrl.dtColumns" class="table table-bordered table-hover table-md" ></table>
        </div>
    </div>

    <!-- <div class="modal-body">
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
                    <tr ng-repeat="ricd10 in dischargesMorbidityCtrl.ricd10">
                        <td><a href="" ng-click="dischargesMorbidityCtrl.chooseRicd10Code(ricd10.icd10code)"> <%ricd10.icd10code%> </a></td>
                        <td><%ricd10.icd10desc%></td>
                        <td><%ricd10.icd10cat%></td>
                    </tr>
            </tbody>
            </table>
        </div>

    </div> -->

</script>


<script type="text/ng-template" id="add-discharges-morbidity-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Morbidity/Diseases Disaggregated based as to Age and Sex</h5>
        <button type="button" class="close" ng-click="dischargesMorbidityCtrl.close()" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesMorbidityCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <label for="text" class="col-sm-4 col-form-label">Cause of Mortality (Underlying)
            (Do not include cardio-respiratory Arrest and maternal deaths)</label>
            <div class="col-sm-8">
            <textarea class="form-control" readonly="" ng-value="dischargesMorbidityCtrl.collection.icd10desc"></textarea>
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
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.munder1"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.funder1"></td>
                    </tr>
                    <tr>
                        <th scope="row">1-4  </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m1to4"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f1to4"></td>
                    </tr>
                    <tr>
                        <th scope="row">5-9  </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m5to9"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f5to9"></td>
                    </tr>
                    <tr>
                        <th scope="row">10-14 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m10to14"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f10to14"></td>
                    </tr>
                    <tr>
                        <th scope="row">15-19 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m15to19"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f15to19"></td>
                    </tr>
                    <tr>
                        <th scope="row">20-24 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m20to24"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f20to24"></td>
                    </tr>
                    <tr>
                        <th scope="row">25-29 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m25to29"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f25to29"></td>
                    </tr>
                    <tr>
                        <th scope="row">30-34</th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m30to34"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f30to34"></td>
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
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m35to39"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f35to39"></td>
                    </tr>
                    <tr>
                        <th scope="row">40-44 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m40to44"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f40to44"></td>
                    </tr>
                    <tr>
                        <th scope="row">45-49 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m45to49"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f45to49"></td>
                    </tr>
                    <tr>
                        <th scope="row">50-54 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m50to54"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f50to54"></td>
                    </tr>
                    <tr>
                        <th scope="row">55-59 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m55to59"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f55to59"></td>
                    </tr>
                    <tr>
                        <th scope="row">60-64 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m60to64"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f60to64"></td>
                    </tr>
                    <tr>
                        <th scope="row">65-69 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m65to69"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f65to69"></td>
                    </tr>
                    <tr>
                        <th scope="row">70 & Over </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m70over"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f70over"></td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div> 
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesMorbidityCtrl.close()" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesMorbidityCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-click="dischargesMorbidityCtrl.createDischargesMorbidityBtn(dischargesMorbidityCtrl.collection)">Save changes</button>
        </div>
    </div>

</script>

<script type="text/ng-template" id="edit-discharges-morbidity-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title"> Edit Morbidity/Diseases Disaggregated based as to Age and Sex</h5>
        <button type="button" class="close" ng-click="dischargesMorbidityCtrl.close()" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesMorbidityCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <label for="text" class="col-sm-4 col-form-label">Cause of Mortality (Underlying)
            (Do not include cardio-respiratory Arrest and maternal deaths)</label>
            <div class="col-sm-8">
            <textarea class="form-control" readonly="" ng-value="dischargesMorbidityCtrl.collection.icd10desc"></textarea>
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
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.munder1"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.funder1"></td>
                    </tr>
                    <tr>
                        <th scope="row">1-4  </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m1to4"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f1to4"></td>
                    </tr>
                    <tr>
                        <th scope="row">5-9  </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m5to9"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f5to9"></td>
                    </tr>
                    <tr>
                        <th scope="row">10-14 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m10to14"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f10to14"></td>
                    </tr>
                    <tr>
                        <th scope="row">15-19 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m15to19"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f15to19"></td>
                    </tr>
                    <tr>
                        <th scope="row">20-24 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m20to24"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f20to24"></td>
                    </tr>
                    <tr>
                        <th scope="row">25-29 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m25to29"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f25to29"></td>
                    </tr>
                    <tr>
                        <th scope="row">30-34</th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m30to34"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f30to34"></td>
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
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m35to39"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f35to39"></td>
                    </tr>
                    <tr>
                        <th scope="row">40-44 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m40to44"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f40to44"></td>
                    </tr>
                    <tr>
                        <th scope="row">45-49 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m45to49"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f45to49"></td>
                    </tr>
                    <tr>
                        <th scope="row">50-54 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m50to54"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f50to54"></td>
                    </tr>
                    <tr>
                        <th scope="row">55-59 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m55to59"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f55to59"></td>
                    </tr>
                    <tr>
                        <th scope="row">60-64 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m60to64"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f60to64"></td>
                    </tr>
                    <tr>
                        <th scope="row">65-69 </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m65to69"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f65to69"></td>
                    </tr>
                    <tr>
                        <th scope="row">70 & Over </th>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.m70over"></td>
                        <td><input type="number" class="form-control input-age" ng-model="dischargesMorbidityCtrl.collection.f70over"></td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div> 
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesMorbidityCtrl.close()" ui-sref="hospital-operations-discharges-morbidity({reportingyear:dischargesMorbidityCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-click="dischargesMorbidityCtrl.updateDischargesMorbidityBtn(dischargesMorbidityCtrl.collection)">Save changes</button>
        </div>
    </div>

</script>