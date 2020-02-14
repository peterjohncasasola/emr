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
    </ul>
</div>

<form class="form-inline ml-auto">
    <select class="form-control selectric" ng-model="staffingPatternCtrl.reportingyear" ng-change="staffingPatternCtrl.selectReportingYear(staffingPatternCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in staffingPatternCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
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
        <a href="auth-login.html" class="dropdown-item has-icon text-danger">
        <i class="fas fa-sign-out-alt"></i> Logout
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
    <li class="nav-item" ui-sref="facility_profile({reportingyear:staffingPatternCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:staffingPatternCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:staffingPatternCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:staffingPatternCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:staffingPatternCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:staffingPatternCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:staffingPatternCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:staffingPatternCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:staffingPatternCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:staffingPatternCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:staffingPatternCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:staffingPatternCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:staffingPatternCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:staffingPatternCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:staffingPatternCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:staffingPatternCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item active">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:staffingPatternCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:staffingPatternCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:staffingPatternCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div>
</nav>

<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Staffing Pattern</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Staffing Pattern</div>
    </div>
    </div>

    <div class="section-body">
    <div id="cover-spin" ng-if="staffingPatternCtrl.is_loader_disabled"></div>
    <!-- <h2 class="section-title">Cards</h2>
    <p class="section-lead">
        Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
    </p> -->

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>A. Medical  </h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputpatients" ui-sref="staffing-pattern-medical-details({reportingyear:staffingPatternCtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
                <button class="btn btn-icon icon-left btn-info" ng-disabled="staffingPatternCtrl.is_submit_disabled" ng-click="staffingPatternCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data <div id="cover-spin" ng-if="staffingPatternCtrl.is_loader_disabled"></div></button>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm align table-staffing" border="1">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle">Profession/Position/Designation </th>
                        <th rowspan="2" class="align-middle">Specialty Board Certified </th>
                        <th colspan="2" class="align-middle">Total staff working full time<br>(at least 40 hours/week)  </th>
                        <th colspan="2" class="align-middle">Total staff working part time<br>(at least 20 hours/week)  </th>
                        <th rowspan="2" class="align-middle">Active Rotating or Visiting/ Affiliate  </th>
                        <th rowspan="2" class="align-middle">Outsourced</th>
                    </tr>
                    <tr>
                        <th class="align-middle">Number of permanent<br> full time staff </th>
                        <th class="align-middle">Number of contractual<br> full time staff </th>
                        <th class="align-middle">Number of permanent<br> part time staff </th>
                        <th class="align-middle">Number of contractual<br> part time staff</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[0].posdesc%>  </td> 
                        <td><%staffingPatternCtrl.staffingPatterns[0].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[0].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[0].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[0].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[0].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[0].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[0].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[1].posdesc%>    </td>
                        <td><%staffingPatternCtrl.staffingPatterns[1].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[1].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[1].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[1].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[1].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[1].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[1].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[2].posdesc%>     </td>
                        <td><%staffingPatternCtrl.staffingPatterns[2].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[2].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[2].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[2].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[2].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[2].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[2].values.outsourced%></td>
                    </tr>
                    <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[3].posdesc%>     </td>
                        <td><%staffingPatternCtrl.staffingPatterns[3].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[3].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[3].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[3].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[3].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[3].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[3].values.outsourced%></td>
                    </tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[4].posdesc%>     </td>
                        <td><%staffingPatternCtrl.staffingPatterns[4].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[4].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[4].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[4].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[4].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[4].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[4].values.outsourced%></td>
                    </tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[5].posdesc%>     </td>
                        <td><%staffingPatternCtrl.staffingPatterns[5].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[5].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[5].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[5].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[5].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[5].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[5].values.outsourced%></td>
                    </tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[6].posdesc%>     </td>
                        <td><%staffingPatternCtrl.staffingPatterns[6].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[6].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[6].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[6].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[6].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[6].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[6].values.outsourced%></td>
                    </tr>
                    <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[7].posdesc%>     </td>
                        <td><%staffingPatternCtrl.staffingPatterns[7].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[7].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[7].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[7].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[7].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[7].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[7].values.outsourced%></td>
                    </tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[8].posdesc%>     </td>
                        <td><%staffingPatternCtrl.staffingPatterns[8].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[8].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[8].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[8].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[8].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[8].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[8].values.outsourced%></td>
                    </tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[9].posdesc%>     </td>
                        <td><%staffingPatternCtrl.staffingPatterns[9].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[9].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[9].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[9].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[9].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[9].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[9].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[10].posdesc%>    </td>
                        <td><%staffingPatternCtrl.staffingPatterns[10].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[10].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[10].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[10].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[10].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[10].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[10].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[11].posdesc%>    </td>
                        <td><%staffingPatternCtrl.staffingPatterns[11].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[11].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[11].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[11].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[11].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[11].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[11].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[12].posdesc%>    </td>
                        <td><%staffingPatternCtrl.staffingPatterns[12].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[12].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[12].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[12].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[12].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[12].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[12].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[13].posdesc%>    </td>
                        <td><%staffingPatternCtrl.staffingPatterns[13].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[13].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[13].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[13].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[13].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[13].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[13].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[14].posdesc%> </td>
                        <td><%staffingPatternCtrl.staffingPatterns[14].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[14].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[14].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[14].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[14].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[14].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[14].values.outsourced%></td>
                    </tr>
                    <!-- consultants -->
                    <tr ng-repeat="consultant in staffingPatternCtrl.consultantList[0].values">

                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%consultant.professiondesignation%> </td>
                        <td><%consultant.specialtyboardcertified%> </td>
                        <td><%consultant.fulltime40permanent%> </td>
                        <td><%consultant.fulltime40contractual%> </td>
                        <td><%consultant.parttimepermanent%> </td>
                        <td><%consultant.parttimecontractual%> </td>
                        <td><%consultant.activerotatingaffiliate%> </td>
                        <td><%consultant.outsourced%> </td>
                    </tr> 
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[15].posdesc%>    </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> 
                    <!-- Graduate Fellows -->
                    <tr ng-repeat="consultant in staffingPatternCtrl.consultantList[1].values"> 

                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%consultant.professiondesignation%> </td>
                        <td><%consultant.specialtyboardcertified%> </td>
                        <td><%consultant.fulltime40permanent%> </td>
                        <td><%consultant.fulltime40contractual%> </td>
                        <td><%consultant.parttimepermanent%> </td>
                        <td><%consultant.parttimecontractual%> </td>
                        <td><%consultant.activerotatingaffiliate%> </td>
                        <td><%consultant.outsourced%> </td>
                    </tr> 
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[16].posdesc%>    </td>
                        <td><%staffingPatternCtrl.staffingPatterns[16].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[16].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[16].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[16].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[16].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[16].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[16].values.outsourced%></td>
                    </tr> 
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[17].posdesc%>  </td>
                        <td><%staffingPatternCtrl.staffingPatterns[17].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[17].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[17].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[17].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[17].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[17].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[17].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[18].posdesc%>   </td>
                        <td><%staffingPatternCtrl.staffingPatterns[18].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[18].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[18].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[18].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[18].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[18].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[18].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[19].posdesc%>   </td>
                        <td><%staffingPatternCtrl.staffingPatterns[19].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[19].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[19].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[19].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[19].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[19].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[19].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[20].posdesc%>   </td>
                        <td><%staffingPatternCtrl.staffingPatterns[20].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[20].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[20].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[20].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[20].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[20].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[20].values.outsourced%></td>
                    </tr>
                    <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;3.5. Others (Specify) 1 </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>
                    <!-- Graduate Fellows -->
                    <tr ng-repeat="other in staffingPatternCtrl.consultantList[2].values"> 

                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%other.professiondesignation%> </td>
                        <td><%other.specialtyboardcertified%> </td>
                        <td><%other.fulltime40permanent%> </td>
                        <td><%other.fulltime40contractual%> </td>
                        <td><%other.parttimepermanent%> </td>
                        <td><%other.parttimecontractual%> </td>
                        <td><%other.activerotatingaffiliate%> </td>
                        <td><%other.outsourced%> </td>
                    </tr> 
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-secondary">No Data Submitted</span>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>B. Allied Medical  </h4>
            <!-- <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputpatients" ui-sref="staffing-pattern-allied-medical-details({reportingyear:staffingPatternCtrl.reportingyear})"><i class="far fa-edit"></i> Input</a>
                <button class="btn btn-icon icon-left btn-info" ng-disabled="staffingPatternCtrl.is_submit_disabled" ng-click="staffingPatternCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data <div id="cover-spin" ng-if="staffingPatternCtrl.is_loader_disabled"></div></button>
            </div> -->
            </div>
            <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm table-staffing" border="1">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle">Profession/Position/Designation </th>
                        <th rowspan="2" class="align-middle">Specialty Board Certified </th>
                        <th colspan="2" class="align-middle">Total staff working full time<br>(at least 40 hours/week)  </th>
                        <th colspan="2" class="align-middle">Total staff working part time<br>(at least 20 hours/week)  </th>
                        <th rowspan="2" class="align-middle">Active Rotating or Visiting/ Affiliate  </th>
                        <th rowspan="2" class="align-middle">Outsourced</th>
                    </tr>
                    <tr>
                        <th class="align-middle">Number of permanent<br> full time staff </th>
                        <th class="align-middle">Number of contractual<br> full time staff </th>
                        <th class="align-middle">Number of permanent<br> part time staff </th>
                        <th class="align-middle">Number of contractual<br> part time staff</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[21].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[21].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[21].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[22].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[22].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[22].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[23].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[23].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[23].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[24].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[24].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[24].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[25].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[25].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[25].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[26].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[26].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[26].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[27].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[27].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[27].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[28].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[28].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[28].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[29].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[29].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[29].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[29].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[29].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[29].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[30].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[30].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[30].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[31].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[31].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[31].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[32].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[32].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[32].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                
                    <!-- Allied medical -->
                    <tr ng-repeat="other in staffingPatternCtrl.consultantList[3].values"> 
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%other.professiondesignation%> </td>
                        <td><%other.specialtyboardcertified%> </td>
                        <td><%other.fulltime40permanent%> </td>
                        <td><%other.fulltime40contractual%> </td>
                        <td><%other.parttimepermanent%> </td>
                        <td><%other.parttimecontractual%> </td>
                        <td><%other.activerotatingaffiliate%> </td>
                        <td><%other.outsourced%> </td>
                    </tr> 
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-secondary">No Data Submitted</span>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>C. Non-Medical  </h4>
            
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm table-staffing" border="1">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle">Profession/Position/Designation </th>
                        <th rowspan="2" class="align-middle">Specialty Board Certified </th>
                        <th colspan="2" class="align-middle">Total staff working full time<br>(at least 40 hours/week)  </th>
                        <th colspan="2" class="align-middle">Total staff working part time<br>(at least 20 hours/week)  </th>
                        <th rowspan="2" class="align-middle">Active Rotating or Visiting/ Affiliate  </th>
                        <th rowspan="2" class="align-middle">Outsourced</th>
                    </tr>
                    <tr>
                        <th class="align-middle">Number of permanent<br> full time staff </th>
                        <th class="align-middle">Number of contractual<br> full time staff </th>
                        <th class="align-middle">Number of permanent<br> part time staff </th>
                        <th class="align-middle">Number of contractual<br> part time staff</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[33].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[33].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[33].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[34].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[34].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[34].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[35].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[35].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[35].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[36].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[36].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[36].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[37].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[37].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[37].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[38].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[38].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[38].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[39].posdesc%>   </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[39].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[39].values.fulltime40contractual%></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="row-left">8. Others (Specify)   </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <!-- Non medical -->
                    <tr ng-repeat="other in staffingPatternCtrl.consultantList[4].values"> 
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%other.professiondesignation%> </td>
                        <td><%other.specialtyboardcertified%> </td>
                        <td><%other.fulltime40permanent%> </td>
                        <td><%other.fulltime40contractual%> </td>
                        <td><%other.parttimepermanent%> </td>
                        <td><%other.parttimecontractual%> </td>
                        <td><%other.activerotatingaffiliate%> </td>
                        <td><%other.outsourced%> </td>
                    </tr>
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[40].posdesc%>    </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[40].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[40].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[40].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[40].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[40].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[40].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[41].posdesc%> </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[41].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[41].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[41].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[41].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[41].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[41].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[42].posdesc%> </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[42].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[42].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[42].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[42].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[42].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[42].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[43].posdesc%> </td>
                        <td></td>
                        <td><%staffingPatternCtrl.staffingPatterns[43].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[43].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[43].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[43].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[43].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[43].values.outsourced%></td>
                    </tr>
                    <tr>
                        <td class="row-left">&nbsp;&nbsp;&nbsp;- Others (Specify)   </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    <!-- Non medical -->
                    <tr ng-repeat="other in staffingPatternCtrl.consultantList[5].values"> 
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%other.professiondesignation%> </td>
                        <td><%other.specialtyboardcertified%> </td>
                        <td><%other.fulltime40permanent%> </td>
                        <td><%other.fulltime40contractual%> </td>
                        <td><%other.parttimepermanent%> </td>
                        <td><%other.parttimecontractual%> </td>
                        <td><%other.activerotatingaffiliate%> </td>
                        <td><%other.outsourced%> </td>
                    </tr>
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-secondary">No Data Submitted</span>
            </div>
        </div>
        </div>

    </div>
    </div>
</section>

</div>


<script type="text/ng-template" id="add-staffing-pattern-medical-modal">
    <div class="modal-content">

    <div class="modal-header"> 
        <button type="button" class="close" ng-click="staffingPatternCtrl.close()" ui-sref="staffing-pattern({reportingyear:staffingPatternCtrl.reportingyear})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
    
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-sm table-staffing">
            <thead>
                <tr>
                <th rowspan="2" width="30%" class="align-left row-left">Profession/Position/Designation </th>
                <th rowspan="2" class="align-middle">Specialty Board Certified</th>
                <th colspan="2" class="align-middle">Total staff working full time<br>(at least 40 hours/week)  </th>
                <th colspan="2" class="align-middle" class="align-middle">Total staff working part time<br>(at least 20 hours/week)  </th>
                <th rowspan="2" class="align-middle">Active Rotating or Visiting/ Affiliate</th>
                <th rowspan="2" class="align-middle">Outsourced</th>
                </tr>
                <tr>
                <th> Number of permanent<br> full time staff   </th>
                <th> Number of contractual<br> full time staff </th>
                <th> Number of permanent<br> part time staff   </th>
                <th> Number of contractual<br> part time staff </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="8"> <h5 class="modal-title">A. Medical</h5> </td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[0].posdesc%>  </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[0].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[0].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[0].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[0].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[0].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[0].values.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[0].values.outsourced"></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[1].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[1].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[1].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[1].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[1].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[1].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[1].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[2].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[2].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[2].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[2].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[2].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[2].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[2].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[3].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[3].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[3].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[3].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[3].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[3].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[3].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[4].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[4].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[4].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[4].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[4].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[4].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[4].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[5].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[5].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[5].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[5].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[5].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[5].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[5].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[6].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[6].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[6].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[6].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[6].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[6].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[6].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[7].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[7].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[7].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[7].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[7].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[7].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[7].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[8].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[8].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[8].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[8].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[8].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[8].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[8].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr class="row-left row-gray">
                <td colspan="8">&nbsp;&nbsp;&nbsp;h. Others (Specify) <a href="#" ng-click="staffingPatternCtrl.createNewConsultantBtn($event)" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr ng-repeat="consultant in staffingPatternCtrl.others[0].values">
                    <td><input type="text" class="form-control" placeholder="" ng-model="consultant.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.outsourced"></td>
                </tr>
                <tr ng-repeat="consultant in staffingPatternCtrl.newConsultantList">
                    <td>
                        <a href="#" class="fas fa-trash-alt text-danger" ng-click="staffingPatternCtrl.newConsultantList.splice($index, 1)"></a> 
                        <input type="text" class="form-control" placeholder="" ng-model="consultant.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="consultant.outsourced"></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[9].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[9].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[9].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[9].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[9].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[9].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[9].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[10].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[10].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[10].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[10].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[10].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[10].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[10].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[11].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[11].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[11].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[11].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[11].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[11].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[11].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[12].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[12].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[12].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[12].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[12].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[12].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[12].values.activerotatingaffiliate"></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[13].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[13].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[13].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[13].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[13].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[13].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[13].values.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[13].values.outsourced"></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[14].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[14].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[14].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[14].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[14].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[14].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[14].values.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[14].values.outsourced"></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[15].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[15].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[15].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[15].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[15].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[15].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[15].values.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[15].values.outsourced"></td>
                </tr>
                <tr class="row-left row-gray">
                <td colspan="8">&nbsp;&nbsp;&nbsp;Specify<a href="#" ng-click="staffingPatternCtrl.createNewPostGraduateFellowsBtn($event)" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr ng-repeat="postGraduate in staffingPatternCtrl.others[1].values">
                    <td>
                        <input type="text" class="form-control" placeholder="" ng-model="postGraduate.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.outsourced"></td>
                </tr> 
                <tr ng-repeat="postGraduate in staffingPatternCtrl.newPostGraduateFellowList">
                    <td>
                        <a href="#" class="fas fa-trash-alt text-danger" ng-click="staffingPatternCtrl.newPostGraduateFellowList.splice($index, 1)"></a>
                        <input type="text" class="form-control" placeholder="" ng-model="postGraduate.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="postGraduate.outsourced"></td>
                </tr> 
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[16].posdesc%> </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[16].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[16].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[16].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[17].posdesc%> </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[17].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[17].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[17].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[18].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[18].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[18].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[18].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[19].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[19].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[19].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[19].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[20].posdesc%>   </td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[20].values.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[20].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[20].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="row-left row-gray">
                <td colspan="8">3.5 Others (Specify) <a href="#" ng-click="staffingPatternCtrl.createNewResidentsBtn($event)" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr ng-repeat="resident in staffingPatternCtrl.others[2].values">
                    <td>
                        <input type="text" class="form-control" placeholder="" ng-model="resident.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.outsourced"></td>
                </tr>
                <tr ng-repeat="resident in staffingPatternCtrl.newResidentsList">
                    <td> 
                        <a href="#" class="fas fa-trash-alt text-danger" ng-click="staffingPatternCtrl.newResidentsList.splice($index, 1)"></a>
                        <input type="text" class="form-control" placeholder="" ng-model="resident.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="resident.outsourced"></td>
                </tr>  
                <tr>
                    <td colspan="8"> <h5 class="modal-title">B. Allied Medical</h5> </td>
                </tr>

                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[21].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[21].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[21].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[22].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[22].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[22].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[23].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[23].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[23].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[24].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[24].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[24].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[25].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[25].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[25].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[26].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[26].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[26].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[27].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[27].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[27].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[28].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[28].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[28].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[29].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[29].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[29].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[30].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[30].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[30].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[31].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[31].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[31].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[32].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[32].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[32].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="row-left row-gray">
                <td colspan="8">Others (Specify) <a href="#" ng-click="staffingPatternCtrl.createNewAlliedMedicalBtn($event)" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr ng-repeat="other in staffingPatternCtrl.others[3].values">
                    <td>
                        <input type="text" class="form-control" placeholder="" ng-model="other.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.outsourced"></td>
                </tr>
                <tr ng-repeat="other in staffingPatternCtrl.newAlliedMedicalList">
                    <td>
                    <a href="#" class="fas fa-trash-alt text-danger" ng-click="staffingPatternCtrl.newAlliedMedicalList.splice($index, 1)"></a>
                        <input type="text" class="form-control" placeholder="" ng-model="other.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.outsourced"></td>
                </tr>      

                <tr>
                    <td colspan="8"> <h5 class="modal-title">C. Non Medical</h5> </td>
                </tr>   

                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[33].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[33].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[33].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[34].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[34].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[34].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[35].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[35].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[35].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[36].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[36].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[36].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[37].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[37].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[37].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[38].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[38].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[38].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[39].posdesc%>  </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[39].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[39].values.fulltime40contractual"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr class="row-left row-gray">
                <td colspan="8">8. Others (Specify) <a href="#" ng-click="staffingPatternCtrl.createNewNonMedicalBtn($event)"  class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr ng-repeat="other in staffingPatternCtrl.others[4].values">
                    <td>
                        <input type="text" class="form-control" placeholder="" ng-model="other.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.outsourced"></td>
                </tr>
                <tr ng-repeat="other in staffingPatternCtrl.newNonMedicalList">
                    <td>
                    <a href="#" class="fas fa-trash-alt text-danger" ng-click="staffingPatternCtrl.newNonMedicalList.splice($index, 1)"></a>
                        <input type="text" class="form-control" placeholder="" ng-model="other.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.outsourced"></td>
                </tr>  
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[40].posdesc%>   </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[40].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[40].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[40].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[40].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[40].values.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[40].values.outsourced"></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[41].posdesc%>   </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[41].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[41].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[41].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[41].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[41].values.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[41].values.outsourced"></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[42].posdesc%>   </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[42].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[42].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[42].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[42].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[42].values.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[42].values.outsourced"></td>
                </tr>
                <tr>
                    <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.collection[43].posdesc%>   </td>
                    <td></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[43].values.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[43].values.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[43].values.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[43].values.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[43].values.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="staffingPatternCtrl.collection[43].values.outsourced"></td>
                </tr>
                <tr class="row-left row-gray">
                <td colspan="8">&nbsp;&nbsp;&nbsp; - Others (Specify) <a href="#" ng-click="staffingPatternCtrl.createNewGeneralStaffBtn($event)"  class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr> 
                <tr ng-repeat="other in staffingPatternCtrl.others[5].values">
                    <td>
                        <input type="text" class="form-control" placeholder="" ng-model="other.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.outsourced"></td>
                </tr>
                <tr ng-repeat="other in staffingPatternCtrl.newGeneralStaffList">
                    <td>
                    <a href="#" class="fas fa-trash-alt text-danger" ng-click="staffingPatternCtrl.newGeneralStaffList.splice($index, 1)"></a>
                        <input type="text" class="form-control" placeholder="" ng-model="other.professiondesignation"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.specialtyboardcertified"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40permanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.fulltime40contractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimepermanent"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.parttimecontractual"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.activerotatingaffiliate"></td>
                    <td><input type="number" class="form-control" placeholder="" ng-model="other.outsourced"></td>
                </tr> 
                
            </tbody>
            </table>
            </div>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="staffingPatternCtrl.close()" ui-sref="staffing-pattern({reportingyear:staffingPatternCtrl.reportingyear})">Close</button>
            <button type="button" class="btn btn-primary"  ng-if="!staffingPatternCtrl.collection_copy" ng-click="staffingPatternCtrl.createStaffingPatternBtn(staffingPatternCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="staffingPatternCtrl.collection_copy" ng-click="staffingPatternCtrl.updateStaffingPatternBtn(staffingPatternCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>
