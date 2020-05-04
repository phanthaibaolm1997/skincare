@extends('admin.admin')
@section('content')
<div class="container-fluid" style="min-height: 600px;">
    <br>
    <div style="padding: 10px">
        <h5>THỐNG KÊ ĐƠN HÀNG</h5>
        <br/>
        <div class="row" >
            <div class="col-md-4">
                <div class="card" style="width: 100%">
                    <h5 class="text-center" style="font-size: 1.3em;padding-bottom: 10px; border-bottom: 1px solid #eee;">ĐƠN CHƯA DUYỆT</h5>
                    
                    <p class="text-center"><span style="font-weight: bold; font-size: 2em">{{ count($allOrder)}}</span> đơn</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%">
                    <h5 class="text-center" style="font-size: 1.3em;padding-bottom: 10px; border-bottom: 1px solid #eee;">ĐƠN ĐÃ DUYỆT</h5>
                    
                    <p class="text-center"><span style="font-weight: bold; font-size: 2em">{{ count($allOrderCheck)}}</span> đơn</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%">
                    <h5 class="text-center" style="font-size: 1.3em;padding-bottom: 10px; border-bottom: 1px solid #eee;">ĐƠN ĐÃ HỦY</h5>
                    
                    <p class="text-center"><span style="font-weight: bold; font-size: 2em">{{ count($allOrderUncheck)}}</span> đơn</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card ml-3 mr-3 mt-3 " style="padding: 10px">
        <h5>DOANH THU TRONG TUẦN</h5>
        <br/>
        <div style="width: 100%;">
           <canvas id="myChart"  height="300"></canvas>
       </div>
   </div>
   

</div>
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    $(document).ready(function() {
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            
            data: {
                labels: [`{{ $AllWeek[0] }}`, `{{ $AllWeek[1] }}`, `{{ $AllWeek[2] }}`, `{{ $AllWeek[3] }}`, `{{ $AllWeek[4] }}`, `{{ $AllWeek[5] }}`,`{{ $AllWeek[6] }}`],
                datasets: [{
                    label: '# Doanh số',
                    data: [{{ $DoanhThu[0] }}, {{ $DoanhThu[1] }}, {{ $DoanhThu[2] }}, {{ $DoanhThu[3] }}, {{ $DoanhThu[4] }}, {{ $DoanhThu[5] }},{{ $DoanhThu[6] }}],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                responsive:true,
                maintainAspectRatio: false,
            }
        });
    });

</script>