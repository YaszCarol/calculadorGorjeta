<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gorjeta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group label {
            color: #343a40;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .results {
            margin-top: 30px;
            padding: 20px;
            background: #e9ecef;
            border-radius: 8px;
        }
        .results h3 {
            color: #28a745;
            text-align: center;
        }
        .results table {
            width: 100%;
            margin-top: 20px;
        }
        .results table th, .results table td {
            padding: 10px;
            text-align: left;
        }
        .results table th {
            background-color: #007bff;
            color: white;
        }
        .results table td {
            background-color: #f8f9fa;
            color: #212529;
        }
        .alert-danger {
            margin-top: 20px;
        }
        .alert-danger ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Gorjeta</h1>
        <form action="{{ route('calculate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="bill_amount">Valor da Conta</label>
                <input type="number" class="form-control" id="bill_amount" name="bill_amount" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="tip_percentage">Porcentagem da Gorjeta</label>
                <input type="number" class="form-control" id="tip_percentage" name="tip_percentage" required>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>

        @isset($tipAmount)
        <div class="results">
            <h3>Resultados</h3>
            <table class="table table-bordered">
                <tr>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
                <tr>
                    <td>Valor da Conta</td>
                    <td>R$ {{ number_format($billAmount, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Porcentagem da Gorjeta</td>
                    <td>{{ $tipPercentage }}%</td>
                </tr>
                <tr>
                    <td>Valor da Gorjeta</td>
                    <td>R$ {{ number_format($tipAmount, 2, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>Valor Total</td>
                    <td>R$ {{ number_format($totalAmount, 2, ',', '.') }}</td>
                </tr>
            </table>
        </div>
        @endisset

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</body>
</html>
