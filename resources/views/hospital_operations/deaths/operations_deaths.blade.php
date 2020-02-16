    

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
<li class="nav-item"><a href="#" ui-sref="nda({reportingyear:operationsDeathCtrl.reportingyear})" class="nav-link">NDA</a></li>
</ul>
</div>

<form class="form-inline ml-auto">
<select class="form-control selectric" ng-model="operationsDeathCtrl.reportingyear" ng-change="operationsDeathCtrl.selectReportingYear(operationsDeathCtrl.reportingyear)">
    <option value="<%reportingyear.year%>" ng-repeat="reportingyear in operationsDeathCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
            document.getElementById('logout-form').submit();"> 
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
<li class="nav-item" ui-sref="facility_profile({reportingyear:operationsDeathCtrl.reportingyear})">
    <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
</li>
<li class="nav-item" ui-sref="general-info({reportingyear:operationsDeathCtrl.reportingyear})">
    <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
</li>
<li class="nav-item active dropdown">
    <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
    <ul class="dropdown-menu">
    <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:operationsDeathCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:operationsDeathCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:operationsDeathCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:operationsDeathCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:operationsDeathCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:operationsDeathCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:operationsDeathCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:operationsDeathCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
        <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:operationsDeathCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
        </ul>
    </li>
    <li class="nav-item active dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
        <ul class="dropdown-menu">
        <li class="nav-item active" ui-sref="hospital-operations-death({reportingyear:operationsDeathCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
        <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:operationsDeathCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
        </ul>
    </li>
    <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:operationsDeathCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:operationsDeathCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
        <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:operationsDeathCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
        </ul>
    </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:operationsDeathCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
</li>
<li class="nav-item" ui-sref="expenses({reportingyear:operationsDeathCtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
</li>
<li class="nav-item" ui-sref="revenues({reportingyear:operationsDeathCtrl.reportingyear})">
    <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
</li>
</ul>
</div>
</nav>
    
    
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

        <div id="cover-spin" ng-if="operationsDeathCtrl.is_loader_disabled"></div>

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
                    <a href="#" class="btn btn-icon icon-left btn-primary" ui-sref="hospital-operations-death-details({reportingyear:operationsDeathCtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
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
        <button type="button" class="close" ng-click="operationsDeathCtrl.close()" ui-sref="hospital-operations-death({reportingyear:operationsDeathCtrl.reportingyear})">
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
                <td><input type="number" disabled="" class="form-control" ng-value="operationsDeathCtrl.collection.totaldeaths48down+operationsDeathCtrl.collection.totaldeaths48up"></td>
                </tr>
                <tr>
                <td class="align-middle">▪ Total deaths < 48 hours </td>
                <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.totaldeaths48down"></td>
                </tr>
                <tr>
                <td class="align-middle">▪ Total deaths ≥ 48 hours  </td>
                <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.totaldeaths48up"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of emergency room deaths  </td>
                <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.totalerdeaths"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of cases declared 'dead on arrival'   </td>
                <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.totaldoa"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of stillbirths  </td>
                <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.totalstillbirths"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of neonatal deaths   </td>
                <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.totalneonataldeaths"></td>
                </tr>
                <tr>
                <td class="align-middle">Total number of maternal deaths    </td>
                <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.totalmaternaldeaths"></td>
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
                    <td rowspan="2" class="align-middle"><input type="number" class="form-control" disabled="" ng-value="(operationsDeathCtrl.collection.totaldeathsnewborn*100)/operationsDeathCtrl.collection.totaldischargedeaths"></td>
                    <td rowspan="2" class="align-middle">=</td>
                    <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.totaldeathsnewborn"></td>
                    <td rowspan="2" class="align-middle">x100</td>
                    <td rowspan="2" class="align-middle"><b>Gross Death Rate  </b></td>
                    <td rowspan="2" class="align-middle">=</td>
                    <td>Total Deaths Newborn</td>
                    <td rowspan="2" class="align-middle">x100</td>
                    </tr>
                    <tr align="center">
                    <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.totaldischargedeaths"></td>
                    <td>Total Discharge Deaths  </td>
                    </tr>

                    <tr align="center">
                    <td rowspan="2" class="align-middle"><input type="number" class="form-control" disabled="" ng-value="(operationsDeathCtrl.collection.ndrnumerator*100)/operationsDeathCtrl.collection.ndrdenominator"></td>
                    <td rowspan="2" class="align-middle">=</td>
                    <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.ndrnumerator"></td>
                    <td rowspan="2" class="align-middle">x100</td>
                    <td rowspan="2" class="align-middle"><b>Net Death Rate    </b></td>
                    <td rowspan="2" class="align-middle">=</td>
                    <td>Total Deaths (including newborn for a given period) - death < 48 hours for the period</td>
                    <td rowspan="2" class="align-middle">x100</td>
                    </tr>
                    <tr align="center">
                    <td><input type="number" class="form-control" ng-model="operationsDeathCtrl.collection.ndrdenominator"></td>
                    <td>Total Discharges (including deaths and newborn) - death < 48 hours for the period </td>
                    </tr>
                </tbody>
                </table>
            </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="operationsDeathCtrl.close()" ui-sref="hospital-operations-death({reportingyear:operationsDeathCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!operationsDeathCtrl.collection_copy" ng-click="operationsDeathCtrl.createOperationsDeathBtn(operationsDeathCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="operationsDeathCtrl.collection_copy" ng-click="operationsDeathCtrl.updateOperationsDeathBtn(operationsDeathCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>