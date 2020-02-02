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
                <a href="#" class="btn btn-icon icon-left btn-primary" data-toggle="modal" data-target="#inputexpenses" ui-sref="expenses-details({reporting_year:2019})"><i class="far fa-edit"></i> Input</a>
                <a href="#" class="btn btn-icon icon-left btn-info" data-confirm="Confirmation?|Do you want to submit these data?" data-confirm-yes="" ng-click="expensesCtrl.sendDataDoh()"><i class="fas fa-paper-plane"></i> Submit Data</a>
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
                    <td align="right"><%expensesCtrl.expense.salarieswages | number:2%></td>
                    </tr>
                    <tr>
                    <td>Amount spent on benefits for employees (benefits are in addition to wages/salaries. Benefits include for example: social security contributions, health insurance)  </td>
                    <td align="right"><%expensesCtrl.expense.employeebenefits | number:2%></td>
                    </tr>
                    <tr>
                    <td>Allowances provided to employees at this facility (Allowances are in addition to wages/salaries. Allowances include for example: clothing allowance, PERA, vehicle maintenance allowance and hazard pay.)  </td>
                    <td align="right"><%expensesCtrl.expense.allowances | number:2%></td>
                    </tr>
                    <tr class="text-bold">
                    <td>TOTAL amount spent on all personnel including wages, salaries, benefits and allowances for last year (PS) </td>
                    <td align="right"><%expensesCtrl.expense.totalps | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount spent on medicines </td>
                    <td align="right"><%expensesCtrl.expense.totalamountmedicine | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount spent on medical supplies (i.e. syringe, gauze, etc.; exclude pharmaceuticals)  </td>
                    <td align="right"><%expensesCtrl.expense.totalamountmedicalsupplies | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount spent on utilities  </td>
                    <td align="right"><%expensesCtrl.expense.totalamountutilities | number:2%></td>
                    </tr>
                    <tr>
                    <td>Total amount spent on non-medical services (For example: security, food service, laundry, waste management) </td>
                    <td align="right"><%expensesCtrl.expense.totalamountnonmedicalservice | number:2%></td>
                    </tr>
                    <tr class="text-bold">
                    <td>TOTAL amount spent on maintenance and other operating expenditures (MOOE)  </td>
                    <td align="right"><%expensesCtrl.expense.totalmooe | number:2%></td>
                    </tr>
                    <tr>
                    <td>Amount spent on infrastructure (i.e., new hospital wing, installation of ramps) </td>
                    <td align="right"><%expensesCtrl.expense.amountinfrastructure | number:2%></td>
                    </tr>
                    <tr>
                    <td>Amount spent on equipment (i.e. x-ray machine, CT scan) </td>
                    <td align="right"><%expensesCtrl.expense.amountequipment | number:2%></td>
                    </tr>
                    <tr class="text-bold">  
                    <td>TOTAL amount spent on capital outlay (CO) </td>
                    <td align="right"><%expensesCtrl.expense.totalco | number:2%></td>
                    </tr>
                </tbody>
                <tfoot class="text-bold">  
                    <tr>
                    <td>GRAND TOTAL </td>
                    <td align="right"><%expensesCtrl.expense.grandtotal | number:2%></td>
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
</div>

<!-- Main Content -->

<script type="text/ng-template" id="add-expense-modal">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Expenses</h5>
        <button type="button" class="close" ng-click="expensesCtrl.close()" ui-sref="expenses({reporting_year:2019})">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.salarieswages">
            </div>
            <label for="" class="col-sm-9 col-form-label">Amount spent on personnel salaries and wages </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.employeebenefits">
            </div>
            <label for="" class="col-sm-9 col-form-label">Amount spent on benefits for employees (benefits are in addition to wages/salaries. Benefits include for example: social security contributions, health insurance)  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.allowances">
            </div>
            <label for="" class="col-sm-9 col-form-label">Allowances provided to employees at this facility (Allowances are in addition to wages/salaries. Allowances include for example: clothing allowance, PERA, vehicle maintenance allowance and hazard pay.)    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" disabled="" placeholder="" ng-model="expensesCtrl.collection.totalps" ng-value="expensesCtrl.collection.salarieswages+expensesCtrl.collection.employeebenefits+expensesCtrl.collection.allowances">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>TOTAL amount spent on all personnel including wages, salaries, benefits and allowances for last year (PS)    </b></label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.totalamountmedicine">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total amount spent on medicines    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.totalamountmedicalsupplies">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total amount spent on medical supplies (i.e. syringe, gauze, etc.; exclude pharmaceuticals)    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.totalamountutilities">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total amount spent on utilities    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.totalamountnonmedicalservice">
            </div>
            <label for="" class="col-sm-9 col-form-label">Total amount spent on non-medical services (For example: security, food service, laundry, waste management)    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" disabled="" placeholder="" ng-model="expensesCtrl.collection.totalmooe" ng-value="expensesCtrl.collection.totalamountmedicine+expensesCtrl.collection.totalamountmedicalsupplies+expensesCtrl.collection.totalamountutilities+expensesCtrl.collection.totalamountnonmedicalservice">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>TOTAL amount spent on maintenance and other operating expenditures (MOOE)</b></label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.amountinfrastructure">
            </div>
            <label for="" class="col-sm-9 col-form-label">Amount spent on infrastructure (i.e., new hospital wing, installation of ramps)    </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" ng-model="expensesCtrl.collection.amountequipment">
            </div>
            <label for="" class="col-sm-9 col-form-label">Amount spent on equipment (i.e. x-ray machine, CT scan)  </label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" disabled="" placeholder="" ng-model="expensesCtrl.collection.totalco" ng-value="expensesCtrl.collection.amountinfrastructure+expensesCtrl.collection.amountequipment">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>TOTAL amount spent on capital outlay (CO)</b></label>
        </div>
        <div class="form-group row">
            <div class="col-sm-3">
            <input type="number" class="form-control" id="" placeholder="" disabled="" ng-value="expensesCtrl.collection.salarieswages+
                expensesCtrl.collection.employeebenefits+
                expensesCtrl.collection.allowances+
                expensesCtrl.collection.totalamountmedicine+
                expensesCtrl.collection.totalamountmedicalsupplies+
                expensesCtrl.collection.totalamountutilities+
                expensesCtrl.collection.totalamountnonmedicalservice+
                expensesCtrl.collection.amountinfrastructure+
                expensesCtrl.collection.amountequipment">
            </div>
            <label for="" class="col-sm-9 col-form-label"><b>GRAND TOTAL</b></label>
        </div>

        </div>
        <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="expensesCtrl.close()" ui-sref="expenses({reporting_year:2019})">Close</button>
            <button type="button" class="btn btn-primary" ng-if="!expensesCtrl.collection_copy" ng-click="expensesCtrl.createExpenseBtn(expensesCtrl.collection)">Save changes</button>
            <button type="button" class="btn btn-primary" ng-if="expensesCtrl.collection_copy" ng-click="expensesCtrl.updateExpenseBtn(expensesCtrl.collection)">Update changes</button>
        </div>
</div>
</script>