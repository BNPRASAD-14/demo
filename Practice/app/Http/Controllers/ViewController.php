<?php

namespace App\Http\Controllers;



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\DB;


class ViewController extends BaseController
{
    public function recaptcha(Request $request)
    {
        return view('loginform');
    }

    public function index(Request $request)
    {
        return view('index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]
        ]);

        $input = $request->all();

        /*------------------------------------------
        --------------------------------------------
        Write Code for Store into Database
        --------------------------------------------
        --------------------------------------------*/
        dd($input);

        return redirect()->back()->with(['success' => 'Contact Form Submit Successfully']);
    }

    public function exportbtn(Request $request)
    {
        return view('export');
    }

    // public function exportdata(Request $request)
    // {
    //     $data = DB::select("select * from members");
    //     $output = "";
    //     if (count($data) > 0) {

    //             $output .= '
    //     <table class="table" bordered="1">  
    //                      <tr> 
    //                          <th>sr</th>
    //                           <th>firstName</th>  
    //                           <th>lastName</th>  
    //                           <th>email</th>
    //                           <th>gender</th>
    //                           <th>country</th> 
    //                           <th>status</th>   

    //                      </tr>
    //    ';

    //    for ($i=0; $i<count($data); $i++){
    //     $output .= '
    //     <tr>  

    //                          <td>'.($i+1).'</td>
    //                          <td>hii</td> 
    //                          <td>hii</td>  
    //                          <td>hii</td>   
    //                          <td>hii</td>
    //                           <td>hii</td>
    //                           <td>hii</td>  
    //                     </tr>
    //    ';
    //    }
    //    $output .= '</table>';
    //    header('Content-Type: application/xls');
    //    header('Content-Disposition: attachment; filename=download.xls');
    // //   echo $output;
    //         return response()->json([
    //             "status" => "success",
    //             "data"=>$output
    //         ]);
    //     } else {
    //         return response()->json([
    //             "status" => "failed"
    //         ]);
    //     }
    // }

    public function exportdata(Request $request)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $data = DB::select("select * from members");

       
        $sheet->fromArray($data, NULL, 'A1');

        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="example.xlsx"');

        
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        return response()->json([
              "status"=>"success",
              

        ]);
    }

    public function sequencedata(Request $request )
    {
        $position = $request->input('position');
        $value = $request->input('value');

        
    }

    public function file_upload(Request $request)
    {
        return view('file');
    }
}


// <tr>  
                            
// <td>'.($i+1).'</td>
// <td>'.$data[$i]["first_name"].'</td> 
// <td>'.$data[$i]["last_name"].'</td>  
// <td>'.$data[$i]["email"].'</td>   
// <td>'.$data[$i]["gender"].'</td>
//  <td>'.$data[$i]["Country"].'</td>
//  <td>'.$data[$i]["status"].'</td>  
// </tr>