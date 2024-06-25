@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="banner">
            <div class="text">
                <h6>Your Chart</h6>
                <h2>See your charts relative with your orders</h2>
            </div>
        </div>
        <div class="my-3">
            <canvas id="myChart" style="width:100%;max-width:200px;max-height:200px;" class="mx-auto "></canvas>
        </div>

        <div class="my-3">
            <canvas id="myChart2" style="width:100%;max-width:800px;max-height:800px;" class="mx-auto "></canvas>
        </div>

        <div class="my-3">
            <canvas id="myChart3" style="width:100%;max-width:800px;max-height:800px;" class="mx-auto"></canvas>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let orders = {!! json_encode($orders->toArray()) !!};
        const ctx = document.getElementById('myChart');
        const ctx2 = document.getElementById('myChart2');
        const ctx3 = document.getElementById('myChart3');
        let secondChartYear = '2023'
        let thirdChartYear = '2024'

        function all2023Orders(year) {
            let allOrders = {
                1: 0,
                2: 0,
                3: 0,
                4: 0,
                5: 0,
                6: 0,
                7: 0,
                8: 0,
                9: 0,
                10: 0,
                11: 0,
                12: 0,
            }

            for (let i = 1; i <= 12; i++) {
                let startWith = orders.filter(order => {
                    if (i > 9) {
                        return order.created_at.startsWith(year + '-' + i)
                    } else {
                        return order.created_at.startsWith(year + '-0' + i)
                    }
                })
                allOrders[i] = startWith.length
            }

            return allOrders
        }

        let orders24 = orders.filter(order => {
            return order.created_at.startsWith('2024')
        })

        let orders23 = orders.filter(order => {
            return order.created_at.startsWith('2023')
        })

        new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: ['2023', '2024'],
                datasets: [{
                    label: '# Orders',
                    data: [orders23.length, orders24.length],
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

        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: '# Orders from 2023',
                    data: [all2023Orders(secondChartYear)[1],
                        all2023Orders(secondChartYear)[2],
                        all2023Orders(secondChartYear)[3],
                        all2023Orders(secondChartYear)[4],
                        all2023Orders(secondChartYear)[5],
                        all2023Orders(secondChartYear)[6],
                        all2023Orders(secondChartYear)[7],
                        all2023Orders(secondChartYear)[8],
                        all2023Orders(secondChartYear)[9],
                        all2023Orders(secondChartYear)[10],
                        all2023Orders(secondChartYear)[11],
                        all2023Orders(secondChartYear)[12]
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

        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: '# Orders from 2024',
                    data: [all2023Orders(thirdChartYear)[1],
                        all2023Orders(thirdChartYear)[2],
                        all2023Orders(thirdChartYear)[3],
                        all2023Orders(thirdChartYear)[4],
                        all2023Orders(thirdChartYear)[5],
                        all2023Orders(thirdChartYear)[6],
                        all2023Orders(thirdChartYear)[7],
                        all2023Orders(thirdChartYear)[8],
                        all2023Orders(thirdChartYear)[9],
                        all2023Orders(thirdChartYear)[10],
                        all2023Orders(thirdChartYear)[11],
                        all2023Orders(thirdChartYear)[12]
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
@endsection
