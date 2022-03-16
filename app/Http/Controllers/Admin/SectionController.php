<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('admin.sections.index', ['sections'  => $sections]);
    }

    public function updateSectionStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'section_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            Section::where('id', $data['section_id'])->update([
                'status'    => $status
            ]);
            return response()->json([
                'status'        => $status,
                'section_id'    => $data['section_id']
            ]);
        }
    }
}
