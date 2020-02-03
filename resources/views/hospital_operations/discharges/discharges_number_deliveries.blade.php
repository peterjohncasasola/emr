<!-- Main Content -->
<div class="main-content">
<section class="section">
    <div class="section-header">
    <h1>Hospital Operations</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Hospital Operations</div>
        <div class="breadcrumb-item active">Total Number of Deliveries</div>
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
            <h4>Total Number of Deliveries</h4>
            <div class="card-header-action">
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputdischarges_c" ui-sref="hospital-operations-discharges-number-deliveries-details({reporting_year:2019})"> <i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="dischargesNumberDeliveriesCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-md">
                <thead>
                    <tr>
                    <th colspan="2">Deliveries  </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td align="right"><%dischargesNumberDeliveriesCtrl.number_delivery.totalifdelivery%></td>
                    <td>Total number of in-facility deliveries  </td>
                    </tr>
                    <tr>
                    <td align="right"><%dischargesNumberDeliveriesCtrl.number_delivery.totallbvdelivery%></td>
                    <td>Total number of live-birth vaginal deliveries (normal)  </td>
                    </tr>
                    <tr>
                    <td align="right"><%dischargesNumberDeliveriesCtrl.number_delivery.totallbcdelivery%></td>
                    <td>Total number of live-birth C-section deliveries (Caesarians)  </td>
                    </tr>
                    <tr>
                    <td align="right"><%dischargesNumberDeliveriesCtrl.number_delivery.totalotherdelivery%></td>
                    <td>Total number of other deliveries  </td>
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
    </div>
    </div>
</section>

</div>


<script type="text/ng-template" id="add-discharges-number-delivery-modal">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Total Number of Deliveries</h5>
        <button type="button" class="close" ng-click="dischargesNumberDeliveriesCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="modal-body">
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesNumberDeliveriesCtrl.collection.totalifdelivery">
            </div>
            <label for="" class="col-sm-8 col-form-label">Total number of in-facility deliveries  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesNumberDeliveriesCtrl.collection.totallbvdelivery">
            </div>
            <label for="" class="col-sm-8 col-form-label">Total number of live-birth vaginal deliveries (normal)  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesNumberDeliveriesCtrl.collection.totallbcdelivery">
            </div>
            <label for="" class="col-sm-8 col-form-label">Total number of live-birth C-section deliveries (Caesarians)  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            <input type="text" class="form-control" id="" placeholder="" ng-model="dischargesNumberDeliveriesCtrl.collection.totalotherdelivery">
            </div>
            <label for="" class="col-sm-8 col-form-label">Total number of other deliveries  </label>
        </div>

        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="dischargesNumberDeliveriesCtrl.close()" ui-sref="hospital-operations-discharges-number-deliveries({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!dischargesNumberDeliveriesCtrl.collection_copy" ng-click="dischargesNumberDeliveriesCtrl.createDischargeNumberDeliveryBtn(dischargesNumberDeliveriesCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="dischargesNumberDeliveriesCtrl.collection_copy" ng-click="dischargesNumberDeliveriesCtrl.updateDischargeNumberDeliveryBtn(dischargesNumberDeliveriesCtrl.collection)">Update changes</button>
        </div>
    </div>

</script>