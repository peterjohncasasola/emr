<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>General Information</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">General Information</div>
    </div>
    </div>

    <div class="section-body">
    <!-- <h2 class="section-title">Cards</h2>
    <p class="section-lead">
        Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
    </p> -->

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Classification</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputclassification" ui-sref="general-info-classification({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="generalInfoCtrl.sendDataClassificationDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <tr>
                    <td>Service Capability</td>
                    <td><%generalInfoCtrl.classification.servicecapability%></td>
                </tr>
                <tr>
                    <td>General</td>
                    <td><%generalInfoCtrl.classification.general%></td>
                </tr>
                <tr>
                    <td>Specialty</td>
                    <td><%generalInfoCtrl.classification.specialty%></td>
                </tr>
                <tr>
                    <td>Specialty (Specify) </td>
                    <td><%generalInfoCtrl.classification.specialtyspecify%></td>
                </tr>
                <tr>
                    <td>Trauma Capability </td>
                    <td><%generalInfoCtrl.classification.traumacapability%></td>
                </tr>
                <tr>
                    <td>Nature Of Ownership </td>
                    <td><%generalInfoCtrl.classification.natureofownership%></td>
                </tr>
                <tr>
                    <td>Government</td>
                    <td><%generalInfoCtrl.classification.government%></td>
                </tr>
                <tr>
                    <td>National</td>
                    <td><%generalInfoCtrl.classification.national%></td>
                </tr>
                <tr>
                    <td>Local</td>
                    <td><%generalInfoCtrl.classification.local%></td>
                </tr>
                <tr>
                    <td>Private</td>
                    <td><%generalInfoCtrl.classification.private%></td>
                </tr>
                <tr>
                    <td>Others</td>
                    <td><%generalInfoCtrl.classification.ownershipothers%></td>
                </tr>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-success">Success: Jan 20, 2020 07:07</span>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Bed Capacity/Occupancy</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputoccupancy" ui-sref="general-info-bed-capacity({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="generalInfoCtrl.sendDataBedCapacityDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <tr>
                    <td>Authorized Bed Capacity <br> [Refer to current License to Operate(LTO)]</td>
                    <td align="right"><%generalInfoCtrl.general_info.abc%></td>
                </tr>
                <tr>
                    <td>Implementing Beds</td>
                    <td align="right"><%generalInfoCtrl.general_info.implementingbeds%></td>
                </tr>
                <tr>
                    <td>Bed Occupancy Rate (BOR) Based on Authorized Beds</td>
                    <td align="right"><%generalInfoCtrl.general_info.bor%></td>
                </tr>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-success">Success: Jan 20, 2020 07:07</span>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4>Quality Management</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputquality" ui-sref="general-info-quality-management({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="generalInfoCtrl.sendDataQualityManagementDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Quality Management Type</th>
                        <th>ISO Certifying Body</th>
                        <th>Description</th>
                        <th>PhilHealth Accreditation</th>
                        <th>Validity From</th>
                        <th>Validity To</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="quality_management in generalInfoCtrl.quality_management">
                        <td> <% $index %> </td>
                        <td><%quality_management.qualitymgmttype%></td>
                        <td><%quality_management.certifyingbody%></td>
                        <td><%quality_management.description%></td>
                        <td><%quality_management.philhealthaccreditation%></td>
                        <td><%quality_management.validityfrom%></td>
                        <td><%quality_management.validityto%></td>
                    </tr>
                    <tr>
                </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-danger">Failed: Jan 20, 2020 07:07</span>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>


<script type="text/ng-template" id="add-bed-capacity-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Bed Capacity/Occupancy</h5>
        <button type="button" class="close" ng-click="bedCapacityCtrl.close()" ui-sref="general-info({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group">
            <label for="">Authorized Bed Capacity [ Refer to current License to Operate(LTO) ] *   </label>
            <input type="text" class="form-control" id="" placeholder="" ng-model="bedCapacityCtrl.collection.abc">
        </div>
        <div class="form-group">
            <label for="">Implementing Beds *  </label>
            <input type="text" class="form-control" id="" placeholder="" ng-model="bedCapacityCtrl.collection.implementingbeds">
        </div>
        <div class="form-group">
            <label for="">Bed Occupancy Rate (BOR) Based on Authorized Beds  </label>
            <input type="text" class="form-control" id="" placeholder="" ng-model="bedCapacityCtrl.collection.bor">
        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="bedCapacityCtrl.close()" ui-sref="general-info({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!bedCapacityCtrl.collection_copy" ng-click="bedCapacityCtrl.createBedCapacityBtn(bedCapacityCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="bedCapacityCtrl.collection_copy" ng-click="bedCapacityCtrl.updateBedCapacityBtn(bedCapacityCtrl.collection)">Update changes</button>
        </div>
    </div>
</script>


<!-- Classification Template -->
<script type="text/ng-template" id="add-classification-modal">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title">Classification</h5>
    <button type="button" class="close" ng-click="classificationsCtrl.close()" ui-sref="general-info({reporting_year:2019})">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
<!-- GENERAL --> 
    <div class="form-group row">
        <label class="col-sm-4 col-form-label"> Service Capability * </label>
        <div class="col-sm-8">
            <select class="form-control" 
                ng-init="classificationsCtrl.collection.servicecapability=classificationsCtrl.collection.servicecapability||1" 
                ng-model="classificationsCtrl.collection.servicecapability">
                <option ng-value='servicecapability.id' ng-repeat="servicecapability in classificationsCtrl.servicecapabilities"><%servicecapability.name%></option>
            </select>
        </div>
    </div>                  
    <div class="form-group row" ng-if="classificationsCtrl.collection.servicecapability==1">
        <label class="col-sm-4 col-form-label"> General </label>
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline" ng-repeat="general in classificationsCtrl.generals">
                <input type="radio" id="general<%general.id%>" name="general" class="custom-control-input" ng-value="general.id" 
                ng-init="classificationsCtrl.collection.general=classificationsCtrl.collection.general||1" ng-model="classificationsCtrl.collection.general">
                <label class="custom-control-label" for="general<%general.id%>"><%general.name%></label>
            </div>
        </div>
    </div>
<!--  end GENERAL -->
<!--  SPECIALTY  -->
    <div class="form-group row" ng-if="classificationsCtrl.collection.servicecapability==2">
        <label class="col-sm-4 col-form-label"> Specialty </label>
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline" ng-repeat="specialty in classificationsCtrl.specialties">
                <input type="radio" id="specialty<%specialty.id%>" name="specialty" class="custom-control-input" ng-value="specialty.id" 
                ng-init="classificationsCtrl.collection.specialty=classificationsCtrl.collection.specialty||1" ng-model="classificationsCtrl.collection.specialty">
                <label class="custom-control-label" for="specialty<%specialty.id%>"><%specialty.name%></label>
            </div>
        </div>
    </div>
    <div class="form-group row" ng-if="classificationsCtrl.collection.servicecapability==2">
        <label class="col-sm-4 col-form-label">Specialty (Specify)</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="" placeholder="" ng-model="classificationsCtrl.collection.specialtyspecify">
        </div>
    </div>
<!--  end SPECIALTY  --> 

    <div class="form-group row" ng-if="classificationsCtrl.collection.servicecapability!=3">
        <label class="col-sm-4 col-form-label">Trauma Capability</label>
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline" ng-repeat="traumacapabilities in classificationsCtrl.traumacapabilities">
                <input type="radio" id="trauma<%traumacapabilities.id%>" name="traumacapabilities" class="custom-control-input" 
                ng-value="traumacapabilities.id" ng-init="classificationsCtrl.collection.traumacapability=classificationsCtrl.collection.traumacapability||1" ng-model="classificationsCtrl.collection.traumacapability">
                <label class="custom-control-label" for="trauma<%traumacapabilities.id%>"><%traumacapabilities.name%></label>
            </div>
        </div>
    </div>
<!--  INFIRMARY  -->
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Nature Of Ownership*  </label>
        <div class="col-sm-8">
            <select class="form-control" ng-init="classificationsCtrl.collection.natureofownership=classificationsCtrl.collection.natureofownership||1" ng-model="classificationsCtrl.collection.natureofownership">
                <option ng-value='natureofownership.id' ng-repeat="natureofownership in classificationsCtrl.natureofownership"><%natureofownership.name%></option>
            </select>
        </div>
    </div>
    <div class="form-group row" ng-if="classificationsCtrl.collection.natureofownership==1">
        <label class="col-sm-4 col-form-label"> Government </label>
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline" ng-repeat="government in classificationsCtrl.governments">
                <input type="radio" id="government<%government.id%>" name="government" class="custom-control-input" ng-value="government.id" 
                ng-init="classificationsCtrl.collection.government=classificationsCtrl.collection.government||1" ng-model="classificationsCtrl.collection.government">
                <label class="custom-control-label" for="government<%government.id%>"><%government.name%></label>
            </div>
        </div>
    </div>
    <div class="form-group row" ng-if="classificationsCtrl.collection.natureofownership==1&&classificationsCtrl.collection.government==1">
        <label class="col-sm-4 col-form-label"> National </label>
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline" ng-repeat="national in classificationsCtrl.nationals">
                <input type="radio" id="national<%national.id%>" name="national" class="custom-control-input" ng-value="national.id" 
                ng-init="classificationsCtrl.collection.national=classificationsCtrl.collection.national||1" ng-model="classificationsCtrl.collection.national">
                <label class="custom-control-label" for="national<%national.id%>"><%national.name%></label>
            </div>
        </div>
    </div>
    <div class="form-group row" ng-if="classificationsCtrl.collection.natureofownership==1&&classificationsCtrl.collection.government==2">
        <label class="col-sm-4 col-form-label">Local</label>
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline" ng-repeat="local in classificationsCtrl.locals">
                <input type="radio" id="local<%local.id%>" name="local" class="custom-control-input" ng-value="local.id" 
                ng-init="classificationsCtrl.collection.local=classificationsCtrl.collection.local||1" ng-model="classificationsCtrl.collection.local">
                <label class="custom-control-label" for="local<%local.id%>"><%local.name%></label>
            </div>
        </div>
    </div>
    <div class="form-group row" ng-if="classificationsCtrl.collection.natureofownership==2">
        <label class="col-sm-4 col-form-label"> Private </label>
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline" ng-repeat="private in classificationsCtrl.private">
                <input type="radio" id="private<%private.id%>" name="private" class="custom-control-input" ng-value="private.id" 
                ng-init="classificationsCtrl.collection.private=classificationsCtrl.collection.private||1" ng-model="classificationsCtrl.collection.private">
                <label class="custom-control-label" for="private<%private.id%>"><%private.name%></label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Others</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="" placeholder="" ng-model="classificationsCtrl.collection.ownershipothers">
        </div>
    </div>
<div class="modal-footer bg-whitesmoke br">
<button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="classificationsCtrl.close()" ui-sref="general-info({reporting_year:2019})">Close</button>
<button type="button" class="btn btn-primary" ng-if="!classificationsCtrl.collection_copy" ng-click="classificationsCtrl.createClassificationBtn(classificationsCtrl.collection)">Save changes</button>
<button type="button" class="btn btn-primary" ng-if="classificationsCtrl.collection_copy" ng-click="classificationsCtrl.updateClassificationBtn(classificationsCtrl.collection)">Update changes</button>
</div>
</div>
</script>


<!-- Quality Management Template -->
<script type="text/ng-template" id="add-quality-management-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Quality Management</h5>
        <button type="button" class="close" ng-click="bedCapacityCtrl.close()" ui-sref="general-info({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Quality Management Type *    </label>
        <div class="col-sm-8">
            <select class="form-control" 
                ng-init="qualityManagementCtrl.collection.qualitymgmttype=qualityManagementCtrl.collection.qualitymgmttype||1" 
                ng-model="qualityManagementCtrl.collection.qualitymgmttype">
                <option ng-value='qualitymgmttype.id' ng-repeat="qualitymgmttype in qualityManagementCtrl.qualitymgmttypes"><%qualitymgmttype.name%></option>
            </select>
        </div>
    </div>
    <!--  ISO  -->
    <div class="form-group row" ng-if="qualityManagementCtrl.collection.qualitymgmttype==1">
        <label class="col-sm-4 col-form-label">ISO Certifying Body</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="" placeholder="" ng-model="qualityManagementCtrl.collection.certifyingbody">
        </div>
    </div>
    <!--  end ISO  -->
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Description    </label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="" placeholder="" ng-model="qualityManagementCtrl.collection.description">
        </div>
    </div>
    <!--  PhilHealth  -->
    <div class="form-group row" ng-if="qualityManagementCtrl.collection.qualitymgmttype==3">
        <label class="col-sm-4 col-form-label">PhilHealth Accreditation </label>
        <div class="col-sm-8">
            <div class="custom-control custom-radio custom-control-inline" ng-repeat="philhealthaccreditation in qualityManagementCtrl.philhealthaccreditation">
                <input type="radio" id="philhealthaccreditation<%philhealthaccreditation.id%>" name="philhealthaccreditation" class="custom-control-input" ng-value="philhealthaccreditation.id" 
                ng-init="classificationsCtrl.collection.philhealthaccreditation=classificationsCtrl.collection.philhealthaccreditation||1" ng-model="qualityManagementCtrl.collection.philhealthaccreditation">
                <label class="custom-control-label" for="philhealthaccreditation<%philhealthaccreditation.id%>"><%philhealthaccreditation.name%></label>
            </div>
        </div>
    </div>
    <!--  end PhilHealth  -->
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Validity From *      </label>
        <div class="col-sm-8">
        <input type="text" class="form-control datepicker" ng-model="qualityManagementCtrl.collection.validityfrom">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-4 col-form-label">Validity To *      </label>
        <div class="col-sm-8">
        <input type="text" class="form-control datepicker" ng-model="qualityManagementCtrl.collection.validityto">
        </div>
    </div>
    <div class="modal-footer bg-whitesmoke br">
<button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="qualityManagementCtrl.close()" ui-sref="general-info({reporting_year:2019})">Close</button>
<button type="button" class="btn btn-primary" ng-click="qualityManagementCtrl.createQualityManagementBtn(qualityManagementCtrl.collection)">Save changes</button>
<!-- <button type="button" class="btn btn-primary" ng-if="qualityManagementCtrl.collection_copy" ng-click="qualityManagementCtrl.updateQualityManagementBtn(qualityManagementCtrl.collection)">Update changes</button> -->
</div>
</div>
</script>