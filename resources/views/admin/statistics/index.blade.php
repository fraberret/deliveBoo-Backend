@extends('layouts.admin')
@section('title', 'Statistics')
@section('content')
    <div class="container">
        <div class="banner">
            <div class="text">
                <h6>Your Chart</h6>
                <h2>See your charts relative with your orders</h2>
            </div>
        </div>
        @if (count($orders) > 1)
            <div class="my-3">
                <canvas id="myChart2" style="width:100%;" class="mx-auto  w-100"></canvas>
            </div>

            <div class="my-3">
                <canvas id="myChart3" style="width:100%;" class="mx-auto w-100"></canvas>
            </div>
        @else
            <div class="d-flex justify-content-center flex-column align-items-center p-5">
                <img src="{{ asset('img/logo-sad.png') }}" width="300" class="p-5" alt="">
                <h3>Sorry you don't have orders</h3>
            </div>
        @endif

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let orders = {!! json_encode($orders->toArray()) !!};
        console.log(orders);
        const ctx = document.getElementById('myChart');
        const ctx2 = document.getElementById('myChart2');
        const ctx3 = document.getElementById('myChart3');
        let secondChartYear = '2023'
        let thirdChartYear = '2024'

        function totalOrders(year, month) {
            let monthTotal = 0
            let totalNumbOrders = orders.length
            for (let i = 1; i <= totalNumbOrders; i++) {
                if (orders[i - 1].created_at.startsWith(year + '-' + month)) {
                    monthTotal += Number(orders[i - 1].total)
                }
            }

            return monthTotal;
        }


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

        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['July', 'August', 'September',
                    'October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June',
                ],
                datasets: [{
                    label: '# Last Year Orders',
                    data: [
                        all2023Orders(secondChartYear)[7],
                        all2023Orders(secondChartYear)[8],
                        all2023Orders(secondChartYear)[9],
                        all2023Orders(secondChartYear)[10],
                        all2023Orders(secondChartYear)[11],
                        all2023Orders(secondChartYear)[12],
                        all2023Orders(thirdChartYear)[1],
                        all2023Orders(thirdChartYear)[2],
                        all2023Orders(thirdChartYear)[3],
                        all2023Orders(thirdChartYear)[4],
                        all2023Orders(thirdChartYear)[5],
                        all2023Orders(thirdChartYear)[6],
                    ],
                    borderWidth: 1,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            color: '#1c1c1c'
                        },
                        ticks: {
                            color: '#bfbfbf'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#1c1c1c'
                        },
                        ticks: {
                            color: '#bfbfbf'
                        }
                    }
                }
            }
        });

        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['July', 'August', 'September',
                    'October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June',
                ],
                datasets: [{
                    label: '# Last Year Total Earnings',
                    data: [
                        totalOrders('2023', '07'),
                        totalOrders('2023', '08'),
                        totalOrders('2023', '09'),
                        totalOrders('2023', '10'),
                        totalOrders('2023', '11'),
                        totalOrders('2023', '12'),
                        totalOrders('2024', '01'),
                        totalOrders('2024', '02'),
                        totalOrders('2024', '03'),
                        totalOrders('2024', '04'),
                        totalOrders('2024', '05'),
                        totalOrders('2024', '06'),
                    ],
                    borderWidth: 1,
                    backdropColor: 'red'
                }]
            },
            options: {
                scales: {
                    x: {
                        grid: {
                            color: '#1c1c1c'
                        },
                        ticks: {
                            color: '#bfbfbf'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#1c1c1c'
                        },
                        ticks: {
                            color: '#bfbfbf'
                        }
                    }
                }
            }
        });
    </script>
@endsection
