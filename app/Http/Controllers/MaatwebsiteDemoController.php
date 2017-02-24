<?php

namespace App\Http\Controllers;
//use Input;
use App\Item;
use DB;
use PDF;
use Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class MaatwebsiteDemoController extends Controller
{
	public function importExport()
	{
  $items =$items = DB::select('select * from items');
    view()->share('items',$items);
		return view('importExport');
  
	}
	public function downloadExcel($type)
	{
		$data = Item::get()->toArray();
  
		return Excel::create('export file '.$type, function($excel) use ($data) {
    $excel->setTitle('Our new awesome title');
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
                 $sheet->protectCells('A1', '123456');
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcel()
	{
		if(Input::hasFile('import_file')){
			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['title' => $value->title, 'description' => $value->description];
				}
				if(!empty($insert)){
					DB::table('items')->insert($insert);
          $data=DB::select('select * from items');
          view()->share('items',$data);
          return view('importExport');
				//	dd('Insert Record successfully.');
				}
			}
		}
		return back();
	}

     public function pdfview(Request $request)
    {
        $items = DB::select('select * from items');
        view()->share('items',$items);

        if($request->has('download')){
            $pdf = PDF::loadView('pdfview',$items);
            return $pdf->download('pdfview.pdf');
        }

        return view('pdfview');
    }
/*public function exportPDF()
	{
	   $data = Item::get()->toArray();
	   return Excel::create('itsolutionstuff_example', function($excel) use ($data) {
		$excel->sheet('mySheet', function($sheet) use ($data)
	    {
			$sheet->fromArray($data);
	    });
	   })->download("pdf");
	}*/
}
