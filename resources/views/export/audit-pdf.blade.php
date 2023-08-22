<!DOCTYPE html>
<html>
    <head>
        <style>
            #audit {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #audit td, #audit th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #audit tr:nth-child(even){background-color: #f2f2f2;}

            #audit tr:hover {background-color: #ddd;}

            #audit th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #E20A19;
                color: white;
            }
        </style>
    </head>
    <body>
        <h1>Audit Data</h1>

        <table id="audit">
            <tr>
                <th>No.</th>
                <th>No Form</th>
                <th>Audit Date</th>
                <th>Section</th>
                <th>Status</th>
                <th>Temuan</th>
                <th>Perbaikan</th>
                {{-- <th>Auditee Job Title</th> --}}
                {{-- <th>Item Kriteria Audit</th> --}}
                {{-- <th>Deadline</th> --}}
            </tr>
            @php
                $no = 1;
            @endphp
            @foreach ($data as $value)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $value->no_form }}</td>
                <td>{{ $value->audit_date }}</td>
                <td>{{ $value->section }}</td>
                <td>{{ $value->status }}</td>
                <td>{{ $value->finding }}</td>
                <td>{{ $value->repair }}</td>
                {{-- <td>{{ $value->auditee_job_title }}</td> --}}
                {{-- <td>{{ $value->item_kriteria }}</td> --}}
                {{-- <td>{{ $value->deadline }}</td> --}}
            </tr>
            @endforeach
        </table>
    </body>
</html>
