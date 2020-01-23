<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>OHFSRS-Online Health Facility Statistical Report System</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{URL::to('assets/modules/bootstrap/css/bootstrap.min.css')}}"> 
  <link rel="stylesheet" href="{{URL::to('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Page Specific CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      <div class="navbar-bg"></div>
      <!-- Header -->
      @include('layout.header')
      <!-- Header -->

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
            <!-- <h2 class="section-title">Cards</h2>
            <p class="section-lead">
              Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
            </p> -->

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4></h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputexpenses"><i class="far fa-edit"></i> Input</a>
                      <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes=""><i class="fas fa-paper-plane"></i> Submit Data</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-hover table-md">
                        <thead>
                          <tr>
                            <th>Expenses</th>
                            <th>Amount in Peso (Php)</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Amount spent on personnel salaries and wages  </td>
                            <td>1,100,000.00</td>
                          </tr>
                          <tr>
                            <td>Amount spent on benefits for employees (benefits are in addition to wages/salaries. Benefits include for example: social security contributions, health insurance)  </td>
                            <td>1,100,000.00</td>
                          </tr>
                          <tr>
                            <td>Allowances provided to employees at this facility (Allowances are in addition to wages/salaries. Allowances include for example: clothing allowance, PERA, vehicle maintenance allowance and hazard pay.)  </td>
                            <td>1,100,000.00</td>
                          </tr>
                          <tr class="text-bold">
                            <td>TOTAL amount spent on all personnel including wages, salaries, benefits and allowances for last year (PS) </td>
                            <td>3,100,000.00</td>
                          </tr>
                          <tr>
                            <td>Total amount spent on medicines </td>
                            <td>1,100,000.00</td>
                          </tr>
                          <tr>
                            <td>Total amount spent on medical supplies (i.e. syringe, gauze, etc.; exclude pharmaceuticals)  </td>
                            <td>1,100,000.00</td>
                          </tr>
                          <tr>
                            <td>Total amount spent on utilities  </td>
                            <td>1,100,000.00</td>
                          </tr>
                          <tr>
                            <td>Total amount spent on non-medical services (For example: security, food service, laundry, waste management) </td>
                            <td>1,100,000.00</td>
                          </tr>
                          <tr class="text-bold">
                            <td>TOTAL amount spent on maintenance and other operating expenditures (MOOE)  </td>
                            <td>5,100,000.00</td>
                          </tr>
                          <tr>
                            <td>Amount spent on infrastructure (i.e., new hospital wing, installation of ramps) </td>
                            <td>1,100,000.00</td>
                          </tr>
                          <tr>
                            <td>Amount spent on equipment (i.e. x-ray machine, CT scan) </td>
                            <td>1,100,000.00</td>
                          </tr>
                          <tr>
                            <td>TOTAL amount spent on capital outlay (CO) </td>
                            <td>1,100,000.00</td>
                          </tr>
                        </tbody>
                        <tfoot class="text-bold">  
                          <tr>
                            <td>GRAND TOTAL </td>
                            <td>111,100,000.00</td>
                          </tr>
                        </tfoot>
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

        <div class="modal fade" tabindex="-1" role="dialog" id="inputexpenses">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Expenses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label">Amount spent on personnel salaries and wages </label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label">Amount spent on benefits for employees (benefits are in addition to wages/salaries. Benefits include for example: social security contributions, health insurance)  </label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label">Allowances provided to employees at this facility (Allowances are in addition to wages/salaries. Allowances include for example: clothing allowance, PERA, vehicle maintenance allowance and hazard pay.)    </label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label"><b>TOTAL amount spent on all personnel including wages, salaries, benefits and allowances for last year (PS)    </b></label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label">Total amount spent on medicines    </label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label">Total amount spent on medical supplies (i.e. syringe, gauze, etc.; exclude pharmaceuticals)    </label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label">Total amount spent on utilities    </label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label">Total amount spent on non-medical services (For example: security, food service, laundry, waste management)    </label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label"><b>TOTAL amount spent on maintenance and other operating expenditures (MOOE)</b></label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label">Amount spent on infrastructure (i.e., new hospital wing, installation of ramps)    </label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label">Amount spent on equipment (i.e. x-ray machine, CT scan)  </label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label"><b>TOTAL amount spent on capital outlay (CO)</b></label>
                </div>
                <div class="form-group row">
                  <div class="col-sm-3">
                    <input type="number" class="form-control" id="" placeholder="" disabled="">
                  </div>
                  <label for="" class="col-sm-9 col-form-label"><b>GRAND TOTAL</b></label>
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
      <!-- Main Content -->

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  <script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>  
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  @include('layout.scripts')
</body>
</html>