@extends('layouts.admin')

@section('content')
    <div class="container">
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
        var orders = {!! json_encode($orders->toArray()) !!};

        //let stringsStarts = ['2024-01']

        // let year24 = {
        //     January: [],
        //     February: [],
        //     March: [],
        //     April: [],
        //     May: [],
        //     June: [],
        //     July: [],
        //     August: [],
        //     September: [],
        //     October: [],
        //     November: [],
        //     December: [],
        // }


        let orders24 = orders.filter(order => {
            return order.created_at.startsWith('2024')
        })

        let orders23 = orders.filter(order => {
            return order.created_at.startsWith('2023')
        })

        // for (let i = 0; i < 12; i++) {
        //     orders24.forEach(order => {
        //         if (order.created_at.startsWith('2024-0' + i)) {
        //             console.log('2024-0' + i);
        //         }
        //     });

        // }


        const ctx = document.getElementById('myChart');
        const ctx2 = document.getElementById('myChart2');
        const ctx3 = document.getElementById('myChart3');


        let ordersJanuary24 = orders.filter(order => {
            return order.created_at.startsWith('2024-01')
        })

        let ordersFebruary24 = orders.filter(order => {
            return order.created_at.startsWith('2024-02')
        })
        let ordersMarch24 = orders.filter(order => {
            return order.created_at.startsWith('2024-03')
        })
        let ordersApril24 = orders.filter(order => {
            return order.created_at.startsWith('2024-04')
        })
        let ordersMay24 = orders.filter(order => {
            return order.created_at.startsWith('2024-05')
        })
        let ordersJune24 = orders.filter(order => {
            return order.created_at.startsWith('2024-06')
        })

        let ordersJanuary23 = orders.filter(order => {
            return order.created_at.startsWith('2023-01')
        })

        let ordersFebruary23 = orders.filter(order => {
            return order.created_at.startsWith('2023-02')
        })
        let ordersMarch23 = orders.filter(order => {
            return order.created_at.startsWith('2023-03')
        })
        let ordersApril23 = orders.filter(order => {
            return order.created_at.startsWith('2023-04')
        })
        let ordersMay23 = orders.filter(order => {
            return order.created_at.startsWith('2023-05')
        })
        let ordersJune23 = orders.filter(order => {
            return order.created_at.startsWith('2023-06')
        })

        let ordersJuly23 = orders.filter(order => {
            return order.created_at.startsWith('2023-07')
        })

        let ordersAugust23 = orders.filter(order => {
            return order.created_at.startsWith('2023-08')
        })
        let ordersSeptember23 = orders.filter(order => {
            return order.created_at.startsWith('2023-09')
        })
        let ordersOctober23 = orders.filter(order => {
            return order.created_at.startsWith('2023-10')
        })
        let ordersNovember23 = orders.filter(order => {
            return order.created_at.startsWith('2023-11')
        })
        let ordersDecember23 = orders.filter(order => {
            return order.created_at.startsWith('2023-12')
        })

        //console.log(ordersJanuary24);



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
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: '# Orders from 2024',
                    data: [ordersJanuary24.length, ordersFebruary24.length, ordersMarch24.length,
                        ordersApril24.length, ordersMay24.length, ordersJune24.length,
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
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ],
                datasets: [{
                    label: '# Orders from 2023',
                    data: [ordersJanuary23.length, ordersFebruary23.length, ordersMarch23.length,
                        ordersApril23.length, ordersMay23.length, ordersJune23.length, ordersJuly23
                        .length, ordersAugust23.length, ordersSeptember23.length, ordersOctober23
                        .length,
                        ordersNovember23.length, ordersDecember23.length,
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
