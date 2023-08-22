<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Exports\AuditExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use DB;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $datas = Audit::all();
        $section = $datas->sortBy('section')->pluck('section')->unique();
        $status = $datas->sortBy('status')->pluck('status')->unique();

        return view('audit.index', compact(
            'datas', 'section', 'status'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Audit;
        return view('audit.create', compact(
            'model'
        ));
    }

    public function check($no_form)
    {
        // return response()->json(['success' => $no_form ]);

        $data = DB::table('audit')->where('no_form', $no_form)->exists();

        if($data) {
            $message = 'not_unique';
        } else {
            $message = 'unique';
        }

        // Ajax harus return json
        return response()->json(['success' => $message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $no_form = $request->no_form;
        $audit_date = $request->audit_date;
        $section = $request->section;

        $model = new Audit;

        if (count($data['finding'] ) > 0 )
        {
            foreach($data['finding'] as $item => $value) {
                $dt = array(
                    'no_form' => $no_form,
                    'audit_date' => $audit_date,
                    'section' => $section,
                    'status' => $data['status'][$item],
                    'finding' => $data['finding'][$item],
                    'repair' => $data['repair'][$item],
                    'auditee_job_title' => $data['auditee_job_title'][$item],
                    'item_kriteria' => $data['item_kriteria'][$item],
                    'deadline' => $data['deadline'][$item],
                );

                Audit::create($dt);
            }
        }
        return redirect('audit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Audit::find($id);
        return view('audit.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Audit::find($id);
        $model->no_form = $request->no_form;
        $model->audit_date = $request->audit_date;
        $model->section = $request->section;
        $model->status = $request->status;
        $model->finding = $request->finding;
        $model->repair = $request->repair;
        $model->auditee_job_title = $request->auditee_job_title;
        $model->item_kriteria = $request->item_kriteria;
        $model->deadline = $request->deadline;
        $model->save();

        return redirect('/audit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Audit::find($id);
        $model->delete();

        return redirect('audit');
    }

    /**
     * Export Excel
     *
     * @return void
     */
    public function exportexcel()
    {
        return Excel::download(new AuditExport, 'audit-'.date('Y-m-d').'.xlsx');
    }

    /**
     * Export CSV
     *
     * @return void
     */
    public function exportcsv()
    {
        return Excel::download(new AuditExport, 'audit-'.date('Y-m-d').'.csv');
    }

    /**
     * Export PDF
     *
     * @return void
     */
    public function exportpdf()
    {
        $data = Audit::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('export/audit-pdf');

        return $pdf->download('audit-'.date('Y-m-d').'.pdf');
    }

   


}
