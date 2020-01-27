    <!-- Main Content -->
    <div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Facility Profile</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item">Facility Profile</div>
        </div>
        </div>

        <div class="section-body">
        <!-- <h2 class="section-title">Cards</h2>
        <p class="section-lead">
            Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
        </p> -->

        <div class="row">
            <div class="col-12 col-md-7 col-lg-7">
            <div class="card card-primary">
                <div class="card-header">
                <h4></h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputhospital"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <tr>
                        <td>Name of Hospital</td>
                        <td>Providers Multi-Purpose Cooperative Medical Center</td>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td>II</td>
                    </tr>
                    <tr>
                        <td>Province</td>
                        <td>Cagayan</td>
                    </tr>
                    <tr>
                        <td>City/Municipality </td>
                        <td>Tuguegarao City</td>
                    </tr>
                    <tr>
                        <td>Barangay</td>
                        <td>Ugac Norte</td>
                    </tr>
                    <tr>
                        <td>Street Address  </td>
                        <td>Reyes Street</td>
                    </tr>
                    <tr>
                        <td>Contact Number  </td>
                        <td>09123456789</td>
                    </tr>
                    <tr>
                        <td>Mobile Number </td>
                        <td>09123456789</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>email@gmail.com</td>
                    </tr>
                    </table>
                </div>
                </div>
                <div class="card-footer bg-whitesmoke">
                Submission Status: <span class="badge badge-success">Success: Jan 20, 2020 07:07</span>
                </div>
            </div>
            </div>

            <div class="col-12 col-md-5 col-lg-5">
            <div class="card card-primary">
                <div class="card-header">
                <h4>Medical Director/ <br> Head of Facility</h4>
                <div class="card-header-action">
                    <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputdirector"><i class="far fa-edit"></i> Input</a>
                    <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
                </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-md">
                    <tr>
                        <td>Last Name</td>
                        <td>Caparas</td>
                    </tr>
                    <tr>
                        <td>First Name  </td>
                        <td>Michael Johnson</td>
                    </tr>
                    <tr>
                        <td>Middle Name  </td>
                        <td>Padilla</td>
                    </tr>
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

    <div class="modal fade" tabindex="-1" role="dialog" id="inputhospital">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Facility Profile</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="form-group">
                <label for="inputAddress">Name of Hospital</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Region </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Province</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">City/Municipality </label>
                <input type="text" class="form-control" id="inputAddress" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="inputEmail4">Barangay </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Street Address</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                <label for="inputEmail4">Contact Number  </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="">
                </div>
                <div class="form-group col-md-3">
                <label for="inputPassword4">Mobile Number </label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="">
                </div>
                <div class="form-group col-md-5">
                <label for="inputEmail4">Email  </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="">
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