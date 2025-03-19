<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $guide->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estils generals */
        body {
            background-color: #24282B;
            font-family: 'Poppins', sans-serif;
            color: white;
            margin: 0;
            padding: 0;
        }

        h1, h3 {
            color: #E9D941;
            text-align: center;
            font-weight: 600;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        h3 {
            font-size: 1.5rem;
            text-transform: none;
        }

        hr {
            border-top: 2px solid #D26329;
        }

        /* Sección de herramientas */
        .tool-card {
            border-radius: 15px;
            background: linear-gradient(135deg, #F7A034, #D26329);
            color: white;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.4s ease-in-out;
        }

        .tool-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .tool-image {
            width: 100px;
            height: auto;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .tool-card .card-body {
            padding: 20px;
        }

        .step-card {
            border-radius: 12px;
            background-color: white;
            color: #3C2123;
            padding: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease-in-out;
        }

        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .step-number {
            background-color: #D26329;
            color: white;
            font-weight: bold;
            padding: 8px 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 10px;
        }

        .step-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 10px;
        }

        /* Estilo de comentarios */
        .comment-box {
            background-color: #3C2123;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            color: white;
        }

        .comment-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: transparent;
            border: 2px solid #E9D941;
            color: #E9D941;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
            font-size: 1rem;
            padding: 12px 30px;
        }

        .btn-primary:hover {
            background-color: #E9D941;
            color: #24282B;
            border-color: #E9D941;
        }

    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>{{ $guide->title }}</h1>

        <div class="text-center">
            <strong>Categoria:</strong> {{ $guide->category }} |
            <strong>Tema:</strong> {{ $guide->subject }} |
            <strong>Dificultat:</strong> {{ ucfirst(strtolower($guide->difficulty)) }}
        </div>

        @if ($guide->time_required_min > 0 && $guide->time_required_max > 0)
        <p class="text-center mt-2">
            <strong>Temps estimat:</strong>
            {{ round($guide->time_required_min / 60) }} - {{ round($guide->time_required_max / 60) }} min
        </p>
        @endif

        <hr>

        <h3>Introducció</h3>
        <p>{{ $guide->introduction_raw }}</p>

        <hr>

        <h3>Eines necessàries</h3>
        <div class="row">
            @if (!empty($guide->tools))
            @php
            $tools = is_string($guide->tools) ? json_decode($guide->tools, true) : $guide->tools;
            @endphp
            @foreach ($tools as $tool)
            <div class="col-md-4 mb-3">
                <div class="card tool-card p-3">
                    <img src="{{ $tool['thumbnail'] ?? 'https://via.placeholder.com/100' }}" class="tool-image" alt="Eina">
                    <div class="card-body">
                        <h6 class="card-title">{{ $tool['text'] }}</h6>
                        <a href="{{ $tool['url'] }}" class="btn btn-primary btn-sm" target="_blank">🔗 Veure</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <p class="text-muted">No hi ha eines específiques per a aquesta guia.</p>
            @endif
        </div>

        <hr>

        <h3>Passos detallats</h3>
        @php
        $steps = is_string($guide->steps) ? json_decode($guide->steps, true) : $guide->steps;
        @endphp

        @if (!empty($steps))
        <div class="grid-container">
            @foreach ($steps as $index => $step)
            <div class="step-card">
                <h5><span class="step-number">{{ $index + 1 }}</span> {{ $step['title'] ?? 'Pas sense títol' }}</h5>
                <ul class="list-group list-group-flush">
                    @foreach ($step['lines'] as $line)
                    <li class="list-group-item">{{ $line['text_raw'] }}</li>
                    @endforeach
                </ul>

                @if (isset($step['media']['data']) && is_array($step['media']['data']))
                <div class="mt-3">
                    @foreach ($step['media']['data'] as $image)
                    <img src="{{ $image['standard'] ?? '' }}" class="step-image mb-2" alt="Imatge del pas">
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <p class="text-muted">No hi ha passos específics per a aquesta guia.</p>
        @endif

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
