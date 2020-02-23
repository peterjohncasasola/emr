(function(){
    'use strict';
    angular
        .module('emrApp')
        .controller('SubmittedReportsCtrl', SubmittedReportsCtrl)
        .controller('SubmittedReportsCreateCtrl', SubmittedReportsCreateCtrl)
        .controller('SubmittedReportsActionModalInsatanceCtrl', SubmittedReportsActionModalInsatanceCtrl)

        SubmittedReportsCtrl.$inject = ['SubmittedReportsSrvcs', 'DashboardSrvcs', 'RicbSrvcs', '$scope', '$stateParams', '$state', '$uibModal', '$window', 'DTOptionsBuilder', 'DTColumnBuilder'];
        function SubmittedReportsCtrl(SubmittedReportsSrvcs, DashboardSrvcs, RicbSrvcs, $scope, $stateParams, $state, $uibModal, $window, DTOptionsBuilder, DTColumnBuilder){
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

                $state.go('submitted-reports', {reportingyear:reportingyear});
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

            // SubmittedReportsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
            //     if(response.data.status == 200)
            //     {
            //         vm.submitted_report = response.data.data[0]; 
            //         console.log(vm.submitted_report)

            //         vm.reportingstatus = [
            //             {id:'S', name:'Submitted'},
            //             {id:'I', name:'Rejected'},
            //             {id:'V', name:'Validated'}
            //         ];

            //         angular.forEach(vm.reportingstatus, function(v, k){
            //             // alert(v.name+' '+k)
            //             if(v.id == vm.submitted_report.reportingstatus){
            //                 vm.submitted_report['reportingstatusdesc'] = v.name;
            //             }
            //         });
            //     }
            // }, function (){ alert('Bad Request!!!') })

            // vm.sendDataDoh = async function() {
            //     vm.is_loader_disabled = true;
            //     vm.is_submit_disabled = true;

            //     data['reportingyear'] = $stateParams.reportingyear;

            //     SubmittedReportsSrvcs.send_data_doh(data).then (function (response) {
                   
            //         if(response.data.response_code==104){

            //             alert(response.data.message)

            //             SubmittedReportsSrvcs.list({id:'', reportingyear:$stateParams.reportingyear}).then (function (response) {
            //                 if(response.data.status == 200)
            //                 {
            //                     vm.submitted_report = response.data.data[0]; 
            //                     console.log(vm.submitted_report)
            
            //                     vm.reportingstatus = [ 
            //                         {id:'S', name:'Submitted'},
            //                         {id:'I', name:'Rejected'},
            //                         {id:'V', name:'Validated'}
            //                     ];
            
            //                     angular.forEach(vm.reportingstatus, function(v, k){
            //                         if(v.id == vm.submitted_report.reportingstatus){
            //                             vm.submitted_report['reportingstatusdesc'] = v.name;
            //                         }
            //                     });
            //                 }
            //             }, function (){ alert('Bad Request!!!') })
                    
            //         }else{
            //             alert(response.data.message)
            //             vm.routeTo('submitted-report/'+$stateParams.reportingyear);
            //         }

            //         vm.is_loader_disabled = false;
            //         vm.is_submit_disabled = false;

                    

            //     }, function (){ alert('Bad Request!!!') })

                

            // }

            vm.routeTo = function(route){
                $window.location.href = route;
            }; 

            // for dashboard

            DashboardSrvcs.expenses_vs_revenues().then (function (response) {
                if(response.data.status == 200)
                {
                    vm.expenses_vs_revenue = response.data;

                    vm.labels   = response.data.labels;
                    vm.series   = response.data.series;
                    vm.data     = response.data.data;

                    console.log(vm.expenses_vs_revenue)
                }
            }, function (){ alert('Bad Request!!!') })

            DashboardSrvcs.progress({reportingyear:$stateParams.reportingyear}).then (function (response) {
                if(response.data.status == 200)
                {
                    vm.progress = response.data.data;
                    vm.progress_total = response.data.total;

                    console.log(vm.progress)
                }
            }, function (){ alert('Bad Request!!!') })

            // vm.onClick = function (points, evt) {
            //     console.log(points, evt);
            // };

            // vm.colors = [ '#DCDCDC', '#46BFBD', '#FDB45C', '#949FB1', '#4D5360'];

            // vm.datasetOverride = [{ yAxisID: 'y-axis-1' }, { yAxisID: 'y-axis-2' }];
            // vm.options = {
            //     scales: {
            //         yAxes: [
            //             {
            //                 id: 'y-axis-1',
            //                 type: 'linear',
            //                 display: true,
            //                 position: 'left',
            //                 backgroundColor: 'rgba(77,83,96,0.2)',
            //                 pointBackgroundColor: 'rgba(77,83,96,1)',
            //                 pointHoverBackgroundColor: 'rgba(77,83,96,1)',
            //                 borderColor: 'rgba(77,83,96,1)',
            //                 pointBorderColor: '#fff',
            //                 pointHoverBorderColor: 'rgba(77,83,96,0.8)'
            //             },
            //             {
            //                 id: 'y-axis-2',
            //                 type: 'linear',
            //                 display: true,
            //                 position: 'right'
            //             }
            //         ]
            //     }
            // };

            
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
                {id:'S', name:'Submitted'},
                {id:'I', name:'Rejected'},
                {id:'V', name:'Validated'}
            ];

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