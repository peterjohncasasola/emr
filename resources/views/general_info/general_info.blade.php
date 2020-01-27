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
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputclassification"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <tr>
                    <td>Service Capability</td>
                    <td>General</td>
                </tr>
                <tr>
                    <td>General</td>
                    <td>Level 1 Hospital</td>
                </tr>
                <tr>
                    <td>Specialty</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Specialty (Specify) </td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Trauma Capability </td>
                    <td>Not Applicable</td>
                </tr>
                <tr>
                    <td>Nature Of Ownership </td>
                    <td>Private</td>
                </tr>
                <tr>
                    <td>Government</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>National</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Local</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Private</td>
                    <td>Cooperative</td>
                </tr>
                <tr>
                    <td>Others</td>
                    <td>10</td>
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
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputoccupancy"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <tr>
                    <td>Authorized Bed Capacity <br> [Refer to current License to Operate(LTO)]</td>
                    <td>10</td>
                </tr>
                <tr>
                    <td>Implementing Beds</td>
                    <td>10</td>
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
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputquality"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
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
                    <tr>
                    <td>1</td>
                    <td>ISO Certified</td>
                    <td>Certifying body 123123</td>
                    <td>Description</td>
                    <td>Accreditated</td>
                    <td>01/17/2020</td>
                    <td>01/28/2020</td>
                    </tr>
                    <tr>
                    <td>1</td>
                    <td>ISO Certified</td>
                    <td>Certifying body 123123</td>
                    <td>Description</td>
                    <td>Accreditated</td>
                    <td>01/17/2020</td>
                    <td>01/28/2020</td>
                    </tr>
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

<div class="modal fade" tabindex="-1" role="dialog" id="inputclassification">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Classification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab3" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="general-tab3" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">General</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="specialty-tab3" data-toggle="tab" href="#specialty" role="tab" aria-controls="specialty" aria-selected="false">Specialty</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="infirmary-tab3" data-toggle="tab" href="#infirmary" role="tab" aria-controls="infirmary" aria-selected="false">Infirmary</a>
                </li>
            </ul>
<!-- GENERAL -->                    
            <div class="tab-content tab-bordered" id="myTabContent2">
                <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab3">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> General </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="general" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline1">Level 1 Hospital</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="general" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">Level 2 Hospital</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" name="general" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">Level 3 Hospital</label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Trauma Capability</label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline4" name="trauma" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline4">Trauma Capable</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline5" name="trauma" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline5">Trauma Receiving </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline6" name="trauma" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline6">Not Applicable</label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nature Of Ownership*  </label>
                    <div class="col-sm-8">
                    <select class="form-control">
                        <option selected>Government</option>
                        <option>Private</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> Government </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline7" name="government" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline7">National</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline8" name="government" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline8">Local</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline9" name="government" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline9">State Universities and Colleges (SUCs) </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> Private </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private1" name="private" class="custom-control-input" checked>
                        <label class="custom-control-label" for="private1">Single Proprietorship</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private2" name="private" class="custom-control-input">
                        <label class="custom-control-label" for="private2">Partnership</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private3" name="private" class="custom-control-input">
                        <label class="custom-control-label" for="private3">Corporation</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private4" name="private" class="custom-control-input">
                        <label class="custom-control-label" for="private4">Religious</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private5" name="private" class="custom-control-input">
                        <label class="custom-control-label" for="private5">Civic Organization</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private6" name="private" class="custom-control-input">
                        <label class="custom-control-label" for="private6">Foundation</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private7" name="private" class="custom-control-input">
                        <label class="custom-control-label" for="private7">Cooperative</label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> National </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline10" name="national" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline10">DOH Retained / Renationalized</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline11" name="national" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline11">DILG - PNP</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline12" name="national" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline12">DND - AFP </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline13" name="national" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline13">DOJ </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Local</label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline14" name="local" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline14">Province</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline15" name="local" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline15">City</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline16" name="local" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline16">Municipality</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline17" name="local" class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline17">District </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Others</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                </div>
<!-- SPECIALTY -->
                <div class="tab-pane fade" id="specialty" role="tabpanel" aria-labelledby="specialty-tab3">                      
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> Specialty </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="specialty1" name="specialty" class="custom-control-input" checked>
                        <label class="custom-control-label" for="specialty1">Treats a particular disease</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="specialty2" name="specialty" class="custom-control-input">
                        <label class="custom-control-label" for="specialty2">Treats a particular organ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="specialty3" name="specialty" class="custom-control-input">
                        <label class="custom-control-label" for="specialty3">Treats a particular class of patients</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="specialty4" name="specialty" class="custom-control-input">
                        <label class="custom-control-label" for="specialty4">Others</label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Specialty (Specify)</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Trauma Capability</label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="trauma2a" name="trauma2" class="custom-control-input" checked>
                        <label class="custom-control-label" for="trauma2a">Trauma Capable</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="trauma2b" name="trauma2" class="custom-control-input">
                        <label class="custom-control-label" for="trauma2b">Trauma Receiving </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="trauma2c" name="trauma2" class="custom-control-input">
                        <label class="custom-control-label" for="trauma2c">Not Applicable</label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nature Of Ownership*  </label>
                    <div class="col-sm-8">
                    <select class="form-control">
                        <option selected>Government</option>
                        <option>Private</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> Government </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="government2a" name="government2" class="custom-control-input" checked>
                        <label class="custom-control-label" for="government2a">National</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="government2b" name="government2" class="custom-control-input">
                        <label class="custom-control-label" for="government2b">Local</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="government2c" name="government2" class="custom-control-input">
                        <label class="custom-control-label" for="government2c">State Universities and Colleges (SUCs) </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> Private </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private2a" name="private2" class="custom-control-input" checked>
                        <label class="custom-control-label" for="private2a">Single Proprietorship</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private2b" name="private2" class="custom-control-input">
                        <label class="custom-control-label" for="private2b">Partnership</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private2c" name="private2" class="custom-control-input">
                        <label class="custom-control-label" for="private2c">Corporation</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private2d" name="private2" class="custom-control-input">
                        <label class="custom-control-label" for="private2d">Religious</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private2e" name="private2" class="custom-control-input">
                        <label class="custom-control-label" for="private2e">Civic Organization</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private2f" name="private2" class="custom-control-input">
                        <label class="custom-control-label" for="private2f">Foundation</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private2g" name="private2" class="custom-control-input">
                        <label class="custom-control-label" for="private2g">Cooperative</label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> National </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="national2a" name="national2" class="custom-control-input" checked>
                        <label class="custom-control-label" for="national2a">DOH Retained / Renationalized</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="national2b" name="national2" class="custom-control-input">
                        <label class="custom-control-label" for="national2b">DILG - PNP</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="national2c" name="national2" class="custom-control-input">
                        <label class="custom-control-label" for="national2c">DND - AFP </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="national2d" name="national2" class="custom-control-input">
                        <label class="custom-control-label" for="national2d">DOJ </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Local</label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="local2a" name="local2" class="custom-control-input" checked>
                        <label class="custom-control-label" for="local2a">Province</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="local2b" name="local2" class="custom-control-input">
                        <label class="custom-control-label" for="local2b">City</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="local2c" name="local2" class="custom-control-input">
                        <label class="custom-control-label" for="local2c">Municipality</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="local2d" name="local2" class="custom-control-input">
                        <label class="custom-control-label" for="local2d">District </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Others</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>
                </div>
<!-- INFIRMARY -->
                <div class="tab-pane fade" id="infirmary" role="tabpanel" aria-labelledby="infirmary-tab3">
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nature Of Ownership*  </label>
                    <div class="col-sm-8">
                    <select class="form-control">
                        <option selected>Government</option>
                        <option>Private</option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> Government </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="government3a" name="government3" class="custom-control-input" checked>
                        <label class="custom-control-label" for="government3a">National</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="government3b" name="government3" class="custom-control-input">
                        <label class="custom-control-label" for="government3b">Local</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="government3c" name="government3" class="custom-control-input">
                        <label class="custom-control-label" for="government3c">State Universities and Colleges (SUCs) </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> Private </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private3a" name="private3" class="custom-control-input" checked>
                        <label class="custom-control-label" for="private3a">Single Proprietorship</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private3b" name="private3" class="custom-control-input">
                        <label class="custom-control-label" for="private3b">Partnership</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private3c" name="private3" class="custom-control-input">
                        <label class="custom-control-label" for="private3c">Corporation</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private3d" name="private3" class="custom-control-input">
                        <label class="custom-control-label" for="private3d">Religious</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private3e" name="private3" class="custom-control-input">
                        <label class="custom-control-label" for="private3e">Civic Organization</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private3f" name="private3" class="custom-control-input">
                        <label class="custom-control-label" for="private3f">Foundation</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="private3g" name="private3" class="custom-control-input">
                        <label class="custom-control-label" for="private3g">Cooperative</label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label"> National </label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="national3a" name="national3" class="custom-control-input" checked>
                        <label class="custom-control-label" for="national3a">DOH Retained / Renationalized</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="national3b" name="national3" class="custom-control-input">
                        <label class="custom-control-label" for="national3b">DILG - PNP</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="national3c" name="national3" class="custom-control-input">
                        <label class="custom-control-label" for="national3c">DND - AFP </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="national3d" name="national3" class="custom-control-input">
                        <label class="custom-control-label" for="national3d">DOJ </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Local</label>
                    <div class="col-sm-8">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="local3a" name="local3" class="custom-control-input" checked>
                        <label class="custom-control-label" for="local3a">Province</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="local3b" name="local3" class="custom-control-input">
                        <label class="custom-control-label" for="local3b">City</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="local3c" name="local3" class="custom-control-input">
                        <label class="custom-control-label" for="local3c">Municipality</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="local3d" name="local3" class="custom-control-input">
                        <label class="custom-control-label" for="local3d">District </label>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Others</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" id="" placeholder="">
                    </div>
                </div>                   
                </div>
            </div>
            </div>

        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="inputoccupancy">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Bed Capacity/Occupancy</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <label for="">Authorized Bed Capacity [ Refer to current License to Operate(LTO) ] *   </label>
            <input type="number" class="form-control" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Implementing Beds *  </label>
            <input type="number" class="form-control" id="" placeholder="">
        </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="inputquality">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Quality Management </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <label for="">Authorized Bed Capacity [ Refer to current License to Operate(LTO) ] *   </label>
            <input type="number" class="form-control" id="" placeholder="">
        </div>
        <div class="form-group">
            <label for="">Implementing Beds *  </label>
            <input type="number" class="form-control" id="" placeholder="">
        </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
    </div>
</div>

</div>