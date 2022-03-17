@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_admin')

@endsection

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Dépenses Overview</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie mb-2">
                    <div class="chart-area">
                        <canvas id="myChart1" style="height: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var url = "{{url('/StatistiqueEntrepriseInscrits')}}";
       var Years = new Array();
       var Labels = new Array();
       var Prices = new Array();
       var NbrTotal = 0;
       $(document).ready(function(){
         $.get(url, function(response){
           response.forEach(function(data){
               Years.push(data.year);
               Labels.push(data.myChart1);
               Prices.push(data.data);
               NbrTotal += data.data;
           });
           var ctx = document.getElementById("myChart").getContext('2d');
               var myChart = new Chart(ctx, {
                 type: 'bar',
                 data: {
                     labels:Years,
                     datasets: [{
                         label: 'Nombres Entreprises ( Total : ' + NbrTotal + ' )',
                         data: Prices,
                         backgroundColor: [
                            'rgba(2, 187, 103, 0.8)',
                         ],
                         borderWidth: 1
                     }]
                 },
                 options: {
                     scales: {
                         yAxes: [{
                             ticks: {
                                beginAtZero:true
                             }
                         }]
                     }
                 }
             });
         });
       });

    var url1 = "{{url('/StatistiqueMarchesCategories')}}";
       var Categorie1 = new Array();
       var Prices1 = new Array();
       var NbrTotal1 = 0;
       $(document).ready(function(){
         $.get(url1, function(response){
           response.forEach(function(data){
               Categorie1.push(data.categorie);
               Prices1.push(data.data);
               NbrTotal1 += data.data;
           });
           var ctx = document.getElementById("myChart1").getContext('2d');
               var myChart = new Chart(ctx, {
                 type: 'doughnut',
                 data: {
                     labels:Categorie1,
                     datasets: [{
                         label: 'Nombres Entreprises ( Total : ' + NbrTotal1 + ' )',
                         data: Prices1,
                         backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                         ],
                         borderWidth: 1
                     }]
                 },
                 options: {
                     scales: {
                         yAxes: [{
                             ticks: {
                                 beginAtZero:true
                             }
                         }]
                     }
                 }
             });
         });
       });
</script>
@endsection