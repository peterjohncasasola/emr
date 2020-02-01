@extends('layout.master')
@section('additionalStyles')
@endsection
@section('content')


<script type="text/ng-template" id="facility_profile.view">
    @include('facility_profile.facility_profile')
</script>

<script type="text/ng-template" id="general_info.view">
    @include('general_info.general_info')
</script>

<script type="text/ng-template" id="expenses.view">
    @include('expenses.expenses')
</script>

<script type="text/ng-template" id="revenues.view">
    @include('revenues.revenues')
</script>


<!-- HOSPITAL OPERATIONS -->
<script type="text/ng-template" id="summary_of_patient.view">
    @include('hospital_operations.summary_of_patients')
</script>

<script type="text/ng-template" id="operations_hai.view">
    @include('hospital_operations.operations_hai')
</script>

<!-- Discharges -->
<script type="text/ng-template" id="discharges_number_deliveries.view">
    @include('hospital_operations.discharges.discharges_number_deliveries')
</script>

<script type="text/ng-template" id="discharges_opv.view">
    @include('hospital_operations.discharges.discharges_opv')
</script>

<script type="text/ng-template" id="discharges_ev.view">
    @include('hospital_operations.discharges.discharges_emergency_visits')
</script>

<!-- Surgical Operations -->
<script type="text/ng-template" id="surgical_major.view">
    @include('hospital_operations.surgical_operations.surgical_major')
</script>

<script type="text/ng-template" id="surgical_minor.view">
    @include('hospital_operations.surgical_operations.surgical_minor')
</script>



@endsection
@section('additionalScripts')
@endsection