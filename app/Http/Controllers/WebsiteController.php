<?php

namespace App\Http\Controllers;

use App\Models\admin\Category;
use App\Models\admin\Footer;
use App\Models\admin\Header;
use App\Models\admin\Watermark;
use App\Models\Menuscript;
use App\Models\SubmitPaper;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;

class WebsiteController extends Controller
{
    public function details($id)
    {
        $category = Category::find($id);
        $papers = Menuscript::where('category_id',$id)
        ->where('publish_script','1')
        ->get();

    //    echo json_encode($papers);
    //    exit();

        return view('website.details',compact('papers','category'));
    }

    // public function index()
    // {
    //     $categories = Category::all();
    //     return view('website.index',compact('categories'));
    // }

    public function index()
    {
        $categories = Category::all();
        return view('website.index', compact('categories'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $categories = Category::where('category_name', 'LIKE', '%' . $query . '%')->get();

        // return view('website.index', compact('categories'));
        // $category = Category::find($request->id);

        // $papers = Menuscript::
        // where('publish_script','1')
        // ->when($query, function ($q) use ($query) {
        //     $q->where('menuscript_title', 'LIKE', '%' . $query . '%')
        //       ->orWhere('abstract', 'LIKE', '%' . $query . '%'); // Add more fields as needed
        // })
        // ->get();

        $papers = Menuscript::where('publish_script', '1')
        ->where('user_id', '!=','1')
        ->when($query, function ($q) use ($query) {
            $q->where('menuscript_title', 'LIKE', '%' . $query . '%')
              ->orWhereHas('submitted_paper', function($q) use ($query) {
                  $q->where('abstract', 'LIKE', '%' . $query . '%');
              });
        })
        ->get();

    //    echo json_encode($papers);
    //    exit();
    return view('website.search_result',compact('categories', 'papers'));
      
    }

    
    public function get_search(Request $request)
    {
       $get_search = Menuscript :: where('menuscript_title',$request->search)->get();
    //    echo json_encode($get_search);
    //    exit();
        return back();
    }

    public function download($id)
    {
        // Fetch the Menuscript or any other model instance by ID
        $menuscript = Menuscript::findOrFail($id);
        $script = SubmitPaper :: where('menuscript_id',$id)->first();
        // $script = SubmitPaper :: where('id',10)->first();
    
        $header = Header ::first();
        $footer = Footer :: first();
        $watermark = Watermark ::first();
        // Get the HTML content you want to convert to PDF
        $html = view('menuscript_pdf', compact('menuscript','header','footer','watermark','script'))->render();

        // Setup Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf = new Dompdf($options);

        // Load HTML to Dompdf
        $dompdf->loadHtml($html);

        // (Optional) Set paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();
        $canvas = $dompdf->getCanvas();
        // Generate the filename for download
        $filename = 'menuscript_' . $menuscript->id . '.pdf';


       
            //    $filePath = public_path('panel/images/menuscript_file/' . $fileName);
        // Output the generated PDF to Browser (force download)
        return $dompdf->stream($filename);
    }

}
