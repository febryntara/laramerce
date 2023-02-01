<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
<style>
    table,th,td{
        border:1px solid;
        padding: 5px 10px 5px 10px;
        font-size: 12px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
</style>
</head>
<body style="font-family: Arial, Helvetica, sans-serif">
    <div style="text-align: center">
        <h4>Monthly Report For Orders ({{ date("F-Y",strtotime($orders->first()->created_at))}})</h4>
    </div>
    <table>
        <thead>
            <th>NO</th>
            <th>NAME</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>GROSS AMOUNT</th>
            <th>PAYMENT TYPE</th>
        </thead>
        <tbody>
            @foreach ($orders as $index=>$item)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td >{{ $item->name }}</td>
                <td>{{ $item->phone }}</td>
                 <td>{{ $item->email }}</td>
                <td style="text-align: right">{{ ch_currency($item->gross_amount) }}</td>
                <td>{{ $item->payment_type}}</td>
            </tr>
                
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td style="text-align: center" colspan="4">Total</td>
                <td style="text-align: right" colspan="2">{{ ch_currency($total) }}</td>
            </tr>
        </tfoot>
    </table>
    
</body>
</html>