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
    <li class="nav-item"><a href="#" ng-click="UsersCtrl.routeTo('nda/2019')"  class="nav-link">NDA</a></li>
    <li class="nav-item active"><a href="#" ng-click="UsersCtrl.routeTo('eula/2019')"  class="nav-link">EULA</a></li>
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
            <a class="dropdown-item has-icon text-danger" href="" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" ng-click="UsersCtrl.routeTo('logout')"> 
                <i class="fas fa-sign-out-alt"></i>Sign out
            </a>
    </div>
    </li>
</ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
@if(Auth::user()->is_nda_accepted==1)
<div class="container">
    <ul class="navbar-nav">
    <li class="nav-item" ui-sref="facility_profile({reportingyear:UsersCtrl.reportingyear})">
        <a href="facility-profile.html" class="nav-link"><i class="far fa-hospital"></i><span>Facility Profile</span></a>
    </li>
    <li class="nav-item" ui-sref="general-info({reportingyear:UsersCtrl.reportingyear})">
        <a href="general-information.html" class="nav-link"><i class="far fa-list-alt"></i><span>General Information</span></a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Hospital Operations</span></a>
        <ul class="dropdown-menu">
        <li class="nav-item" ui-sref="hospital-operations-summary-of-patients({reportingyear:UsersCtrl.reportingyear})"><a href="#" class="nav-link">Summary of Patients in the Hospital</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Discharges</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-discharges-specialty({reportingyear:UsersCtrl.reportingyear})"><a href="hospital-operations/discharges-a.html" class="nav-link">Type of Service and Total Discharges According to Specialty</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-morbidity({reportingyear:UsersCtrl.reportingyear})"><a href="hospital-operations/discharges-b.html" class="nav-link">Ten Leading causes of Morbidity/Diseases Disaggregated as to Age and Sex</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-number-deliveries({reportingyear:UsersCtrl.reportingyear})"> <a href="#" class="nav-link">Total Number of Deliveries</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opv({reportingyear:UsersCtrl.reportingyear})"><a href="#" class="nav-link"> Outpatient Visits</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-opd({reportingyear:UsersCtrl.reportingyear})"><a href="#l" class="nav-link">Ten Leading OPD Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-er({reportingyear:UsersCtrl.reportingyear})"><a href="#" class="nav-link">Ten Leading ER Consultations</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-testing({reportingyear:UsersCtrl.reportingyear})"><a href="#" class="nav-link">Testing and Other Services</a></li>
            <li class="nav-item" ui-sref="hospital-operations-discharges-ev({reportingyear:UsersCtrl.reportingyear})"><a href="#" class="nav-link">Emergency Visits</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Deaths</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-death({reportingyear:UsersCtrl.reportingyear})"><a href="#" class="nav-link">Total Number of Deaths</a></li>
            <li class="nav-item" ui-sref="hospital-operations-mortality-death({reportingyear:UsersCtrl.reportingyear})"><a href="hospital-operations/deaths-b.html" class="nav-link">Ten Leading causes of Mortality/Deaths Disaggregated as to Age and Sex</a></li>
            </ul>
        </li>
        <li class="nav-item" ui-sref="hospital-operations-hai({reportingyear:UsersCtrl.reportingyear})"><a href="#" class="nav-link">Healthcare Associated Infections (HAI)</a></li>
        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Surgical Operations</a>
            <ul class="dropdown-menu">
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-major({reportingyear:UsersCtrl.reportingyear})"><a href="hospital-operations/surgical-a.html" class="nav-link">Ten Leading Major Operations (Not Applicable for Infirmary)</a></li>
            <li class="nav-item" ui-sref="hospital-operations-surgical-operations-minor({reportingyear:UsersCtrl.reportingyear})"><a href="hospital-operations/surgical-b.html" class="nav-link">Ten Leading Minor Operations</a></li>
            </ul>
        </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="#" class="nav-link" ui-sref="staffing-pattern({reportingyear:UsersCtrl.reportingyear})"><i class="far fa-user"></i><span>Staffing Pattern</span></a>
    </li>
    <li class="nav-item" ui-sref="expenses({reportingyear:UsersCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-check-square"></i><span>Expenses</span></a>
    </li>
    <li class="nav-item" ui-sref="revenues({reportingyear:UsersCtrl.reportingyear})">
        <a href="#" class="nav-link"><i class="far fa-money-bill-alt"></i><span>Revenues</span></a>
    </li>
    </ul>
</div>
@endif
</nav>

<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>End User License Agreement (EULA)</h1>
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
            <p><b>Terms of EMR</b></p>
            </div>
            <div class="card-body">
            <p>By using the Electronic Medical Record (EMR), you agree to the following terms and conditions ("Terms of EMR"). EMR is registered by Providers Medical Center (the "Company"), based in Naguilian, Isabela. The Company reserves the right to update and change these Terms of EMR without notice. Your account may be terminated if you violate any of the Terms of EMR.</p>
            <div class="eula">
                <ol>
                <li>Purpose of the EMR
                    <ol>
                    <li>The EMR exists to transmit report containing information required by the Department of Health (DOH) as one of the pre-requisites in the issuance of License to Operate (LTO) </li>
                    <li>The EMR is not intended to provide legal, tax, or financial advice. You should consult an attorney, accountant, or other financial adviser who is fully aware of your individual circumstances before making any decisions based on information and advice provided by the EMR.</li>
                    </ol>
                </li>
                <li>Use of the EMR
                    <ol>
                    <li>You agree that you will only use the EMR for your own personal use and internal business purposes.</li>
                    <li>Your right to access the EMR is personal to you and may not be transferred to any other entity or person. It is your obligation to maintain accurate registration and account information. The EMR may not function effectively if your account information is not maintained.</li>
                    <li>You agree that the Company may use your feedback, suggestions or ideas in any way, including in modifications to the EMR, other products or EMRs, or in publicity materials, and grant the Company a perpetual, royalty-free, unencumbered license to use the feedback you provide.</li>
                    <li>You are aware that the technical processing and transmission of the EMR, including your content, may be transferred unencrypted and involve transmissions over various networks, and changed to conform and adapt to technical requirements of connecting networks or devices.</li>
                    <li>You agree to provide all equipment and software necessary to connect to the EMR, including but not limited to a web-enabled device that is suitable to connect with and use the EMR. You are solely responsible for any fees, including Internet connection or mobile fees, that you incur when accessing the EMR.</li>
                    </ol>
                </li>
                <li>Prohibited acts
                    <ol>
                    <li>You agree you will not upload any content that is in violation of any applicable laws in your jurisdiction.</li>
                    <li>You agree you will not use any robot, spider, or other automated data-gathering device to access or monitor the EMR or any portion thereof without explicit written consent of the Company.</li>
                    <li>You agree you will not interfere with the ability of the Company to operate and maintain the EMR by uploading or transmitting any worms, viruses, Trojan horses, keyloggers, or other malware.</li>
                    <li>You agree you will not use the EMR to send unsolicited bulk messages ("spam").</li>
                    <li>You agree you will not upload any content that is defamatory, harassing, obscene, or pornographic.</li>
                    <li>You agree to not reverse-engineer, decompile or disassemble any of the software that makes up the EMR.</li>
                    <li>You agree to not take any action that will impose an unreasonable or disproportionate load on the EMR’s infrastructure.</li>
                    <li>You agree you will not upload any content that infringes on or misappropriates any third party’s intellectual property rights, privacy rights, contractual rights, proprietary rights, or publicity rights.</li>
                    <li>You agree you will not upload any individually identifiable health information that violates the Data Privacy Act.</li>
                    </ol>
                </li>
                <li>User accounts
                    <ol>
                    <li>You must be human. Accounts registered by automated methods, such as by "bot," are not allowed.</li>
                    <li>You are responsible for maintaining the security of your account and password. The Company cannot and will not be responsible for any damage or loss resulting from your failure to secure your account or password. If you suspect that your account has been breached, it is your obligation to notify the Company of any unauthorized use of your account.</li>
                    <li>The EMR is not intended for minors under the age of 18. By accepting these Terms of EMR, you represent and warrant that you are not a minor, and are at least 18 years old.</li>
                    </ol>
                </li>
                <li>User content
                    <ol>
                    <li>You are responsible for all content posted under your account, as well as any activity that occurs under your account.</li>
                    <li>The Company does not pre-screen uploaded user content, but reserves the right in its sole discretion to refuse or remove any content made available by the EMR.</li>
                    </ol>
                </li>
                <li>Third-party accounts
                    <ol>
                    <li>The EMR will not permit you to log in using third-party applications.</li>
                    </ol>
                </li>
                <li>Intellectual property rights
                    <ol>
                    <li>All data provided by users remains intellectual property or proprietary content owned or licensed by the Company. All such intellectual property or proprietary rights are reserved by the Company and any third-party owners of those rights.</li>
                    <li>You agree you will not use the Company’s intellectual property or proprietary content on behalf of any third party, to create derivative works, or in connection with any product or EMR without the express written consent of the Company.</li>
                    </ol>
                </li>
                <li>Use of cookies
                    <ol>
                    <li>A cookie is a small piece of information stored on your computer in the form of a file. The Company uses cookies to monitor performance and to facilitate functionality of the EMR.</li>
                    <li>You may refuse the use of cookies by adjusting your browser settings, but if you do so you may not be able to use the full functionality of the EMR. By using the EMR, you consent to the use of cookies and the use of the data they provide.</li>
                    </ol>
                </li>
                <li>General provisions
                    <ol>
                    <li>The failure of the Company to exercise or enforce any right or provision of the Terms of EMR is not a waiver of such right or provision. The Terms of EMR constitute the entire agreement between you and the Company and govern your use of the EMR, superseding any prior agreements between you and the Company (including, but not limited to, any prior versions of the Terms of EMR).</li>
                    <li>If any provision of these Terms of EMR is determined to be void or unenforceable, the remaining provisions of these Terms of EMR will remain in force.</li>
                    <li>The Terms of EMR constitutes the entire agreement between you and the Company, superseding any other agreements, both oral and written.</li>
                    <li>Agreeing to these Terms of EMR does not affect any engagement letter or other agreements in force between you and the Company. In the event of a conflict between the Terms of EMR and other agreements in force between you and the Company, these Terms of EMR shall govern where they pertain to your use of the EMR.</li>
                    </ol>
                </li>   
                </ol>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            </div>
        </div>
        </div>

    </div>
    </div>
</section>
</div>

