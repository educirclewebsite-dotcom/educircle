<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use App\Mail\LeadInquiryMail;
use App\Models\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class LeadController extends Controller
{

    public function index(Request $request)
    {
        // $query = Lead::query();
        // if ($request->start && $request->end) {
        //     try {
        //         $start = Carbon::createFromFormat('d M, Y', $request->start)->startOfDay();
        //         $end = Carbon::createFromFormat('d M, Y', $request->end)->endOfDay();
        //         $query->whereBetween('created_at', [$start, $end]);
        //     } catch (\Exception $e) {
        //     }
        // }
        // $leads = $query->orderByDesc('created_at')->paginate(10);
        return view('admin.leads.index');
    }

    public function create()
    {
        return view('admin.leads.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'contact_number' => 'nullable|string|max:15',
            'whatsapp_number' => 'nullable|string|max:15',
            'subject' => 'nullable|string|max:150',
            'message' => 'nullable|string',
        ]);

        $lead = Lead::create($request->all());
        try {
            Mail::to([
                'kalpanatg@educircle.io',
                'prateeka@educircle.io'
                // 'msatish8@gmail.com'
            ])->send(new LeadInquiryMail($lead));
        } catch (\Exception $e) {
            Log::error("Mail sending failed: " . $e->getMessage());
        }

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your inquiry has been sent successfully. Our team will contact you shortly.',
                'data' => $lead
            ]);
        }

        return redirect()->back()
            ->with('success', 'Your inquiry has been sent successfully.');
    }

    public function showForm()
    {
        return view('contact');
    }

    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        return view('admin.leads.edit', compact('lead'));
    }

    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);
        $lead->update($request->only(['name', 'email', 'contact_number', 'subject']));
        session()->flash('success_msg', "Lead Successfully Updated!");
        return redirect()->route('lead.index');
    }

    public function destroy(string $id)
    {
        $lead = Lead::find($id);
        if ($lead) {
            $lead->delete();
        }
        return response()->json(['success' => true], 200);
    }

    public function getData(Request $request)
    {
        $query = Lead::query();

        if ($request->start && $request->end) {
            try {
                $start = Carbon::createFromFormat('d M, Y', $request->start)->startOfDay();
                $end = Carbon::createFromFormat('d M, Y', $request->end)->endOfDay();
                $query->whereBetween('created_at', [$start, $end]);
            } catch (\Exception $e) {
            }
        }
        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn("DT_RowIndex", '')
            ->editColumn('created_at', function ($lead) {
                return Carbon::parse($lead->created_at)->format('d-m-Y');
            })
            ->addColumn('action', function ($datatables) {
                return '<a href="' . route('lead.edit', $datatables->id) . '" class="btn btn-info btn-sm" title="Edit Detail"><i class="mdi mdi-pencil d-block font-size-16"></i></a>
                     <a onclick="deleteIt(' . $datatables->id . ')" class="btn btn-danger btn-sm" title="delete"><i class="mdi mdi-trash-can text-white d-block font-size-16"></i></a>';
            })->make(true);
    }

    public function exportExcel(Request $request)
    {
        $query = Lead::query();

        if ($request->start && $request->end) {
            try {
                $start = Carbon::createFromFormat('d M, Y', $request->start)->startOfDay();
                $end = Carbon::createFromFormat('d M, Y', $request->end)->endOfDay();
                $query->whereBetween('created_at', [$start, $end]);
            } catch (\Exception $e) {
            }
        }

        $leads = $query->select('name', 'email', 'contact_number', 'created_at')->get();

        $exportData = $leads->map(function ($lead) {
            return [
                'name' => $lead->name,
                'email' => $lead->email,
                'contact_number' => $lead->contact_number,
                'created_at' => Carbon::parse($lead->created_at)->format('d-m-Y'),
            ];
        });

        $headings = ['Name', 'Email', 'contact_number', 'Created At'];

        return Excel::download(new ReportExport($exportData, $headings), 'lead-report.xlsx');
    }
}
