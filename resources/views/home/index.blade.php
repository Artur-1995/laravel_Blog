@extends('templates.header')
@section('breadcrumbs', Breadcrumbs::render('posts.index'))
@section('content')
    <main class="flex-1 container mx-auto bg-white overflow-hidden px-4 sm:px-6">
        <div class="flex-grow-1 py-3 justify-content-between min-мh-100">
            <h1 class="text-black text-3xl font-bold mb-4">
                {{ $title }}
            </h1>

            <p>Сортировать:</p>
            <nav>
                <ul>
                    <li><a href="{{ route('post.created') }}">По дате</a></li>
                    <li><a href="{{ route('post.popular') }}">По популярности</a></li>
                </ul>
            </nav>

            <div>
                <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
            </div>
            <script>
                let data = {
                    labels: ["Accepted", "Pending", "Rejected"],
                    datasets: [{
                        data: [70, 10, 6],
                        borderColor: [
                            "#3cba9f",
                            "#ffa500",
                            "#c45850",
                        ],
                        backgroundColor: [
                            "rgb(60,186,159,0.1)",
                            "rgb(255,165,0,0.1)",
                            "rgb(196,88,80,0.1)",
                        ],
                        borderWidth: 2,
                    }],

                };

                var ctx = document.getElementById('myChart').getContext('2d');

                const chart = new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: {

                        // All of these (default) events trigger a hover and are passed to all plugins,
                        // unless limited at plugin options
                        events: ['mousemove', 'mouseout', 'click', 'touchstart', 'touchmove'],
                        onClick: (e) => {
                            const canvasPosition = Chart.helpers.getRelativePosition(e, chart);

                            // Substitute the appropriate scale IDs
                            const dataX = chart.scales.x.getValueForPixel(canvasPosition.name);
                            // const dataY = chart.scales.y.getValueForPixel(canvasPosition.y);
                        }
                    }
                });
            </script>

            <div class="py-10">
                <ul>
                    @foreach ($posts as $post)
                        <li
                            style="border-radius: 10px;
    margin: 1% 48% 0% 5%;
    border: solid;
    border-width: thin;
    padding: 10px;">
                            <canvas id="pie-chart" width="800" height="450"></canvas>
                            <a href="{{ route('post.show', $post['id']) }}">
                                <p>
                                    {{ call_user_func($cutString, (string) $post['title']) }}
                                </p>
                            </a>

                            <p class="py-1">
                                {{ call_user_func($cutString, (string) $post['content'], 50) }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{ $posts->links() }}
            @include('templates.footer')

        @endsection
