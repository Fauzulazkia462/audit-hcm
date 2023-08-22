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
                                <h4 class="card-title">Edit Audit</h4>
                                <form method="POST" class="forms-sample" action="{{ url('audit/'.$model->id) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="no-form">No Form</label>
                                                <input type="text" class="form-control" name="no_form" placeholder="No Form" value="{{ $model->no_form }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="audit-date">Audit Date</label>
                                                <input type="date" class="form-control" name="audit_date" placeholder="Audit Date" value="{{ $model->audit_date }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="section">Section</label>
                                                <select class="form-control form-control-lg" name="section" value="">
                                                    <option {{ $model->section == 'GA' ? 'selected':'' }} value="GA">GA</option>
                                                    <option {{ $model->section == 'CSR & HSE' ? 'selected':'' }} value="CSR & HSE">CSR & HSE</option>
                                                    <option {{ $model->section == 'Learning & Development' ? 'selected':'' }} value="Learning & Development">Learning & Development</option>
                                                    <option {{ $model->section == 'Personalia' ? 'selected':'' }} value="Personalia">Personalia</option>
                                                    <option {{ $model->section == 'Recruitment' ? 'selected':'' }} value="Recruitment">Recruitment</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="auditee-job-title">Auditee Job Title</label>
                                                <input type="text" class="form-control" name="auditee_job_title" placeholder="Auditee Job Title" value="{{ $model->auditee_job_title }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="item-kriteria-audit">Item Kriteria Audit</label>
                                                <input type="text" class="form-control" name="item_kriteria" placeholder="Item Kriteria Audit" value="{{ $model->item_kriteria }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="deadline">Deadline</label>
                                                <input type="date" class="form-control" name="deadline" placeholder="Deadline" value="{{ $model->deadline }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="finding">Temuan</label>
                                                <input type="text" class="form-control" name="finding" placeholder="Temuan" value="{{ $model->finding }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="repair">Perbaikan</label>
                                                <input type="text" class="form-control" name="repair" placeholder="Perbaikan" value="{{ $model->repair }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control form-control-lg" name="status">
                                                    <option {{ $model->status == 'Done' ? 'selected':'' }} value="Done">Done</option>
                                                    <option {{ $model->status == 'On Progress' ? 'selected':'' }} value="On Progress">On Progress</option>
                                                    <option {{ $model->status == 'Pending' ? 'selected':'' }} value="Pending">Pending</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-inverse-primary btn-fw">Submit</button>
                                    <a class="btn btn-inverse-primary btn-fw" href="{{ url('audit/') }}">Cancel</a>
                                    {{ method_field('PUT') }}
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
