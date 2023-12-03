<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Simple AB</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mt-4 mb-0 pb-3 border-bottom">Laravel Simple AB</h1>
            </div>
            @foreach (AB::getReports() as $report)
            <div class="col-12">
                <h3 class="mt-3 mb-0">{{ $report['key'] }}</h3>
                <div class="row">
                    @foreach ($report['data'] as $key => $events)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="bg-white border rounded p-3 mt-3">
                                <h5 class="pb-3 mb-0 border-bottom">{{ $key }}</h5>
                                @foreach ($events as $event => $count)
                                    <div class="row mt-3">
                                        <div class="col-6">
                                            {{ $event }}
                                        </div>
                                        <div class="col-6 text-end">
                                            {{ number_format($count) }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <div class="col-12">
                <div class="mt-4 mb-3 text-muted">Laravel Simple AB</div>
            </div>
        </div>
    </div>
</body>
</html>
