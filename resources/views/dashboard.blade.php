@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card dashboard-card">
          <div class="card-body">
            <h5 class="card-title">সিমেন্ট বিক্রয়ের পরিসংখ্যান</h5>
            @if(isset($cement_records))
            <div class="canvas-chart">
              <canvas id="cement-chart" width="400" height="200"></canvas>
            </div>
            <script type="text/javascript">

              var ctx = document.getElementById('cement-chart').getContext('2d');
              var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: {!! json_encode($cement_records['labels']) !!},
                  datasets: [{
                      data: {!! json_encode($cement_records['data']) !!},
                      backgroundColor: 'rgba(47, 152, 208, 0.2)',
                      borderColor: '#3490dc',
                      borderWidth: 1
                  }]
              },
              options: {
                  tooltips: {
                      enabled: true,
                  },
                  legend: {
                      display: false
                  },
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          });
          </script>
          <div class="chart-additional-information">
            @if(isset($cement_records['total_sell']) && $cement_records['total_sell'] != '')
            <p>মোট বিক্রয় {{ json_encode($cement_records['total_sell']) }} টাকা</p>
            @endif
            @if(isset($cement_records['brands']) && count($cement_records['brands']) > 0)
              @foreach($cement_records['brands'] as $key => $brand)
                <p>{{ $cement_brands[$brand] }} {{$cement_records['brands_data'][$key] }} বস্তা</p>
              @endforeach
            @endif
          </div>
          @endif
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card dashboard-card">
          <div class="card-body">
            <h5 class="card-title">রড বিক্রয়ের পরিসংখ্যান</h5>
            @if(isset($rod_records))
            <div class="canvas-chart">
              <canvas id="rod-chart" width="400" height="200"></canvas>
            </div>
            <script type="text/javascript">

              var ctx = document.getElementById('rod-chart').getContext('2d');
              var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: {!! json_encode($rod_records['labels']) !!},
                  datasets: [{
                      data: {!! json_encode($rod_records['data']) !!},
                      backgroundColor: 'rgba(47, 152, 208, 0.2)',
                      borderColor: '#3490dc',
                      borderWidth: 1
                  }]
              },
              options: {
                  tooltips: {
                      enabled: true,
                  },
                  legend: {
                      display: false
                  },
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          });
          </script>
          <div class="chart-additional-information">
            @if(isset($rod_records['total_sell']) && $rod_records['total_sell'] != '')
            <p>মোট বিক্রয় {{ json_encode($rod_records['total_sell']) }} টাকা</p>
            @endif
            @if(isset($rod_records['brands']) && count($rod_records['brands']) > 0)
              @foreach($rod_records['brands'] as $key => $brand)
                <p>{{ $rod_brands[$brand] }} {{$rod_records['brands_data'][$key] }} কেজি</p>
              @endforeach
            @endif
          </div>
          @endif
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card dashboard-card">
          <div class="card-body">
            <h5 class="card-title">ব্যাংকে জমার পরিসংখ্যান</h5>
            @if(isset($bank_saving_records))
            <div class="canvas-chart">
              <canvas id="bank-saving-chart" width="400" height="200"></canvas>
            </div>
            <script type="text/javascript">

              var ctx = document.getElementById('bank-saving-chart').getContext('2d');
              var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: {!! json_encode($bank_saving_records['labels']) !!},
                  datasets: [{
                      data: {!! json_encode($bank_saving_records['data']) !!},
                      backgroundColor: 'rgba(47, 152, 208, 0.2)',
                      borderColor: '#3490dc',
                      borderWidth: 1
                  }]
              },
              options: {
                  tooltips: {
                      enabled: true,
                  },
                  legend: {
                      display: false
                  },
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          });
          </script>
          <div class="chart-additional-information">
            @if(isset($bank_saving_records['total_savings']) && $bank_saving_records['total_savings'] != '')
            <p>মোট জমা {{ json_encode($bank_saving_records['total_savings']) }} টাকা</p>
            @endif
          </div>
          @endif
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card dashboard-card">
          <div class="card-body">
            <h5 class="card-title">বাকি আদায়ের পরিসংখ্যান</h5>
            @if(isset($due_collection_records))
            <div class="canvas-chart">
              <canvas id="due-collection-chart" width="400" height="200"></canvas>
            </div>
            <script type="text/javascript">

              var ctx = document.getElementById('due-collection-chart').getContext('2d');
              var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: {!! json_encode($due_collection_records['labels']) !!},
                  datasets: [{
                      data: {!! json_encode($due_collection_records['data']) !!},
                      backgroundColor: 'rgba(47, 152, 208, 0.2)',
                      borderColor: '#3490dc',
                      borderWidth: 1
                  }]
              },
              options: {
                  tooltips: {
                      enabled: true,
                  },
                  legend: {
                      display: false
                  },
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true
                          }
                      }]
                  }
              }
          });
          </script>
          <div class="chart-additional-information">
            @if(isset($due_collection_records['total_due_collections']) && $due_collection_records['total_due_collections'] != '')
            <p>মোট বাকি আদায় {{ json_encode($due_collection_records['total_due_collections']) }} টাকা</p>
            @endif
          </div>
          @endif
          </div>
        </div>
      </div>
    </div>
</div>
<style>
  .chart-additional-information {
    margin: 30px 0 0 10px;
  }

  .dashboard-card {
    margin-bottom: 20px;
  }

  .canvas-chart {
    margin: 30px 0;
  }
</style>
@endsection
