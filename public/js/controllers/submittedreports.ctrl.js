(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('SubmittedReportsCtrl', SubmittedReportsCtrl)
        .controller('SubmittedReportsCreateCtrl', SubmittedReportsCreateCtrl)
        .controller('SubmittedReportsActionModalInsatanceCtrl', SubmittedReportsActionModalInsatanceCtrl)

        SubmittedReportsCtrl.$inject = ['SubmittedReportsSrvcs', 'RicbSrvcs', '$scope', '$stateParams', '$state', '$uibModal', '$window', 'DTOptionsBuilder', 'DTColumnBuilder'];
        function SubmittedReportsCtrl(SubmittedReportsSrvcs, RicbSrvcs, $scope, $stateParams, $state, $uibModal, $window, DTOptionsBuilder, DTColumnBuilder){
            var vm = this;
            var data = {};

            vm.reportingyear = $stateParams.reportingyear; 
 
            var counter = 1;
            vm.reportingyears = [];
            for(var year=2010; year<=2019; year++){
                vm.reportingyears.push({id:counter, year:year})
                counter++;
            }

            vm.selectReportingYear = function(reportingyear){
                $state.go('SubmittedReports', {reportingyear:reportingyear});
            }
 
            vm.is_loader_disabled = false;
            vm.is_submit_disabled = false;

            vm.getSubmittedReports = (id, reportingyear) => {
                return new Promise(resolve => {
                    SubmittedReportsSrvcs.list({id:id, reportingyear:reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            resolve(response.data.data[0]);
                        }
                    }, function (){ alert('Bad Request!!!') })
                });
            };

            vm.init = async (id, reportingyear) => {
                    const data = await vm.getSubmittedReports(id, reportingyear);
                    $scope.$apply(() => vm.submitted_report = {
                        ...data
                    });
            };

            // vm.init('', $stateParams.reportingyear);

            SubmittedReportsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.submitted_report = response.data.data[0]; 
                    console.log(vm.submitted_report)

                    vm.reportingstatus = [
                        {id:0, name:''},
                        {id:1, name:'Submitted'},
                        {id:2, name:'Rejected'},
                        {id:3, name:'Validated'}
                    ];

                    angular.forEach(vm.reportingstatus, function(v, k){
                        // alert(v.name+' '+k)
                        if(v.id == vm.submitted_report.reportingstatus){
                            vm.submitted_report['reportingstatusdesc'] = v.name;
                        }
                    });
                }
            }, function (){ alert('Bad Request!!!') })

            vm.sendDataDoh = async function() {
                vm.is_loader_disabled = true;
                vm.is_submit_disabled = true;

                data['reportingyear'] = $stateParams.reportingyear;

                SubmittedReportsSrvcs.send_data_doh(data).then (function (response) {
                    alert('Successfully submitted!')

                    SubmittedReportsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                        if(response.data.status == 200)
                        {
                            vm.submitted_report = response.data.data[0]; 
                            console.log(vm.submitted_report)
        
                            vm.reportingstatus = [
                                {id:0, name:''},
                                {id:1, name:'Submitted'},
                                {id:2, name:'Rejected'},
                                {id:3, name:'Validated'}
                            ];
        
                            angular.forEach(vm.reportingstatus, function(v, k){
                                if(v.id == vm.submitted_report.reportingstatus){
                                    vm.submitted_report['reportingstatusdesc'] = v.name;
                                }
                            });
                        }
                    }, function (){ alert('Bad Request!!!') })

                    vm.is_loader_disabled = false;
                    vm.is_submit_disabled = false;

                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
            
        }

        SubmittedReportsCreateCtrl.$inject = ['SubmittedReportsSrvcs', '$stateParams', '$uibModal', '$window'];
        function SubmittedReportsCreateCtrl(SubmittedReportsSrvcs, $stateParams, $uibModal, $window){
            var vm = this;
            var data = {};
            
            if($stateParams.reportingyear){

                SubmittedReportsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
                    if(response.data.status == 200)
                    {
                        vm.data = response.data.data[0];
                        vm.data_count = response.data.count;
                        console.log(vm.expense)

                        $uibModal.open({
                            templateUrl: 'add-submitted-report-modal',
                            controller: 'SubmittedReportsActionModalInsatanceCtrl',
                            controllerAs: 'SubmittedReportsCtrl',
                            backdrop: 'static',
                            keyboard  : false,
                            resolve :{
                                collection: function () {
                                    return {
                                        data: vm.data
                                    };
                                }
                            },
                            size: 'lg'
                        });
                    }
                }, function (){ alert('Bad Request!!!') })
            }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 
        }

        SubmittedReportsActionModalInsatanceCtrl.$inject = ['collection', 'SubmittedReportsSrvcs', 'RicbSrvcs', '$state', '$stateParams', '$uibModalInstance', '$window', 'DTOptionsBuilder', 'DTColumnBuilder'];
        function SubmittedReportsActionModalInsatanceCtrl (collection, SubmittedReportsSrvcs, RicbSrvcs, $state, $stateParams, $uibModalInstance, $window, DTOptionsBuilder, DTColumnBuilder) {

            var vm = this;
            vm.collection = collection.data;
            vm.collection_copy = collection.data;
            vm.reportingyear = $stateParams.reportingyear;

       

            console.log(vm.collection)

            vm.reportingstatus = [
                {id:1, name:"Submitted"},
                {id:2, name:"Rejected"},
                {id:3, name:"Validated"}
            ]

            vm.createSubmittedReportBtn = function(data){
                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);
                SubmittedReportsSrvcs.store(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        $state.go('submitted-reports', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.updateSubmittedReportBtn = function(data){

                data['reportingyear'] = $stateParams.reportingyear;
                console.log(data);

                SubmittedReportsSrvcs.update(data).then(function(response){
                    if (response.data.status == 200) {
                        alert(response.data.message);

                        $state.go('submitted-reports', {reportingyear:$stateParams.reportingyear});
                        $uibModalInstance.close();
                    }
                    else {
                        alert(response.data.message);
                    }
                    console.log(response.data);
                });
            };

            vm.routeTo = function(route){
                $window.location.href = route;
            };

            vm.close = function() {
                $uibModalInstance.close();
            };

        }

})();