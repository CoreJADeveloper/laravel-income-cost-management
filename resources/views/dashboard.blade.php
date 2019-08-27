@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">সিমেন্ট বিক্রয়ের পরিসংখ্যান</h5>
            <canvas id="cement-chart" width="400" height="250"></canvas>
            <script type="text/javascript">

              var ctx = document.getElementById('cement-chart').getContext('2d');
              var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: {!! json_encode($cement_records['labels']) !!},
                  datasets: [{
                      data: {!! json_encode($cement_records['data']) !!},
                      backgroundColor: [
                                'rgba(47, 152, 208, 0.2)',
                            ],
                      borderColor: [
                        '#3490dc',
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
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
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">রড বিক্রয়ের পরিসংখ্যান</h5>
            <canvas id="rod-chart" width="400" height="250"></canvas>
            <script type="text/javascript">

              var ctx = document.getElementById('rod-chart').getContext('2d');
              var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: {!! json_encode($rod_records['labels']) !!},
                  datasets: [{
                      data: {!! json_encode($rod_records['data']) !!},
                      backgroundColor: [
                                'rgba(47, 152, 208, 0.2)',
                            ],
                      borderColor: [
                        '#3490dc',
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
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
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">ব্যাংকে জমার বিবরণ</h5>
            <a href="#" class="btn btn-primary">ক্লিক করুন</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">দোকানের খরচ</h5>
            <a href="{{ url('daily-costs') }}" class="btn btn-primary">ক্লিক করুন</a>
          </div>
        </div>
      </div>
    </div>
    @if(Auth::user()->hasAnyRole('admin'))
    <div class="row justify-content-center">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">কর্মচারিদের বেতন</h5>
            <a href="{{ url('salaries') }}" class="btn btn-primary">ক্লিক করুন</a>
          </div>
        </div>
      </div>
      <div class="col-sm-6"></div>
    </div>
    @endif
</div>
@endsection
