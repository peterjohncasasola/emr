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
    <li class="nav-item"><a href="#" ng-click="expensesCtrl.routeTo('nda/2019')"  class="nav-link">NDA</a></li>
    <li class="nav-item"><a href="#" ng-click="expensesCtrl.routeTo('eula/2019')"  class="nav-link">EULA</a></li>
    </ul>
</div>
 
<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="expensesCtrl.reportingyear" ng-change="expensesCtrl.selectReportingYear(expensesCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in expensesCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
                document.getElementById('logout-form').submit();" ng-click="expensesCtrl.routeTo('logout')"> 
                <i class="fas fa-sign-out-alt"></i>Sign out
            </a>
    </div>
    </li>
</ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
<div class="container">
    <ul class="navbar-nav">
    <li class="nav-item" ui-sref="dashboard({reportingyear:expensesCtrl.reportingyear})">
        <a href="dashboard.html" class="nav-link"><i class="far fa-chart-bar"></i><span>Dashboard</span></a>
    </li>
    <li class="nav-item" ui-sref="facility_profile({reportingyear:expensesCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:expensesCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:expensesCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:expensesCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:expensesCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:expensesCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:expensesCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item active" ui-sref="expenses({reportingyear:expensesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:expensesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div>
</nav>

<!-- Folating Submitted Report -->
<a href="submitted-reports.html" class="float" ui-sref="submitted-reports({reportingyear:expensesCtrl.reportingyear})">
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
    <h1>Expenses</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Expenses</div>
    </div>
    </div>

    <div class="section-body">
    <div id="cover-spin" ng-if="expensesCtrl.is_loader_disabled"></div>

    <div class="row">

 
 
    <div class="mb-4">
            <div class="text-small float-right font-weight-bold text-muted">11%</div>
            <div class="font-weight-bold mb-1">Hospital Operations</div>
            <div class="progress " data-height="3">
                <div class="progress-bar" role="progressbar" data-width="11%" aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            </div>

        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4></h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputexpenses" ui-sref="expenses-details({reportingyear:expensesCtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
                <button class="btn btn-icon icon-left btn-info" ng-disabled="expensesCtrl.is_submit_disabled" ng-click="expensesCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data </button>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered table-hover table-md" >
                <thead>
                    <tr>
                    <th>Expenses</th>
                    <th>Amount in Peso (Php)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Amount spent on personnel salaries and wages  </td>
                        <td align="right"><%expensesCtrl.expense.salarieswages | number:2%></td>
                    </tr>
                    <tr>
                        <td>Amount spent on benefits for employees (benefits are in addition to wages/salaries. Benefits include for example: social security contributions, health insurance)  </td>
                        <td align="right"><%expensesCtrl.expense.employeebenefits | number:2%></td>
                    </tr>
                    <tr>
                        <td>Allowances provided to employees at this facility (Allowances are in addition to wages/salaries. Allowances include for example: clothing allowance, PERA, vehicle maintenance allowance and hazard pay.)  </td>
                        <td align="right"><%expensesCtrl.expense.allowances | number:2%></td>
                    </tr>
                    <tr class="text-bold">
                        <td>TOTAL amount spent on all personnel including wages, salaries, benefits and allowances for last year (PS) </td>
                        <td align="right"><%expensesCtrl.expense.totalps | number:2%></td>
                    </tr>
                    <tr>
                        <td>Total amount spent on medicines </td>
                        <td align="right"><%expensesCtrl.expense.totalamountmedicine | number:2%></td>
                    </tr>
                    <tr>
                        <td>Total amount spent on medical supplies (i.e. syringe, gauze, etc.; exclude pharmaceuticals)  </td>
                        <td align="right"><%expensesCtrl.expense.totalamountmedicalsupplies | number:2%></td>
                    </tr>
                    <tr>
                        <td>Total amount spent on utilities  </td>
                        <td align="right"><%expensesCtrl.expense.totalamountutilities | number:2%></td>
                    </tr>
                    <tr>
                        <td>Total amount spent on non-medical services (For example: security, food service, laundry, waste management) </td>
                        <td align="right"><%expensesCtrl.expense.totalamountnonmedicalservice | number:2%></td>
                    </tr>
                    <tr class="text-bold">
                        <td>TOTAL amount spent on maintenance and other operating expenditures (MOOE)  </td>
                        <td align="right"><%expensesCtrl.expense.totalmooe | number:2%></td>
                    </tr>
                    <tr>
                    <td>Amount spent on infrastructure (i.e., new hospital wing, installation of ramps) </td>
                    <td align="right"><%expensesCtrl.expense.amountinfrastructure | number:2%></td>
                    </tr>
                    <tr>
                    <td>Amount spent on equipment (i.e. x-ray machine, CT scan) </td>
                    <td align="right"><%expensesCtrl.expense.amountequipment | number:2%></td>
                    </tr>
                    <tr class="text-bold">  
                    <td>TOTAL amount spent on capital outlay (CO) </td>
                    <td align="right"><%expensesCtrl.expense.totalco | number:2%></td>
                    </tr>
                </tbody>
                <tfoot class="text-bold">  
                    <tr>
                    <td>GRAND TOTAL </td>
                    <td align="right"><%expensesCtrl.expense.grandtotal | number:2%></td>
                    </tr>
                </tfoot>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-success">Success: <%expensesCtrl.expense.submitted_at%></span>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
 



 

 
<!-- <table datatable="" dt-options="expensesCtrl.dtOptions" dt-columns="expensesCtrl.dtColumns" class="table table-bordered table-hover table-md" ></table>
</div> -->

 
 
 

<script type="text/ng-template" id="add-expense-modal">


<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Expenses</h5>
        <button type="button" class="close" ng-click="expensesCtrl.close()" ui-sref="expenses({reportingyear:expensesCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">

    <br>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.salarieswages">
            </div>
            <label for="" class="col-sm-9 col-form-label">Amount spent on personnel salaries and wages </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.employeebenefits">
            </div>
            <label for="" class="col-sm-9 col-form-label">Amount spent on benefits for employees (benefits are in addition to wages/salaries. Benefits include for example: social security contributions, health insurance)  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.allowances">
            </div>
            <label for="" class="col-sm-9 col-form-label">Allowances provided to employees at this facility (Allowances are in addition to wages/salaries. Allowances include for example: clothing allowance, PERA, vehicle maintenance allowance and hazard pay.)    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" disabled="" placeholder="" ng-model="expensesCtrl.collection.totalps" ng-value="expensesCtrl.collection.salarieswages+expensesCtrl.collection.employeebenefits+expensesCtrl.collection.allowances">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>TOTAL amount spent on all personnel including wages, salaries, benefits and allowances for last year (PS)    </b></label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.totalamountmedicine">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total amount spent on medicines    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.totalamountmedicalsupplies">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total amount spent on medical supplies (i.e. syringe, gauze, etc.; exclude pharmaceuticals)    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.totalamountutilities">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total amount spent on utilities    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.totalamountnonmedicalservice">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total amount spent on non-medical services (For example: security, food service, laundry, waste management)    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" disabled="" placeholder="" ng-model="expensesCtrl.collection.totalmooe" ng-value="expensesCtrl.collection.totalamountmedicine+expensesCtrl.collection.totalamountmedicalsupplies+expensesCtrl.collection.totalamountutilities+expensesCtrl.collection.totalamountnonmedicalservice">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>TOTAL amount spent on maintenance and other operating expenditures (MOOE)</b></label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.amountinfrastructure">
            </div>
            <label for="" class="col-sm-9 col-form-label">Amount spent on infrastructure (i.e., new hospital wing, installation of ramps)    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.amountequipment">
            </div>
            <label for="" class="col-sm-9 col-form-label">Amount spent on equipment (i.e. x-ray machine, CT scan)  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" disabled="" placeholder="" ng-model="expensesCtrl.collection.totalco" ng-value="expensesCtrl.collection.amountinfrastructure+expensesCtrl.collection.amountequipment">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>TOTAL amount spent on capital outlay (CO)</b></label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" disabled="" ng-value="expensesCtrl.collection.salarieswages+
                expensesCtrl.collection.employeebenefits+
                expensesCtrl.collection.allowances+
                expensesCtrl.collection.totalamountmedicine+
                expensesCtrl.collection.totalamountmedicalsupplies+
                expensesCtrl.collection.totalamountutilities+
                expensesCtrl.collection.totalamountnonmedicalservice+
                expensesCtrl.collection.amountinfrastructure+
                expensesCtrl.collection.amountequipment">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>GRAND TOTAL</b></label>
        </div>

        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="expensesCtrl.close()" ui-sref="expenses({reportingyear:expensesCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!expensesCtrl.collection_copy" ng-click="expensesCtrl.createExpenseBtn(expensesCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="expensesCtrl.collection_copy" ng-click="expensesCtrl.updateExpenseBtn(expensesCtrl.collection)">Update changes</button>
        </div>
</div>
</script>


