<!-- scripit init-->

<!-- Additional plugins -->

<!-- Angularjs -->
<!-- <script type="text/javascript" src="{{URL::to('node_modules/angular/angular.min.js')}}"></script> -->
<script type="text/javascript" src="{{asset('node_modules/angular/angular.min.js')}}"></script>


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

<script src="{{URL::to('js/services/surgicaloperationsmajor.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/surgicaloperationsminor.srvcs.js')}}"></script>

<script src="{{URL::to('js/services/operationshai.srvcs.js')}}"></script>

<!-- Libraries -->
<script src="{{URL::to('js/services/surgerieslib.srvcs.js')}}"></script>
<script src="{{URL::to('js/services/message.srvcs.js')}}"></script>

@yield('additionalScripts')