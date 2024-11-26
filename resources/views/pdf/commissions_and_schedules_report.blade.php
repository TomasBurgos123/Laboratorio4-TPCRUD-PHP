<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Comisiones y Horarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Comisiones y Horarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID Comisión</th>
                <th>Aula</th>
                <th>Horario</th>
                <th>Profesor(es)</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commissions as $commission)
                <tr>
                    <td>{{ $commission->id }}</td>
                    <td>{{ $commission->aula }}</td>
                    <td>{{ $commission->horario }}</td>
                    <td>
                        @foreach($commission->professors as $professor)
                            {{ $professor->name }}<br>
                        @endforeach
                    </td>
                    <td>{{ $commission->course->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
