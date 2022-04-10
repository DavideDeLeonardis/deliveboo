@extends('layouts.admin')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


    <?php
    use Carbon\Carbon;
    
    $month = '2022-03';
    $start = Carbon::parse($month)->startOfMonth();
    $end = Carbon::parse($month)->endOfMonth();
    
    $dates = [];
    while ($start->lte($end)) {
        $dates[] = $start->copy()->format('Y-m-d');
        $start->addDay();
    }
    
    echo '<pre>', print_r($dates), '</pre>';
    ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col">


{{-- ***********************SIMPLE CHART WITH LARAVEL CHARTS, 
    to view this chart decomment $chart in Admin\HomeController.php --}}
                {{-- {!! $chart->container() !!}
                {!! $chart->script() !!} --}}
{{-- ***********************SIMPLE CHART WITH LARAVEL CHARTS --}}

                <canvas id="myChart" width="100%" height="100%"></canvas>
                <script>
                    let my_dates = '<?php echo json_encode($orders_date, true); ?>';
                    let dates = my_dates.split(" ");
                    // console.log(dates);

                    let my_month = '<?php echo json_encode($dates, true); ?>';
                    let month = my_month.split(" ");
                    // console.log("Giorni del mese :" + month);

                    let my_amount = '<?php echo json_encode($orders_price, true); ?>';
                    let amount = my_amount.split(" ");
                    let data = [];
                    JSON.parse(amount).forEach(element => {
                        data.push(element)
                    });

                    let supp = [];
                    let supp_date = [];
                    let supp_pricew = [];
                    Object.entries(data).forEach(element => {
                        // console.log(element[1].date)
                        supp_date.push(element[1].date);
                        supp_pricew.push(element[1].total_price);
                    });

                    console.log(supp_date, 'supp_date')
                    console.log(supp_pricew, 'supp_pricew')
                    for (let i = 0; i < JSON.parse(month).length; i++) {
                        let element = JSON.parse(month)[i];
                        if(supp_date.includes(element)){
                            Object.entries(data).forEach(my_el => {
                                if(element == my_el[1].date){
                                    supp.push(my_el[1].total_price)
                                }
                            });
                        } else {
                            supp.push(0)
                        }
                    }

                    console.log(supp, 'supp')
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: JSON.parse(month),

                            datasets: [{
                                label: 'Guadagni Mensili',
                                data: supp,
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
            </div>
        </div>
    </div>
@endsection
