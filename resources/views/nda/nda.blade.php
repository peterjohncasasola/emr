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
    <li class="nav-item active"><a href="{{ route('logout') }}" class="nav-link">NDA</a></li>
    </ul>
</div>
 
<form class="form-inline ml-auto">
    <!-- <select class="form-control selectric" ng-model="UsersCtrl.reportingyear" ng-change="UsersCtrl.selectReportingYear(UsersCtrl.reportingyear)">
        <option value="<%reportingyear.year%>" ng-repeat="reportingyear in UsersCtrl.reportingyears"> Reporting Year <%reportingyear.year%> </option>
    </select> -->
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
            <a class="dropdown-item has-icon text-danger" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <i class="fas fa-sign-out-alt"></i>Sign out</a>
    </div>
    </li>
</ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
<!-- <div class="container">
    <ul class="navbar-nav">
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
    <li class="nav-item" ui-sref="expenses({reportingyear:expensesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:expensesCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div> -->
</nav>

<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Non Disclosure Agreement (NDA)  </h1>
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
            <p><b>This Non Disclosure Agreement (NDA) is for the purpose of preventing the unauthorized disclosure 
            of Confidential lnformation as defined below:</b></p>
            </div>
            <div class="card-body">
            <ol type="1">
                <li>Definition of Confidential lnformation. Confidential information includes, but is not limited to, protected health information, personal financial information, patient records, or information gained from committee meetings, hospital or facility visits during accreditation and investigation,inquiries from members, patients or other employees and partners. The definition is further expanded to include the following:</li>
                <ol type="a">
                    <li>Member and their dependents' personal and financial information including photographs and biometric identifiers, such as retinas or iris scans, fingerprints, voiceprints, or scan of hand for face geometry; </li>
                    <li>Privileged health information, such as patient records, medical diagnoses, medical procedures, and related documents, and </li>
                    <li>Personal information of accredited health care professionals and providers, except those relating to the delivery of services or practice of profession, such as provider or clinic addresses, accreditation status, or duration of accreditation.</li>
                </ol>
                <li>0bligations of Partner. Partner shall hold and maintain the Confidential lnformation in strictest confidence for the sole and exclusive benefit of the Company. ln this regard,as a user/partner/provider, l agree that:</li>
                <ol type="a">
                    <li>I WILL uphold the Company's commitment towards the confidentiality and privacy of the above-mentioned confidential information at all times:</li>
                    <li>I WILL keep my user account such as username and password secret and I will never share this information with any0ne;</li>
                    <li>I WILL report any unauthorized use of disclosure of confidential information;</li>
                    <li>I WIll hold and maintain all confidential information in trust and confidence and shall use resonable efforts to protect them from any harm, tampering, unauthorized access, sabotage, exploitation, manipulation, modification,interference, misuse or misappropriation;</li>
                    <li>I WILL NEITHER use these confidential information for my own benefit NOR give, review, publish, sell, copy, dispose, or otherwise disclose to others, or permit the use by others for their benefit or to the detriment of the Company;</li>
                    <li>I WILL not use anyone else's user account to gain access to other system of the Company;</li>
                    <li>I WILL NOT disclose any confidential information if I am no longer connected with the Company; and</li>
                    <li>I KNOW that confidential information I learn in the job is a result of providing authorized access/services and does not belong to me.</li>
                </ol>
            </ol>
            <br><hr>
            <p>I fully understand the concepts regarding confidentiality and privacy of confidential health information. ln addition, I also know and agree that my failure to fulfill any of the agreements set forth in this Agreement and/or my violation of any terms of this Agreement shall result in my being subject to appropriate and/or legal aclions including termination of employment.</p>
            
            <a href="#" class="btn btn-icon icon-left btn-success" ng-click="UsersCtrl.acceptNdaBtn()"><i class="fas fa-check"></i> I agree</a> &nbsp;
            <a href="#" class="btn btn-icon icon-left btn-secondary" ng-click="UsersCtrl.rejectNdaBtn()"><i class="fas fa-times"></i> I don't agree</a>
            </div>
            <div class="card-footer bg-whitesmoke">
            </div>
        </div>
        </div>

    </div>
    </div>
</section>
</div>

