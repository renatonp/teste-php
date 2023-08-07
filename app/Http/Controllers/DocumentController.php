<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use View;
use App\Models\Document;

class DocumentController extends Controller
{
	public function prepareNewDocument(){
        Document::prepareNewDocument();
		return View::make('document');
    }

    public function addData(Request $request){
        Document::addData($request);
		return View::make('document');
    }

    public function generatePDF(Request $request)
    {
        $document = Document::get();
  
        $data = [
                'column_one' => $document[0],
                'column_two' => $document[1],
                'column_three' => $document[2],
                'column_four' => $document[3]
        ];
  
        if($request->has('download'))
        {
            $pdf = PDF::loadView('generatePDF',$data);
            return $pdf->download('pdf_document.pdf');
        }
  
        return view('generatePDF',compact('document'));
    }    
}