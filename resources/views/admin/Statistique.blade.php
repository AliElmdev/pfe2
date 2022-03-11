@extends('layouts.dashboard')
@section('navbar')

@include('includes.navbar_admin')

@endsection

@section('title')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
<div class="container">
    <canvas id="myChart" width="100" height="100"></canvas>
    <canvas id="myChart1" width="100" height="100"></canvas>
</div>
<script>
// const ctx1 = document.getElementById('myChart1');

// const myChart1 = new Chart(ctx1, {
//     type: 'doughnut',
//     data: {
//         labels: [
//             'Red',
//             'Blue',
//             'Yellow',
//             'hada'
//         ],
//         datasets: [{
//             label: 'My First Dataset',
//             data: [300, 50, 100,210],
//             backgroundColor: [
//             'rgb(255, 99, 132)',
//             'rgb(54, 162, 235)',
//             'rgb(255, 205, 86)',
//             'rgba(255, 159, 64, 0.2)'
//             ],
//             hoverOffset: 4
//         }]
//     },
// });
const ctx = document.getElementById('myChart');
const myChart = new Chart(ctx, { 
    type: 'line',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: 'Nombre d\'entreprises',
            data: [12, 19, 3, 5, 2, 50],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
     var url = "{{url('/test')}}";
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
            var ctx = document.getElementById("myChart1").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels:Years,
                      datasets: [{
                          label: 'Nombres Entreprises ( Total : ' + NbrTotal + ' )',
                          data: Prices,
                          backgroundColor: [
                            'blue',
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
<style>
    canvas{
        max-width: 400px;
        max-height: 400px;
    }
    .container{
        display: flex;
        justify-content: space-around
    }
</style>
@endsection