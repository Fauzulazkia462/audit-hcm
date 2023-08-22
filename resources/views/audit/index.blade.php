@extends('layouts.main')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h3>Data Kegiatan Audit HCM</h3>
                                </div>

                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="template-demo">
                                            <a class="btn btn-inverse-primary btn-fw" href="{{ url('audit/create') }}">Add</a>
                                            <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-fw" id="nreportDropdown" href="#" data-bs-toggle="dropdown">Export</a>
                                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="nreportDropdown">
                                                <p class="mb-0 font-weight-medium float-left dropdown-header">Exports</p>
                                                <a href="/exportexcel" class="btn btn-inverse-primary btn-sm"> Excel </a>
                                                <a href="/exportpdf" class="btn btn-inverse-primary btn-sm"> PDF </a>
                                                <a href="/exportcsv" class="btn btn-inverse-primary btn-sm"> CSV </a>
                                            </div>

                                           

                                        </div>

                                        
                                    <div class="filter-place">
                                        <div class="filter-in">
                                        <select data-column="2" id="form_frame" class="form-control filter-select filter-section">
                                            <option hidden selected>Section</option>
                                            @foreach($section as $sc)
                                                <option value="{{$sc}}">{{$sc}}</option>
                                            @endforeach    
                                        </select>
                                        </div>

                                        <div class="filter-in">
                                        <select data-column="3" id="form_frame2" class="form-control filter-select filter-status">
                                            <option hidden selected>Status</option>
                                            @foreach($status as $st)
                                                <option value="{{$st}}">{{$st}}</option>
                                            @endforeach    
                                        </select>
                                        </div>

                                        <div class="filter-in">
                                            <button class="btn btn-inverse-primary btn-sm btnClear">Clear Filter</button>
                                        </div>


                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



                                </div>

                                        

                                       
                                    </div>





                                    

                                </div>

                                <div class="container">
                                    <table id="dttable" class="table table-stripeds">
                                        <thead>
                                            <tr>
                                                <th>No Form</th>
                                                <th>Audit Date</th>
                                                <th class="sectionTh">Section</th>
                                                <th class="statusTh">Status</th>
                                                <th>Temuan</th>
                                                <th>Perbaikan</th>
                                                <th>Auditee Job Title</th>
                                                <th>Item Kriteria Audit</th>
                                                <th>Deadline</th>
                                                <th>Action</th>
                                                <th></th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                           
                                            @foreach ($datas as $key=>$value)
                                                <tr>
                                                    <td>{{ $value->no_form }}</td>
                                                    <td>{{ $value->audit_date }}</td>
                                                    <td>{{ $value->section }}</td>
                                                    <td>{{ $value->status }}</td>
                                                    <td>{{ $value->finding }}</td>
                                                    <td>{{ $value->repair }}</td>
                                                    <td>{{ $value->auditee_job_title }}</td>
                                                    <td>{{ $value->item_kriteria }}</td>
                                                    <td>{{ $value->deadline }}</td>
                                                    <td><a class="btn btn-inverse-primary btn-sm" href="{{ url('audit/'.$value->id.'/edit') }}">Edit </a></td>
                                                    <td>
                                                        <form action="{{ url('audit/'.$value->id) }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button class="btn btn-inverse-primary btn-sm" type="submit">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
$(document).ready(function() {
    var table = $('#dttable').DataTable();
        
    

    // $('.filter-input').keyup(function(){
    //     table.column( $(this).data('column') )
    //     .search( $(this).val() )
    //     .draw();
    // });
    

    $('.filter-select').change(function(){
        table.column( $(this).data('column') )
        .search( $(this).val() )
        .draw();
    });

    $('.btnClear').on('click', function(){
        $('.filter-section').val('Section').trigger('change');
        $('.filter-status').val('Status').trigger('change');
        
        $('#dttable').DataTable().columns().search('').draw();
        
        
    });


});
</script>



{{-- <script>
    $(document).ready(function() {
        $('#dttable').DataTable();
        
    });
</script> --}}

<script>
    $('#dttable').dataTable( {
        "columnDefs": [
            { "targets": 0, "width": 70 },
            { "targets": 1, "width": 90 },
            { "targets": 3, "width": 100 },
            // { "targets": 7, "width": 900 }
        ],
        "bStateSave": true,
        "fnStateSave": function (oSettings, oData) {
            localStorage.setItem('offersDataTables', JSON.stringify(oData));
        },
        "fnStateLoad": function (oSettings) {
            return JSON.parse(localStorage.getItem('offersDataTables'));
        }
    });

</script>


<script>
    
    $(function() {
    if (localStorage.getItem('form_frame')) {
        $("#form_frame option").eq(localStorage.getItem('form_frame')).prop('selected', true);
    }

    $("#form_frame").on('change', function() {
        localStorage.setItem('form_frame', $('option:selected', this).index());
    });
});





$(function() {
    if (localStorage.getItem('form_frame2')) {
        $("#form_frame2 option").eq(localStorage.getItem('form_frame2')).prop('selected', true);
    }

    $("#form_frame2").on('change', function() {
        localStorage.setItem('form_frame2', $('option:selected', this).index());
    });
});
  </script>


@endsection
