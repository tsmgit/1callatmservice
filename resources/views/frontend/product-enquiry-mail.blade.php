<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #BA0C00;
            color: white;
        }
    </style>
</head>

<body>
    <table id="customers">
        <tr>
            <th colspan="3">1 Call ATM Service LLC Product Enquiry Form</th>
        </tr>
        <tr>
            <td>Product Name</td>
            <td>{{$product_name}}</td>
        </tr>
        <tr>
            <td>Company</td>
            <td>{{$company}}</td>
        </tr>
        <tr>
            <td>RMA No</td>
            <td>{{$rma_no}}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{$email}}</td>
        </tr>
        <tr>
            <td>Phone No</td>
            <td>{{$phone}}</td>
        </tr>
        <tr>
            <td>Address</td>
            <td>{{$address}}</td>
        </tr>
        <tr>
            <td>Message</td>
            <td>{{$msg}}</td>
        </tr>
    </table>
</body>

</html>