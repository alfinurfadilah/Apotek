<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #e9e9e9;
    }

    tr:hover {
        background-color: #ddd;
    }
</style>

<table class="table table-hover table-bordered 
table-stripped" id="example2">
<table class="table	table-hover	table-bordered table-stripped" id="example2">
                    <thead>
                        <tr>
                        <tr class="table-danger">
                            <th>No.</th>
                            <th>Nonota_Jual</th>
                            <th>Tgl_Jual</th>
                            <th>Total_Jual</th>
                            <th>Id_User</th>
                            

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($penjualan as $key => $penjualan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$penjualan->nonota_jual}}</td>
                            <td>{{$penjualan->tgl_jual}}</td>
                            <td>{{$penjualan->total_jual}}</td>
                            <td>{{$penjualan->fuser->name}}</td>
                         
        </tr>
        
        @endforeach
    </tbody>
</table>