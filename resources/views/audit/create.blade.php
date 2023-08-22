@extends('layouts.main')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Audit</h4>

                                <form method="POST" class="forms-sample" action="{{ url('audit') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="no-form">No Form</label>
                                                {{-- <input type="number" maxlength="4" class="form-control" name="no_form" placeholder="No Form"> --}}
                                                <input name="no_form" id="no-form" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="4" class="form-control" placeholder="No Form" required>
                                                <span id="error-no-form"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="audit-date">Audit Date</label>
                                                {{-- <input type="date" class="form-control" name="audit_date" placeholder="Audit Date" required> --}}
                                                <input type="date" class="form-control" name="audit_date" id="audit-date" placeholder="Audit Date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="section">Section</label>
                                                <select class="form-control form-control-lg" name="section" required>
                                                    <option value="GA">GA</option>
                                                    <option value="CSR & HSE">CSR & HSE</option>
                                                    <option value="Learning & Development">Learning & Development</option>
                                                    <option value="Personalia">Personalia</option>
                                                    <option value="Recruitment">Recruitment</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="finding">Temuan</label>
                                                <input type="text" class="form-control" name="finding[]" placeholder="Temuan" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="repair">Perbaikan</label>
                                                <input type="text" class="form-control" name="repair[]" placeholder="Perbaikan">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control form-control-lg" name="status[]" required>
                                                    <option value="Done">Done</option>
                                                    <option  value="On Progress">On Progress</option>
                                                    <option  value="Pending">Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="repair"> Tambah </label>
                                                <a href="#" class="addfindings btn btn-inverse-primary btn-fw form-control">+</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="auditee">Auditee Job Title</label>
                                                <input type="text" class="form-control" name="auditee_job_title[]" placeholder="Auditee Job Title">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="item-kriteria">Item Kriteria Audit</label>
                                                <input type="text" class="form-control" name="item_kriteria[]" placeholder="Item Kriteria Audit">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="deadline">Deadline Perbaikan</label>
                                                <input type="date" class="form-control" name="deadline[]" placeholder="Deadline Perbaikan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fields"></div>
                                    <button type="submit" id="add" class="btn btn-inverse-primary btn-fw">Submit</button>
                                    {{ csrf_field() }}
                                    <a class="btn btn-inverse-primary btn-fw" href="{{ url('audit/') }}">Cancel</a>
                                </form>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript">
    $('.addfindings').on('click', function(){
        addFinding();
    });

    function addFinding() {
        var field = '<div><div class="row"><div class="col-md-4"><div class="form-group"><label for="finding">Temuan</label><input type="text" class="form-control" name="finding[]" placeholder="Temuan" required></div></div><div class="col-md-4"><div class="form-group"><label for="repair">Perbaikan</label><input type="text" class="form-control" name="repair[]" placeholder="Perbaikan"></div></div><div class="col-md-2"><div class="form-group"><label for="status">Status</label><select class="form-control form-control-lg" name="status[]" required><option value="Done">Done</option><option  value="On Progress">On Progress</option><option  value="Pending">Pending</option></select></div></div><div class="col-md-2"><div class="form-group"><label for="repair"> Hapus </label><a href="#" class="remove btn btn-inverse-primary btn-fw form-control">x</a></div></div></div><div class="row"><div class="col-md-4"><div class="form-group"><label for="auditee">Auditee Job Title</label><input type="text" class="form-control" name="auditee_job_title[]" placeholder="Auditee Job Title"></div></div><div class="col-md-4"><div class="form-group"><label for="item-kriteria">Item Kriteria Audit</label><input type="text" class="form-control" name="item_kriteria[]" placeholder="Item Kriteria Audit"></div></div><div class="col-md-4"><div class="form-group"><label for="deadline">Deadline Perbaikan</label><input type="date" class="form-control" name="deadline[]" placeholder="Deadline Perbaikan"></div></div></div></>';
        $('.fields').append(field);
    };

    $('.remove').live('click', function(){
        $(this).parent().parent().parent().parent().remove();
    })
</script>

<script type="text/javascript">
$(document).ready(function () {
    var today = new Date().toISOString().split('T')[0];
    $("#audit-date").attr('max', today);
});
</script>

<script>
    $(document).ready(function() {
        $("#no-form").on('input', function(){
            var no_form = $(this).val(), error_no_form;

            $.ajax({
                type: 'GET',
                cache: false,
                url: "/audit/check/" + no_form,
                success:function(data){
                    // console.log(data.success)

                    if(data.success == 'unique') {
                        $('#error-no-form').html('<label class="text-success">No Form Available</label>');
                        $('#no-form').removeClass('has-error');
                        $('#add').prop('disabled', false);
                    }
                    else
                    {
                        $('#error-no-form').html('<label class="text-success">No Form Has Been Used</label>');
                        $('#no-form').addClass('has-error');
                        $('#add').prop('disabled', true);
                    }
                }
            });
        });
    });
</script>

@endsection
