(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('GeneralInfoCtrl', GeneralInfoCtrl)

        GeneralInfoCtrl.$inject = ['BedCapacitiesSrvcs', 'ClassificationsSrvcs', 'QualityManagementSrvcs', '$stateParams', '$state', '$uibModal', '$window'];
        function GeneralInfoCtrl(BedCapacitiesSrvcs, ClassificationsSrvcs, QualityManagementSrvcs, $stateParams, $state, $uibModal, $window){
            var vm = this;
            var data = {};

            vm.reportingyear = $stateParams.reportingyear; 
 
            var counter = 1;
            vm.reportingyears = [];
            for(var year=2010; year<=2019; year++){
                vm.reportingyears.push({id:counter, year:year})
                counter++;
            }

            console.log(vm.reportingyears)

            vm.selectReportingYear = function(reportingyear){
                 
                $state.go('general-info', {reportingyear:reportingyear});

                BedCapacitiesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.general_info = response.data.data[0];
                        vm.general_info_count = response.data.count;
                        console.log(vm.general_info)
                    }
                }, function (){ alert('Bad Request!!!') })

                ClassificationsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.classification = response.data.data[0];
                        vm.classification_count = response.data.count;
                        console.log(vm.classification)
                    }
                }, function (){ alert('Bad Request!!!') })
    
                QualityManagementSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.quality_management = response.data.data;
                        vm.quality_management_count = response.data.count;
                        console.log(vm.quality_management)
                    }
                }, function (){ alert('Bad Request!!!') })
            }

            vm.deleteQualityManagementBtn = function(id){
                data['id'] = id;
                data['reportingyear'] = $stateParams.reportingyear;

                QualityManagementSrvcs.remove(data).then (function (response) {
                    if(response.data.status == 200)
                    {
                        QualityManagementSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                            if(response.data.status == 200)
                            {
                                vm.quality_management = response.data.data;
                                vm.quality_management_count = response.data.count;
                                console.log(vm.quality_management)
            
                                vm.qualitymgmttypes = [
                                    {id:1, name:'ISO Certified'},
                                    {id:2, name:'International Accreditation'},
                                    {id:3, name:'PhilHealth Accreditation'},
                                    {id:4, name:'PCAHO'}
                                ];
            
                                angular.forEach(vm.qualitymgmttypes, function(v, k){
                                    
                                    angular.forEach(vm.quality_management, function(v1, k1){
            
                                        if(v.id == v1.qualitymgmttype){
                                            v1['qualitymgmttypedesc'] = v.name;
                                        }
            
                                    });
                                    
                                });
                    
                                vm.philhealthaccreditation = [
                                    {id:0, name:''},
                                    {id:1, name:'Basic Participation'},
                                    {id:2, name:'Advanced Participation'}
                                ];
            
                                angular.forEach(vm.philhealthaccreditation, function(v, k){
                                    
                                    angular.forEach(vm.quality_management, function(v1, k1){
            
                                        if(v.id == v1.philhealthaccreditation){
                                            v1['philhealthaccreditationdesc'] = v.name;
                                        }
            
                                    });
                                    
                                });
            
                            }
                        }, function (){ alert('Bad Request!!!') })
                    }
                }, function (){ alert('Bad Request!!!') })

            }

            vm.is_loader_disabled = false;
            vm.is_submit_disabled_classification = false;
            vm.is_submit_disabled_bed_capacity = false;
            vm.is_submit_disabled_quality_management = false;

            BedCapacitiesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.general_info = response.data.data[0];
                    vm.general_info_count = response.data.count;
                    console.log(vm.general_info)
                }
            }, function (){ alert('Bad Request!!!') })

            ClassificationsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.classification = response.data.data[0];
                    vm.classification_count = response.data.count;

                    vm.servicecapabilities = [
                        {id:0, name:''},
                        {id:1, name:'General'},
                        {id:2, name:'Specialty'},
                        {id:3, name:'Infirmary'}
                    ];

                    angular.forEach(vm.servicecapabilities, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.classification.servicecapability){
                            vm.classification['servicecapabilitydesc'] = v.name;
                        }
                    });
        
                    vm.generals = [
                        {id:0, name:''},
                        {id:1, name:'Level 1 Hospital'},
                        {id:2, name:'Level 2 Hospital'},
                        {id:3, name:'Level 3 Hospital'}
                    ];

                    angular.forEach(vm.generals, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.classification.general){
                            vm.classification['generaldesc'] = v.name;
                        }
                    });
        
                    vm.specialties = [
                        {id:0, name:''},
                        {id:1, name:'Treats a particular disease'},
                        {id:2, name:'Treats a particular organ'},
                        {id:3, name:'Treats a particular class of patients'},
                        {id:4, name:'Others'},
                    ];

                    angular.forEach(vm.specialties, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.classification.specialty){
                            vm.classification['specialtydesc'] = v.name;
                        }
                    });
        
                    vm.traumacapabilities = [
                        {id:0, name:''},
                        {id:1, name:'Trauma Capable'},
                        {id:2, name:'Trauma Receiving'},
                        {id:3, name:'Not Applicable'}
                    ];

                    angular.forEach(vm.traumacapabilities, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.classification.traumacapability){
                            vm.classification['traumacapabilitydesc'] = v.name;
                        }
                    });
        
                    vm.natureofownership = [
                        {id:1, name:'Government'},
                        {id:2, name:'Private'}
                    ];

                    angular.forEach(vm.natureofownership, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.classification.natureofownership){
                            vm.classification['natureofownershipdesc'] = v.name;
                        }
                    });
        
                    vm.governments = [
                        {id:1, name:'National'},
                        {id:2, name:'Local'},
                        {id:3, name:'State Universities and Colleges (SUCs)'}
                    ];

                    angular.forEach(vm.governments, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.classification.government){
                            vm.classification['governmentdesc'] = v.name;
                        }
                    });
        
                    vm.nationals = [
                        {id:1, name:'DOH Retained / Renationalized'},
                        {id:2, name:'DILG - PNP'},
                        {id:3, name:'DND - AFP'},
                        {id:4, name:'DOJ'}
                    ];

                    angular.forEach(vm.nationals, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.classification.national){
                            vm.classification['nationaldesc'] = v.name;
                        }
                    });
        
                    vm.locals = [
                        {id:1, name:'Province'},
                        {id:2, name:'City'},
                        {id:3, name:'Municipality'},
                        {id:4, name:'District'}
                    ];

                    angular.forEach(vm.locals, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.classification.local){
                            vm.classification['localdesc'] = v.name;
                        }
                    });
        
                    vm.private = [
                        {id:1, name:'Single Proprietorship'},
                        {id:2, name:'Partnership'},
                        {id:3, name:'Corporation'},
                        {id:4, name:'Religious'},
                        {id:5, name:'Civic Organization'},
                        {id:6, name:'Foundation'},
                        {id:7, name:'Cooperative'}
                    ];

                    angular.forEach(vm.private, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.classification.private){
                            vm.classification['privatedesc'] = v.name;
                        }
                    });

                    console.log(vm.classification)
                }
            }, function (){ alert('Bad Request!!!') })

            QualityManagementSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.quality_management = response.data.data;
                    vm.quality_management_count = response.data.count;
                    console.log(vm.quality_management)

                    vm.qualitymgmttypes = [
                        {id:1, name:'ISO Certified'},
                        {id:2, name:'International Accreditation'},
                        {id:3, name:'PhilHealth Accreditation'},
                        {id:4, name:'PCAHO'}
                    ];

                    angular.forEach(vm.qualitymgmttypes, function(v, k){
                        
                        angular.forEach(vm.quality_management, function(v1, k1){

                            if(v.id == v1.qualitymgmttype){
                                v1['qualitymgmttypedesc'] = v.name;
                            }

                        });
                        
                    });
        
                    vm.philhealthaccreditation = [
                        {id:0, name:''},
                        {id:1, name:'Basic Participation'},
                        {id:2, name:'Advanced Participation'}
                    ];

                    angular.forEach(vm.philhealthaccreditation, function(v, k){
                        
                        angular.forEach(vm.quality_management, function(v1, k1){

                            if(v.id == v1.philhealthaccreditation){
                                v1['philhealthaccreditationdesc'] = v.name;
                            }

                        });
                        
                    });

                }
            }, function (){ alert('Bad Request!!!') })
            
            vm.sendDataClassificationDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled_classification = true;
                vm.is_submit_disabled_bed_capacity = true;
                vm.is_submit_disabled_quality_management = true;

                data['reportingyear'] = $stateParams.reportingyear;
               
                ClassificationsSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')

                    ClassificationsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.classification = response.data.data[0];
                            vm.classification_count = response.data.count;
                            console.log(vm.classification)
                        }
                    }, function (){ alert('Bad Request!!!') })

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled_classification = false;
                    vm.is_submit_disabled_bed_capacity = false;
                    vm.is_submit_disabled_quality_management = false;

                }, function (){ alert('Bad Request!!!') })
            }
            
            vm.sendDataBedCapacityDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled_classification = true;
                vm.is_submit_disabled_bed_capacity = true;
                vm.is_submit_disabled_quality_management = true;

                data['reportingyear'] = $stateParams.reportingyear;

                BedCapacitiesSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')

                    BedCapacitiesSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.general_info = response.data.data[0];
                            vm.general_info_count = response.data.count;
                            console.log(vm.general_info)
                        }
                    }, function (){ alert('Bad Request!!!') })

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled_classification = false;
                    vm.is_submit_disabled_bed_capacity = false;
                    vm.is_submit_disabled_quality_management = false;

                }, function (){ alert('Bad Request!!!') })
            }

            vm.sendDataQualityManagementDoh = function(){
                vm.is_loader_disabled = true;
                vm.is_submit_disabled_classification = true;
                vm.is_submit_disabled_bed_capacity = true;
                vm.is_submit_disabled_quality_management = true;

                data['reportingyear'] = $stateParams.reportingyear;

                QualityManagementSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')

                    QualityManagementSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.quality_management = response.data.data;
                            vm.quality_management_count = response.data.count;
                            console.log(vm.quality_management)
                        }
                    }, function (){ alert('Bad Request!!!') })

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled_classification = false;
                    vm.is_submit_disabled_bed_capacity = false;
                    vm.is_submit_disabled_quality_management = false;
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

})();