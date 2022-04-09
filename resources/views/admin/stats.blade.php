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

                {{-- {!! $chart->container() !!}

                {!! $chart->script() !!} --}}
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
                    let prova = [];
                    JSON.parse(amount).forEach(element => {
                        // console.log(element.total_price)
                        prova.push(element)
                    });
                    // console.log("Guadagni :" + amount);
                    // console.log(prova)

                    let supp = [];
                    console.log(supp.length, 'supp')
                    // JSON.parse(month).forEach((day, index) => {
                    //     console.log(JSON.parse(month).length)
                    //     if (prova[index]) {
                    //         if (day = prova[index].date) {
                    //             supp.push(prova[index].total_price)
                    //         }
                    //     } else {
                    //         supp.push(0)
                    //     }
                    // })
                    
                    for (let i = 0; i < JSON.parse(month).length; i++) {
                        let element = JSON.parse(month)[i];
                        // if(prova[i]){
                        //     JSON.parse(month).forEach(element => {
                        //         if (prova[i].date == JSON.parse(month)[i]) {
                        //             supp.push(prova[i].total_price)
                        //         }
                        //         else {
                        //             supp.push(0)
                        //         }
                        //     });
                        // } else {
                        //     supp.push(0)
                        // }
                        let x = '';
                        if (prova[i]){
                            console.log(prova)
                            let x = prova[i].date
                            console.log(x, 'la mia data')
                            console.log(element, 'month[i]')
                            console.log(x == element, 'vediamo se sono uguali')
                            // console.log(x)
                            // console.log(element, 'console.log prima di entreare in if x==element')
                            // console.log(prova[i].date, 'data vera nostra')
                            if(x == element){
                                console.log(prova[i].date, 'data nostra')
                                console.log(element, 'data sua')
                                supp.push(prova[i].total_price)
                            }
                            else {
                                supp.push(0)
                            }
                        } 
                        else {
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
