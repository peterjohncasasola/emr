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
        <!-- <h2 class="section-title">Cards</h2>
        <p class="section-lead">
            Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
        </p> -->

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Total Number of Deaths    </h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputpatients"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <thead>
                        <tr>
                        <th colspan="2">Inpatient Care  </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>12</td>
                        <td>Total number of inpatients  </td>
                        </tr>
                        <tr>
                        <td>12</td>
                        <td>Total Newborn (In facility deliveries)  </td>
                        </tr>
                        <tr>
                        <td>12</td>
                        <td>Total Discharges (Alive)  </td>
                        </tr>
                        <tr>
                        <td>12</td>
                        <td>Total patients admitted and discharged on the same day   </td>
                        </tr>
                        <tr>
                        <td>12</td>
                        <td>Total number of inpatient bed days (service days) </td>
                        </tr>
                        <tr>
                        <td>12</td>
                        <td>Total number of inpatients transferred TO THIS FACILITY from another facility for inpatient care    </td>
                        </tr>
                        <tr>
                        <td>12</td>
                        <td>Total number of inpatients transferred FROM THIS FACILITY to another facility for inpatient care    </td>
                        </tr>
                        <tr>
                        <td>12</td>
                        <td>Total number of patients remaining in the hospital as of midnight last day of previous year  </td>
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

            <div class="col-12 col-md-12 col-lg-12">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Discharges</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputdirector"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                        <h4>Panel 1</h4>
                    </div>
                    <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    </div>
                    <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                        <h4>Panel 2</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    </div>
                    <div class="accordion">
                    <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                        <h4>Panel 3</h4>
                    </div>
                    <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    </div>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="inputpatients">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Summary of Patients in the Hospital</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="form-group row">
                <div class="col-sm-3">
                <input type="number" class="form-control" id="" placeholder="">
                </div>
                <label for="" class="col-sm-9 col-form-label">Total number of inpatients*  </label>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                <input type="number" class="form-control" id="" placeholder="">
                </div>
                <label for="" class="col-sm-9 col-form-label">Total Newborn (In facility deliveries)*   </label>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                <input type="number" class="form-control" id="" placeholder="">
                </div>
                <label for="" class="col-sm-9 col-form-label">Total Discharges (Alive)*  </label>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                <input type="number" class="form-control" id="" placeholder="">
                </div>
                <label for="" class="col-sm-9 col-form-label">Total patients admitted and discharged on the same day*  </label>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                <input type="number" class="form-control" id="" placeholder="">
                </div>
                <label for="" class="col-sm-9 col-form-label">Total number of inpatient bed days (service days)* </label>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                <input type="number" class="form-control" id="" placeholder="">
                </div>
                <label for="" class="col-sm-9 col-form-label">Total number of inpatients transferred TO THIS FACILITY from another facility for inpatient care*  </label>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                <input type="number" class="form-control" id="" placeholder="">
                </div>
                <label for="" class="col-sm-9 col-form-label">Total number of inpatients transferred FROM THIS FACILITY to another facility for inpatient care*  </label>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                <input type="number" class="form-control" id="" placeholder="">
                </div>
                <label for="" class="col-sm-9 col-form-label">Total number of patients remaining in the hospital as of midnight last day of previous year* </label>
            </div>


            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="inputdirector">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Medical Director/<br>Head of Facility</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="inputAddress">Last Name </label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress">First Name </label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress">Middle Name </label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
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