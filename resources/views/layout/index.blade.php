@extends('layout.master')
@section('additionalStyles')
@endsection
@section('content')

<!-- Users -->
<script type="text/ng-template" id="nda.view">
    @include('nda.nda')
</script>

<script type="text/ng-template" id="eula.view">
    @include('nda.eula')
</script>

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
<script type="text/ng-template" id="discharges_specialty.view">
    @include('hospital_operations.discharges.discharges_specialty')
</script>

<script type="text/ng-template" id="discharges_testing.view">
    @include('hospital_operations.discharges.discharges_testing')
</script>

<script type="text/ng-template" id="discharges_number_deliveries.view">
    @include('hospital_operations.discharges.discharges_number_deliveries')
</script>

<script type="text/ng-template" id="discharges_opv.view">
    @include('hospital_operations.discharges.discharges_opv')
</script>

<script type="text/ng-template" id="discharges_ev.view">
    @include('hospital_operations.discharges.discharges_emergency_visits')
</script>

<script type="text/ng-template" id="discharges_er.view">
    @include('hospital_operations.discharges.discharges_er')
</script>

<script type="text/ng-template" id="discharges_opd.view">
    @include('hospital_operations.discharges.discharges_opd')
</script>

<script type="text/ng-template" id="discharges_morbidity.view">
    @include('hospital_operations.discharges.discharges_morbidity')
</script>

<!-- Surgical Operations -->
<script type="text/ng-template" id="surgical_major.view">
    @include('hospital_operations.surgical_operations.surgical_major')
</script>

<script type="text/ng-template" id="surgical_minor.view">
    @include('hospital_operations.surgical_operations.surgical_minor')
</script>

<!-- Deaths -->
<script type="text/ng-template" id="operations_death.view">
    @include('hospital_operations.deaths.operations_deaths')
</script>

<script type="text/ng-template" id="operations_mortality_death.view">
    @include('hospital_operations.deaths.operations_mortality_deaths')
</script>

<!-- Staffing Pattern -->
<script type="text/ng-template" id="staffing_pattern.view">
    @include('staffing_pattern.staffing_pattern')
</script>

<!-- Submitted Reports -->
<script type="text/ng-template" id="submitted_report.view">
    @include('submitted_reports.submitted_reports')
</script>

@endsection
@section('additionalScripts')
@endsection