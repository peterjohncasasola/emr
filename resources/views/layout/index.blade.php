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

<script type="text/ng-template" id="discharges_number_deliveries.view">
    @include('hospital_operations.discharges.discharges_number_deliveries')
</script>

@endsection
@section('additionalScripts')
@endsection