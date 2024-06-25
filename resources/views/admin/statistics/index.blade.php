@extends('layouts.admin')

@section('content')
    <div class="container">
        <div>
            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var orders = {!! json_encode($orders->toArray()) !!};



        let orders24 = orders.filter(order => {
            return order.created_at.startsWith('2024')
        })

        let orders23 = orders.filter(order => {
            return order.created_at.startsWith('2023')
        })
        console.log(orders23.length, orders24.length);

        const ctx = document.getElementById('myChart');

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
    </script>
@endsection
