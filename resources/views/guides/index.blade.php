<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorials iFixit</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Estils generals */
        body {
            background: #f5f5f5;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #24282B;
        }

        h1 {
            font-weight: 600;
            color: #E9D941;
            text-align: center;
            margin-bottom: 40px;
            font-size: 3.5rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* Disseny de les targetes */
        .card {
            border-radius: 15px;
            overflow: hidden;
            background: linear-gradient(135deg, #F7A034, #D26329);
            color: white;
            border: none;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.4s ease-in-out;
            position: relative;
            z-index: 1;
        }

        .card:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 220px;
            object-fit: cover;
            border-bottom: 3px solid rgba(255, 255, 255, 0.3);
            transition: transform 0.5s ease;
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }

        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 25px;
        }

        .card-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: #ffffff;
            text-align: center;
            margin-bottom: 10px;
            text-transform: capitalize;
            letter-spacing: 1px;
        }

        .card-text {
            font-size: 1.2rem;
            color: #ececec;
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .info-text {
            font-size: 0.9rem;
            color: #D1D3E2;
            margin-top: 15px;
        }

        .btn-primary {
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            padding: 12px 30px;
            background-color: transparent;
            border: 2px solid #E9D941;
            color: #E9D941;
        }

        .btn-primary:hover {
            background-color: #E9D941;
            color: #24282B;
            border-color: #E9D941;
        }

        .pagination {
            justify-content: center;
            margin-top: 50px;
        }

        .pagination .page-item .page-link {
            border-radius: 12px;
            color: #D26329;
            border: 1px solid #ddd;
            font-weight: 600;
        }

        .pagination .page-item.active .page-link {
            background-color: #D26329;
            border-color: #D26329;
            color: white !important;
        }

        /* Fondo de pantalla */
        .bg-gradient {
            background: linear-gradient(135deg, #F7A034, #D26329);
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
            opacity: 0.1;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        /* Animación de las tarjetas */
        .card-body h6 {
            animation: fadeIn 0.7s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <div class="bg-gradient"></div>
    <div class="container mt-5">
        <h1>Tutorials iFixit</h1>

        <!-- Targetes (Grid)-->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($guides as $guide)
                <div class="col">
                    <div class="card shadow-sm">
                        @php 
                            $image = is_array($guide->image) ? $guide->image : json_decode($guide->image, true);
                            $timeMin = $guide->time_required_min ? round($guide->time_required_min / 60) : 0;
                            $timeMax = $guide->time_required_max ? round($guide->time_required_max / 60) : 0;

                            $timeDisplay = ($timeMin == 0 && $timeMax == 0) ? "" : "$timeMin - $timeMax min";
                        @endphp
                        <img src="{{ $image['standard'] ?? 'https://via.placeholder.com/400x200' }}" class="card-img-top" alt="Imatge de la guia">

                        <div class="card-body">
                            <h6 class="card-title">{{ Str::limit($guide->title, 50) }}</h6>
                            <p class="card-text">
                                <strong>Categoria:</strong> {{ $guide->category }} <br>
                                <strong>Dificultat:</strong> {{ ucfirst(strtolower($guide->difficulty)) }}
                            </p>
                            <p class="info-text">
                                <strong>{{ $guide->author_username }}</strong> <br>
                                {{ $timeDisplay }}
                            </p>

                            <a href="{{ url('/guide/'.$guide->guide_id) }}" class="btn btn-primary btn-sm mt-2">Veure guia</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginació Bootstrap -->
        <div class="d-flex justify-content-center">
            {{ $guides->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
