@if(Config::get('defaults.default.is_local')==1)

<!-- scripit init-->

<!-- General JS Scripts -->
<script src="assets/modules/jquery.min.js"></script>
<script src="assets/modules/popper.js"></script>
<script src="assets/modules/tooltip.js"></script>
<script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="assets/modules/moment.min.js"></script>
<script src="assets/js/stisla.js"></script>

<!-- JS Libraies -->
<script src="assets/modules/datatables/datatables.min.js"></script>
<script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Page Specific JS File -->
<script src="assets/modules/jquery-selectric/jquery.selectric.min.js"></script>  

<!-- Template JS File -->
<script src="assets/js/scripts.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/page/modules-datatables.js"></script>

<!-- Additional plugins -->

<!-- Angularjs -->
<script type="text/javascript" src="{{URL::to('node_modules/angular/angular.min.js')}}"></script> 

<!-- Router -->
<script type="text/javascript" src="{{URL::to('node_modules/angular-ui-router/release/angular-ui-router.min.js')}}"></script> 

<!-- Sanitize -->
<script type="text/javascript" src="{{URL::to('node_modules/angular-sanitize/angular-sanitize.min.js')}}"></script> 

<!-- Auto Complete -->
<!-- <script type="text/javascript" src="{{URL::to('node_modules/angular-auto-complete/angular-auto-complete.js')}}"></script> -->

<!-- Angular-dynamic-number -->
<script type="text/javascript" src="{{URL::to('node_modules/angular-dynamic-number/release/dynamic-number.min.js')}}"></script>


<!-- bootstrap -->
<script type="text/javascript" src="{{URL::to('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- angular-ui -->
<script type="text/javascript" src="{{URL::to('node_modules/angular-ui-bootstrap/dist/ui-bootstrap-tpls.js')}}"></script>


<!-- Main App -->
<script src="{{URL::to('js/emrApp.js')}}"></script>

<!-- Controllers -->
<script src="{{URL::to('js/controllers/expenses.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/revenues.ctrl.js')}}"></script>

<script src="{{URL::to('js/controllers/generalinfo.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/classifications.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/bedcapacities.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/qualitymanagement.ctrl.js')}}"></script>

<script src="{{URL::to('js/controllers/summaryofpatients.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/dischargesnumberdeliveries.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/dischargesopv.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/dischargesev.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/dischargeser.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/dischargesopd.ctrl.js')}}"></script>

<script src="{{URL::to('js/controllers/surgicaloperationsmajor.ctrl.js')}}"></script>
<script src="{{URL::to('js/controllers/surgicaloperationsminor.ctrl.js')}}"></script>

<script src="{{URL::to('js/controllers/operationshai.ctrl.js')}}"></script>

<!-- Libraries -->
<script src="{{URL::to('js/controllers/surgerieslib.ctrl.js')}}"></script>

<!-- Services -->
<script src="{{URL::to('js/services/expenses.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/revenues.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/classifications.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/bedcapacities.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/qualitymanagement.srvcs.js')}}"></script>

<script src="{{URL::to('js/services/summaryofpatients.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/dischargesnumberdeliveries.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/dischargesopv.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/dischargesev.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/dischargeser.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/dischargesopd.srvcs.js')}}"></script>

<script src="{{URL::to('js/services/surgicaloperationsmajor.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/surgicaloperationsminor.srvcs.js')}}"></script>

<script src="{{URL::to('js/services/operationshai.srvcs.js')}}"></script>

<!-- Libraries -->
<script src="{{URL::to('js/services/surgerieslib.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/ricdlib.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/message.srvcs.js')}}"></script>


@else


<!-- FOR REMOTE ONLY -->


<!-- scripit init-->
<!-- General JS Scripts -->
<script src="public/assets/modules/jquery.min.js"></script>
<script src="public/assets/modules/popper.js"></script>
<script src="public/assets/modules/tooltip.js"></script>
<script src="public/assets/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="public/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="public/assets/modules/moment.min.js"></script>
<script src="public/assets/js/stisla.js"></script>

<!-- Page Specific JS File -->
<script src="public/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>  

<!-- Template JS File -->
<script src="public/assets/js/scripts.js"></script>

<script src="public/assets/js/custom.js"></script>

<!-- Additional plugins -->

<!-- Angularjs -->
<script type="text/javascript" src="{{asset('public/node_modules/angular/angular.min.js')}}"></script>

<!-- Router -->
<script type="text/javascript" src="{{asset('public/node_modules/angular-ui-router/release/angular-ui-router.min.js')}}"></script>

<!-- Sanitize -->
<script type="text/javascript" src="{{asset('public/node_modules/angular-sanitize/angular-sanitize.min.js')}}"></script>

<!-- Auto Complete -->
<!-- <script type="text/javascript" src="{{asset('node_modules/angular-auto-complete/angular-auto-complete.js')}}"></script> -->

<!-- Angular-dynamic-number -->
<script type="text/javascript" src="{{asset('public/node_modules/angular-dynamic-number/release/dynamic-number.min.js')}}"></script>


<!-- bootstrap -->
<script type="text/javascript" src="{{asset('public/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- angular-ui -->
<script type="text/javascript" src="{{asset('public/node_modules/angular-ui-bootstrap/dist/ui-bootstrap-tpls.js')}}"></script>


<!-- Main App -->
<script src="{{asset('public/js/emrApp.js')}}"></script>

<!-- Controllers -->
<script src="{{asset('public/js/controllers/expenses.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/revenues.ctrl.js')}}"></script>

<script src="{{asset('public/js/controllers/generalinfo.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/classifications.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/bedcapacities.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/qualitymanagement.ctrl.js')}}"></script>

<script src="{{asset('public/js/controllers/summaryofpatients.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/dischargesnumberdeliveries.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/dischargesopv.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/dischargesev.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/dischargeser.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/dischargesopd.ctrl.js')}}"></script>

<script src="{{asset('public/js/controllers/surgicaloperationsmajor.ctrl.js')}}"></script>
<script src="{{asset('public/js/controllers/surgicaloperationsminor.ctrl.js')}}"></script>

<script src="{{asset('public/js/controllers/operationshai.ctrl.js')}}"></script>

<!-- Libraries -->
<script src="{{asset('public/js/controllers/surgerieslib.ctrl.js')}}"></script>

<!-- Services -->
<script src="{{asset('public/js/services/expenses.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/revenues.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/classifications.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/bedcapacities.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/qualitymanagement.srvcs.js')}}"></script>

<script src="{{asset('public/js/services/summaryofpatients.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/dischargesnumberdeliveries.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/dischargesopv.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/dischargesev.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/dischargeser.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/dischargesopd.srvcs.js')}}"></script>

<script src="{{asset('public/js/services/surgicaloperationsmajor.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/surgicaloperationsminor.srvcs.js')}}"></script>

<script src="{{asset('public/js/services/operationshai.srvcs.js')}}"></script>

<!-- Libraries -->
<script src="{{asset('public/js/services/surgerieslib.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/ricdlib.srvcs.js')}}"></script>
<script src="{{asset('public/js/services/message.srvcs.js')}}"></script>



@endif

@yield('additionalScripts')