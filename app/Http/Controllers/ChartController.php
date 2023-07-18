<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Routing\Controller as BaseController;

class ChartController extends BaseController
{
   public function viewChart()
   {   
       $post = DB::table('students')->paginate(5);

       return view("chart", ["post"=>$post]);
   
       //return view("blog", compact("posts"));
   }
   public function createStudentData(Request $request)
   {
        return view('addChart');
   }

   public function storeStudentData(Request $request)
   {
        $data = array(
          'student_name'=> $request->post('name'),
          'student_subject' =>$request->post('subject'),
          'student_marks'=> $request->post('marks')
        );

        $post = DB::table('students')->insert($data);
        return redirect('chart')->with('success', 'The Data Inserted');
   }

   public function deleteStudentData(Request $request)
   {
        $deleteID = $request->post('deleteID');
        $post = DB::table('students')->where('id', '=', $deleteID)->delete();
        if($post)
        {
            return redirect('chart')->with('success', 'The Data Delete');
        }
        else
        {
            return redirect('chart')->with('error', 'Cant not Delete');
        }
   }

   public function showStatics()
   {
    $stud_sub = DB::table('students')
    ->select('student_subject', DB::raw('COUNT(*) as total'))
    ->groupBy('student_subject')
    ->get();

$data = [];
foreach ($stud_sub as $stud) {
$data[] = [
'label' => $stud->student_subject,
'y' => $stud->total
];
}

return view('statics', ['data' => $data]);
   }
}