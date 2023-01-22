<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use Illuminate\Http\Request;

class ScholarSubmitRequirementsController extends Controller
{
    public function index(){
        $scholar = Scholar::find(auth()->user()->id);
        // dd(count($scholar->getMedia('scholar_regi')));
        return view('scholar.submit-requirements', compact('scholar'));
    }

    //
    public function store(Request $request){
        $request->validate([
            'file_input_scholar_regi' => ['required_without:file_input_scholar_report' ,'file', 'mimes:jpg,png,jpeg'],
            'file_input_scholar_report' => ['required_without:file_input_scholar_regi', 'file', 'mimes:jpg,png,jpeg'],
        ]);

        $scholar = Scholar::find(auth()->user()->id);
        // if(empty($request->file_input_scholar_regi) && empty($request->file_input_scholar_report)){
        //     return redirect()->route('submit-requirements.index')->with('error', 'Requirements Have Been Submitted');
        // }
        if(!empty($request->file_input_scholar_regi)){
            $scholar->addMedia($request->file_input_scholar_regi)->toMediaCollection('scholar_regi');
            $scholar->update(['scholarresubmissionmessage' => null]);
        }
        if(!empty($request->file_input_scholar_report)){
            $scholar->addMedia($request->file_input_scholar_report)->toMediaCollection('scholar_report');
            $scholar->update(['scholarresubmissionmessage' => null]);
        }
        return redirect()->route('submit-requirements.index')->with('success', 'Requirements Have Been Submitted');
    }
}
