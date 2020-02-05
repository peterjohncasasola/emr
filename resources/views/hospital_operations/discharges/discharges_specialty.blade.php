<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Hospital Operations</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Hospital Operations</div>
        <div class="breadcrumb-item active">Type of Service and Total Discharges According to Specialty</div>
    </div>
    </div>

    <div class="section-body">
    <div class="row">


        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Type of Service and Total Discharges According to Specialty</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputdischarges_d" ui-sref="hospital-operations-discharges-specialty-new({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesSpecialtyCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm" border="1" style="font-size: 13px;">
                <thead>
                    <tr align="center" style="background: #f5f5f5;">
                    <th rowspan="3" class="align-middle">Type of Service  </th>
                    <th rowspan="3" class="align-middle">No. of Patients </th>
                    <th rowspan="3" class="align-middle" style="border-right: 2px solid gray;">Total Length of Stay/Total No. of Days Stay  </th>
                    <th colspan="8" style="border-right: 2px solid gray;"> A. Type of Accomodation  </th>
                    <th colspan="9" style="border-right: 2px solid gray;"> B. Condition on Discharge  </th>
                    <th class="align-middle" rowspan="3" style="border-right: 1px solid gray;"> Remarks</th>
                    <th class="align-middle" rowspan="3"> </th>
                    </tr>
                    <tr align="center">
                    <td colspan="3">Non-Philhealth  </td>
                    <td colspan="3">Philhealth</td>
                    <td class="align-middle" rowspan="2">HMO</td>
                    <td class="align-middle" rowspan="2" style="border-right: 2px solid gray;">OWWA</td>
                    <td class="align-middle" rowspan="2">Recovered/<br>Improved (R/I)</td>
                    <td class="align-middle" rowspan="2">Transferred<br>(T)</td>
                    <td class="align-middle" rowspan="2">Home Against<br>Medical Advice (HMA)</td>
                    <td class="align-middle" rowspan="2">Absconded<br>(A)</td>
                    <td class="align-middle" rowspan="2">Unimproved<br>(U)</td>
                    <td class="align-middle" colspan="3">Deaths</td>
                    <td class="align-middle" rowspan="2" style="border-right: 2px solid gray;"><b>Total Discharges</b></td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    <td class="align-middle">< 48 hrs</td>
                    <td class="align-middle">≥ 48 hrs</td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[0].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[0].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[0].value.id, 1)"></a></td>
                    </tr>
                    <tr>
                    <td><%dischargesSpecialtyCtrl.type_of_service_list[1].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[1].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[1].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[1].value.id, 2)"></a></td>
                    </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[2].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[2].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[2].value.id, 3)"></a></td>
                    </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[3].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[3].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[3].value.id, 4)"></a></td>
                    </tr>
                    <tr bgcolor="#f5f5f5"> <td  align="left" colspan="22"> <b>Surgery</b> </td> </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[4].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[4].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[4].value.id, 5)"></a></td>
                    </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[5].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[5].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[5].value.id, 6)"></a></td>
                    </tr>
                    
                    <tr bgcolor="#f5f5f5"> <td  align="left" colspan="22"><b>Other(s)</b> </td> </tr>
                    <tr ng-repeat="others in dischargesSpecialtyCtrl.type_of_service_list[6].value">
                        <td><%others.othertypeofservicespecify%></td>
                        <td><%others.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%others.totallengthstay%></td>
                        <td><%others.nppay%></td>
                        <td><%others.nphservicecharity%></td>
                        <td><%others.nphtotal%></td>
                        <td><%others.phpay%></td>
                        <td><%others.phservice%></td>
                        <td><%others.phtotal%></td>
                        <td><%others.hmo%></td>
                        <td><%others.owwa%></td>
                        <td><%others.recoveredimproved%></td>
                        <td><%others.transferred%></td>
                        <td><%others.hama%></td>
                        <td><%others.absconded%></td>
                        <td><%others.unimproved%></td>
                        <td><%others.deathsbelow48%></td>
                        <td><%others.deathsover48%></td>
                        <td><%others.totaldeaths%></td>
                        <td><%others.totaldischarges%></td>
                        <td><%others.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(others.id, 7)"></a></td>
                    </tr>
                    <!-- <tr bgcolor="#e8e8e8">
                    <td><b>Total</b></td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.nopatients+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.nopatients+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.nopatients+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.nopatients+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.nopatients+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.nopatients
                        %>
                    </td>
                    <td style="border-right: 2px solid gray;">
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.totallengthstay+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.totallengthstay+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.totallengthstay+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.totallengthstay+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.totallengthstay+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.totallengthstay
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.nppay+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.nppay+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.nppay+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.nppay+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.nppay+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.nppay
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.nphservicecharity+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.nphservicecharity+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.nphservicecharity+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.nphservicecharity+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.nphservicecharity+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.nphservicecharity
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.nphtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.nphtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.nphtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.nphtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.nphtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.nphtotal
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.phtotal
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.phservice+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.phservice+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.phservice+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.phservice+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.phservice+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.phservice
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.phtotal
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.hmo+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.hmo+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.hmo+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.hmo+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.hmo+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.hmo
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.owwa+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.owwa+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.owwa+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.owwa+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.owwa+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.owwa
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.recoveredimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.recoveredimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.recoveredimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.recoveredimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.recoveredimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.recoveredimproved
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.transferred+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.transferred+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.transferred+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.transferred+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.transferred+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.transferred
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.hama+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.hama+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.hama+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.hama+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.hama+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.hama
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.absconded+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.absconded+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.absconded+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.absconded+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.absconded+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.absconded
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.unimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.unimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.unimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.unimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.unimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.unimproved
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.deathsbelow48+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.deathsbelow48+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.deathsbelow48+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.deathsbelow48+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.deathsbelow48+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.deathsbelow48
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.deathsover48+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.deathsover48+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.deathsover48+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.deathsover48+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.deathsover48+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.deathsover48
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.totaldeaths+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.totaldeaths+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.totaldeaths+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.totaldeaths+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.totaldeaths+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.totaldeaths
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[0].value.totaldischarges+
                            dischargesSpecialtyCtrl.type_of_service_list[1].value.totaldischarges+
                            dischargesSpecialtyCtrl.type_of_service_list[2].value.totaldischarges+
                            dischargesSpecialtyCtrl.type_of_service_list[3].value.totaldischarges+
                            dischargesSpecialtyCtrl.type_of_service_list[4].value.totaldischarges+
                            dischargesSpecialtyCtrl.type_of_service_list[5].value.totaldischarges
                        %>
                    </td>
                    <td></td>
                    <td></td>
                    </tr>
                    <tr bgcolor="#e8e8e8">
                    <td><b>Total Newborn</b></td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.nopatients+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.nopatients
                        %>
                    </td>
                    <td style="border-right: 2px solid gray;">
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.totallengthstay+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.totallengthstay
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.nppay+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.nppay
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.nphservicecharity+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.nphservicecharity
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.nphtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.nphtotal
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.phtotal
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.phservice+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.phservice
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.phtotal+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.phtotal
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.hmo+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.hmo
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.owwa+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.owwa
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.recoveredimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.recoveredimproved
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.transferred+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.transferred
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.hama+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.hama
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.absconded+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.absconded
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.unimproved+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.unimproved
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.deathsbelow48+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.deathsbelow48
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.deathsover48+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.deathsover48
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.totaldeaths+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.totaldeaths
                        %>
                    </td>
                    <td>
                        <%
                            dischargesSpecialtyCtrl.type_of_service_list[7].value.totaldischarges+
                            dischargesSpecialtyCtrl.type_of_service_list[8].value.totaldischarges
                        %>
                    </td>
                    <td></td>
                    <td></td>
                    </tr> -->
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[7].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[7].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[7].value.id, 8)"></a></td>
                    </tr>
                    <tr>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].desc%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.nopatients%></td> 
                        <td style="border-right: 2px solid gray;"><%dischargesSpecialtyCtrl.type_of_service_list[8].value.totallengthstay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.nppay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.nphservicecharity%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.nphtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.phpay%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.phservice%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.phtotal%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.hmo%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.owwa%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.recoveredimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.transferred%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.hama%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.absconded%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.unimproved%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.deathsbelow48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.deathsover48%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.totaldeaths%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.totaldischarges%></td>
                        <td><%dischargesSpecialtyCtrl.type_of_service_list[8].value.remarks%></td>
                        <td><a href="" class="fas fa-trash-alt text-danger" ng-click="dischargesSpecialtyCtrl.deleteDischargeSpecialtyBtn(dischargesSpecialtyCtrl.type_of_service_list[8].value.id, 9)"></a></td>
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


<script type="text/ng-template" id="add-discharges-specialty-modal">
<form>
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Type of Service and Total Discharges According to Specialty</h5>
        <button type="button" class="close" ng-click="dischargesSpecialtyCtrl.close()" ui-sref="hospital-operations-discharges-specialty({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
                <label class="col-sm-1 col-form-label"> Select Type of Service: </label>
                <div class="col-sm-2">
                    <select class="form-control selectric" ng-model="dischargesSpecialtyCtrl.collection.typeofservice">
                    <option ng-value="type_of_service.id" ng-repeat="type_of_service in dischargesSpecialtyCtrl.type_of_services"><%type_of_service.desc%></option>
                    </select>
                </div>
                <label for="" class="col-sm-1 col-form-label" ng-if="dischargesSpecialtyCtrl.collection.typeofservice==7">Name of Service:</label>
                <div class="col-sm-2" ng-if="dischargesSpecialtyCtrl.collection.typeofservice==7">
                    <input type="text" class="form-control" id="" placeholder=""  ng-model="dischargesSpecialtyCtrl.collection.othertypeofservicespecify">
                </div>
                <label for="" class="col-sm-1 col-form-label">No. of Patients:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nopatients">
                </div>
                <label for="" class="col-sm-1 col-form-label">Total Length of Stay/Total No. of Days Stay:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.totallengthstay">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm long-table" border="1" style="font-size: 13px;">
                <thead>
                    <tr style="background: #E8E8E8;">
                    <th colspan="8"> A. Type of Accomodation  </th>
                    </tr>
                    <tr align="center">
                    <td colspan="3">Non-Philhealth  </td>
                    <td colspan="3">Philhealth</td>
                    <td class="align-middle" rowspan="2">HMO</td>
                    <td class="align-middle" rowspan="2">OWWA</td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nppay"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nphservicecharity"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.nppay+dischargesSpecialtyCtrl.collection.nphservicecharity"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.phpay"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.phservice"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.phpay+dischargesSpecialtyCtrl.collection.phservice"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.hmo"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.owwa"></td>
                    </tr>
                </tbody>
                </table>    
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm long-table" border="1" style="font-size: 13px;">
                <thead>
                    <tr style="background: #E8E8E8;">
                    <th colspan="9"> B. Condition on Discharge  </th>
                    </tr>
                    <tr align="center">
                    <td class="align-middle" rowspan="2">Recovered/<br>Improved (R/I)</td>
                    <td class="align-middle" rowspan="2">Transferred<br>(T)</td>
                    <td class="align-middle" rowspan="2">Home Against<br>Medical Advice (HMA)</td>
                    <td class="align-middle" rowspan="2">Absconded<br>(A)</td>
                    <td class="align-middle" rowspan="2">Unimproved<br>(U)</td>
                    <td class="align-middle" colspan="3">Deaths</td>
                    <td class="align-middle" rowspan="2"><b>Total Discharges</b></td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">< 48 hrs</td>
                    <td class="align-middle">≥ 48 hrs</td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.recoveredimproved"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.transferred"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.hama"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.absconded"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.unimproved"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.deathsbelow48"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.deathsover48"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.deathsbelow48+dischargesSpecialtyCtrl.collection.deathsover48"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.hmo+
                                                                                            dischargesSpecialtyCtrl.collection.owwa+
                                                                                            dischargesSpecialtyCtrl.collection.recoveredimproved+
                                                                                            dischargesSpecialtyCtrl.collection.transferred+
                                                                                            dischargesSpecialtyCtrl.collection.hama+
                                                                                            dischargesSpecialtyCtrl.collection.absconded+
                                                                                            dischargesSpecialtyCtrl.collection.unimproved"></td>
                    </tr>
                </tbody>
                </table>    
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label"> Remarks: </label>
                <div class="col-sm-11">
                <input type="text" class="form-control" id="" required="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.remarks"></td>
                </div>
            </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesSpecialtyCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!dischargesSpecialtyCtrl.collection_copy" ng-click="dischargesSpecialtyCtrl.createDischargeSpecialtyBtn(dischargesSpecialtyCtrl.collection)">Save changes</button>
        </div>
    </div>
</form>

</script>

<!-- <script type="text/ng-template" id="edit-discharges-specialty-modal">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Type of Service and Total Discharges According to Specialty</h5>
        <button type="button" class="close" ng-click="dischargesSpecialtyCtrl.close()" ui-sref="hospital-operations-discharges-specialty({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
                <label class="col-sm-1 col-form-label"> Select Type of Service: </label>
                <div class="col-sm-4">
                    <select class="form-control selectric" ng-model="dischargesSpecialtyCtrl.collection.typeofservice">
                    <option value="1">Medicine</option>
                    <option value="2">Obstetrics</option>
                    <option value="3">Gynecology</option>
                    </select>
                </div>
                <label for="" class="col-sm-1 col-form-label">No. of Patients:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nopatients">
                </div>
                <label for="" class="col-sm-2 col-form-label">Total Length of Stay/Total No. of Days Stay:</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.totallengthstay">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm long-table" border="1" style="font-size: 13px;">
                <thead>
                    <tr style="background: #E8E8E8;">
                    <th colspan="8"> A. Type of Accomodation  </th>
                    </tr>
                    <tr align="center">
                    <td colspan="3">Non-Philhealth  </td>
                    <td colspan="3">Philhealth</td>
                    <td class="align-middle" rowspan="2">HMO</td>
                    <td class="align-middle" rowspan="2">OWWA</td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    <td class="align-middle">Pay</td>
                    <td class="align-middle">Service/Charity </td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nppay"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.nphservicecharity"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.nppay+dischargesSpecialtyCtrl.collection.nphservicecharity"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.phpay"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.phservice"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.phpay+dischargesSpecialtyCtrl.collection.phservice"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.hmo"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.owwa"></td>
                    </tr>
                </tbody>
                </table>    
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm long-table" border="1" style="font-size: 13px;">
                <thead>
                    <tr style="background: #E8E8E8;">
                    <th colspan="9"> B. Condition on Discharge  </th>
                    </tr>
                    <tr align="center">
                    <td class="align-middle" rowspan="2">Recovered/<br>Improved (R/I)</td>
                    <td class="align-middle" rowspan="2">Transferred<br>(T)</td>
                    <td class="align-middle" rowspan="2">Home Against<br>Medical Advice (HMA)</td>
                    <td class="align-middle" rowspan="2">Absconded<br>(A)</td>
                    <td class="align-middle" rowspan="2">Unimproved<br>(U)</td>
                    <td class="align-middle" colspan="3">Deaths</td>
                    <td class="align-middle" rowspan="2"><b>Total Discharges</b></td>
                    </tr>
                    <tr align="center">
                    <td class="align-middle">< 48 hrs</td>
                    <td class="align-middle">≥ 48 hrs</td>
                    <td class="align-middle"><b>Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.recoveredimproved"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.transferred"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.hama"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.absconded"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.unimproved"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.deathsbelow48"></td>
                    <td><input type="number" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.deathsover48"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.deathsbelow48+dischargesSpecialtyCtrl.collection.deathsover48"></td>
                    <td><input type="number" class="form-control" id="" disabled="" ng-value="dischargesSpecialtyCtrl.collection.hmo+
                                                                                            dischargesSpecialtyCtrl.collection.owwa+
                                                                                            dischargesSpecialtyCtrl.collection.recoveredimproved+
                                                                                            dischargesSpecialtyCtrl.collection.transferred+
                                                                                            dischargesSpecialtyCtrl.collection.hama+
                                                                                            dischargesSpecialtyCtrl.collection.absconded+
                                                                                            dischargesSpecialtyCtrl.collection.unimproved"></td>
                    </tr>
                </tbody>
                </table>    
            </div>
            <div class="form-group row">
                <label class="col-sm-1 col-form-label"> Remarks: </label>
                <div class="col-sm-11">
                <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesSpecialtyCtrl.collection.remarks"></td>
                </div>
            </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesSpecialtyCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesSpecialtyCtrl.collection_copy" ng-click="dischargesSpecialtyCtrl.updateDischargeSpecialtyBtn(dischargesSpecialtyCtrl.collection)">Update changes</button>
        </div>
    </div>

</script> -->