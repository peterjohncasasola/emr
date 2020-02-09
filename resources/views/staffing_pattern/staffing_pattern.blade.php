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
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputpatients" ui-sref="staffing-pattern-medical-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
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
                    <tr>
                        <td class="row-left"><%staffingPatternCtrl.staffingPatterns[15].posdesc%>    </td>
                        <td><%staffingPatternCtrl.staffingPatterns[15].values.specialtyboardcertified%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[15].values.fulltime40permanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[15].values.fulltime40contractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[15].values.parttimepermanent%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[15].values.parttimecontractual%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[15].values.activerotatingaffiliate%></td>
                        <td><%staffingPatternCtrl.staffingPatterns[15].values.outsourced%></td>
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
                        <td class="row-left">&nbsp;&nbsp;&nbsp;<%staffingPatternCtrl.staffingPatterns[17].posdesc%>   </td>
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
                    <td class="row-left">&nbsp;&nbsp;&nbsp;3.5. Others (Specify) </td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
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
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputpatients" ui-sref="staffing-pattern-allied-medical-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <button class="btn btn-icon icon-left btn-info" ng-disabled="staffingPatternCtrl.is_submit_disabled" ng-click="staffingPatternCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data <div id="cover-spin" ng-if="staffingPatternCtrl.is_loader_disabled"></div></button>
            </div>
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
                    <td class="row-left">13. Others (Specify)    </td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
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
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputpatients" ui-sref="staffing-pattern-non-medical-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <button class="btn btn-icon icon-left btn-info" ng-disabled="staffingPatternCtrl.is_submit_disabled" ng-click="staffingPatternCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data <div id="cover-spin" ng-if="staffingPatternCtrl.is_loader_disabled"></div></button>
            </div>
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
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
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
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
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
        <h5 class="modal-title">A. Medical</h5>
        <button type="button" class="close" ng-click="staffingPatternCtrl.close()" ui-sref="staffing-pattern({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">

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
                <td colspan="8">&nbsp;&nbsp;&nbsp;h. Others (Specify) <a href="#" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
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
                <td colspan="8">&nbsp;&nbsp;&nbsp;Specify<a href="#" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                </tr>
                <tr>
                    <td class="row-left"><%staffingPatternCtrl.collection[17].posdesc%>   </td>
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
                <td colspan="8">3.5 Others (Specify) <a href="#" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                </tr>                     
            </tbody>
            </table>
            </div>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="staffingPatternCtrl.close()" ui-sref="staffing-pattern({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary"  ng-if="!staffingPatternCtrl.collection_copy" ng-click="staffingPatternCtrl.createStaffingPatternBtn(staffingPatternCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="staffingPatternCtrl.collection_copy" ng-click="staffingPatternCtrl.updateStaffingPatternBtn(staffingPatternCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>

<script type="text/ng-template" id="add-staffing-pattern-allied-medical-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">B. Allied Medical</h5>
        <button type="button" class="close" ng-click="staffingPatternCtrl.close()" ui-sref="staffing-pattern({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">

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
                <td colspan="8">Others (Specify) <a href="#" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                <td><input type="number" class="form-control" id="" placeholder=""></td>
                </tr>                     
            </tbody>
            </table>
            </div>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="staffingPatternCtrl.close()" ui-sref="staffing-pattern({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary"  ng-if="!staffingPatternCtrl.collection_copy" ng-click="staffingPatternCtrl.createStaffingPatternBtn(staffingPatternCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="staffingPatternCtrl.collection_copy" ng-click="staffingPatternCtrl.updateStaffingPatternBtn(staffingPatternCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>

<script type="text/ng-template" id="add-staffing-pattern-non-medical-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">C. Non-Medical </h5>
        <button type="button" class="close" ng-click="staffingPatternCtrl.close()" ui-sref="staffing-pattern({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">

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
                <td colspan="8">8. Others (Specify) <a href="#" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
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
                <td colspan="8">&nbsp;&nbsp;&nbsp; - Others (Specify) <a href="#" class="btn btn-sm btn-icon icon-left btn-light"><i class="far fa-arrow-alt-circle-down"></i> Add Row</td>
                </tr>
                <tr>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                    <td><input type="number" class="form-control" id="" placeholder=""></td>
                </tr>                     
            </tbody>
            </table>
            </div>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="staffingPatternCtrl.close()" ui-sref="staffing-pattern({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary"  ng-if="!staffingPatternCtrl.collection_copy" ng-click="staffingPatternCtrl.createStaffingPatternBtn(staffingPatternCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="staffingPatternCtrl.collection_copy" ng-click="staffingPatternCtrl.updateStaffingPatternBtn(staffingPatternCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>