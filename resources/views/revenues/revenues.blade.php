<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Revenues  </h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Revenues  </div>
    </div>
    </div>

    <div class="section-body">

    <div id="cover-spin" ng-if="revenuesCtrl.is_loader_disabled"></div>
    <!-- <h2 class="section-title">Cards</h2>
    <p class="section-lead">
        Bootstrap’s cards provide a flexible and extensible content container with multiple variants and options.
    </p> -->

    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
            <h4> </h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputhospital" ui-sref="revenues-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <button class="btn btn-icon icon-left btn-info" ng-disabled="revenuesCtrl.is_submit_disabled" ng-click="revenuesCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data <div id="cover-spin" ng-if="revenuesCtrl.is_loader_disabled"></div></button>
                <!-- <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="revenuesCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a> -->
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <thead>
                    <tr>
                    <th>Revenues  </th>
                    <th>Amount in Peso (Php)  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Total amount of money received from the Department of Health  </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromdoh | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from the local government  </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromlgu | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from donor agencies (for example JICA, USAID, and others)  </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromdonor | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from private organizations (donations from businesses, NGOs, etc.) </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromprivateorg | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from Phil Health </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromphilhealth | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from direct patient/out-of-pocket charges/fees </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfrompatient | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from reimbursement from private insurance/HMOs </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromreimbursement | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount of money received from other sources (PAGCOR, PCSO, etc.)  </td>
                    <td align="right"><%revenuesCtrl.revenue.amountfromothersources | number:2%></td>
                    </tr>
                </tbody>
                <tfoot class="text-bold">
                    <tr>
                    <td>GRAND TOTAL </td>
                    <td align="right"><%revenuesCtrl.revenue.grandtotal | number:2%></td>
                    </tr>
                </tfoot>  
                </table>
            </div>
            </div>
            <div class="card-footer bg-whitesmoke">
            Submission Status: <span class="badge badge-success">Success: <%revenuesCtrl.revenue.submitted_at%></span>
            </div>
        </div>
        </div>

    </div>
    </div>
</section>

<script type="text/ng-template" id="add-revenue-modal">
<div class="modal-content">
<div class="modal-header">
    <h5 class="modal-title">Revenues</h5>
    <button type="button" class="close" ng-click="revenuesCtrl.close()" ui-sref="revenues({reporting_year:2019})">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromdoh">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from the Department of Health  </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromlgu">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from the local government  </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromdonor">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from donor agencies (for example JICA, USAID, and others)  </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromprivateorg">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from private organizations (donations from businesses, NGOs, etc.)</label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromphilhealth">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from Phil Health</label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfrompatient">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from direct patient/out-of-pocket charges/fees </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromreimbursement">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from reimbursement from private insurance/HMOs </label>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
        <input type="number" class="form-control" id="" placeholder="" ng-model="revenuesCtrl.collection.amountfromothersources">
        </div>
        <label for="" class="col-sm-9 col-form-label">Total amount of money received from other sources (PAGCOR, PCSO, etc.)  </label>
    </div>
    <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" disabled="" ng-value="revenuesCtrl.collection.amountfromdoh+
                revenuesCtrl.collection.amountfromlgu+
                revenuesCtrl.collection.amountfromdonor+
                revenuesCtrl.collection.amountfromprivateorg+
                revenuesCtrl.collection.amountfromphilhealth+
                revenuesCtrl.collection.amountfrompatient+
                revenuesCtrl.collection.amountfromreimbursement+
                revenuesCtrl.collection.amountfromothersources">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>GRAND TOTAL</b></label>
        </div>
    </div>
    <div class="modal-footer bg-whitesmoke br">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="revenuesCtrl.close()" ui-sref="revenues({reporting_year:2019})">Close</button>
        <button type="button" class="btn btn-primary" ng-if="!revenuesCtrl.collection_copy" ng-click="revenuesCtrl.createRevenueBtn(revenuesCtrl.collection)">Save changes</button>
        <button type="button" class="btn btn-primary" ng-if="revenuesCtrl.collection_copy" ng-click="revenuesCtrl.updateRevenueBtn(revenuesCtrl.collection)">Update changes</button>
    </div>
</div>
</script>