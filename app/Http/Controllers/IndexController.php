<?php

namespace App\Http\Controllers;

use App\Http\Requests\InterviewRequest;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\OrderRequest;
use App\Mail\FormMail;
use App\Mail\MessageMail;
use App\Mail\OrderMail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index(){
        $groups = [
            'level' => Product::whereCategorySlug('level')->count(),
            'signal' => Product::whereCategorySlug('signal')->count(),
            'sensor' => Product::whereCategorySlug('sensor')->count(),
            'analyzer' => Product::whereCategorySlug('analyzer')->count(),
            'industrial' => Product::whereCategorySlug('industrial')->count(),
            'system' => Product::whereCategorySlug('system')->count()
        ];
        $product = DB::table('products')->inRandomOrder()->limit(1)->get();
        return view('shop', compact('groups', 'product'));
    }

    public function catalog(Request $request){
        $products = Product::paginate(3);
        if ($request->ajax()) {
            return view('page-parts.items', ['products' => $products])->render();
        }
        return view('catalog', compact('products'));
    }

    public function contact(){
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }

    public function singleCategory(Request $request, $slug)
    {
        $products = Product::whereCategorySlug($slug)->paginate(3);
        if ($request->ajax()) {
            return view('page-parts.items', ['products' => $products])->render();
        }
        return view('single-category',compact('products'));
    }

    public function getCategory(Request $request)
    {
        if($request->slug === 'all')
        {
            $products = Product::paginate(3);
            if($request->ajax())
            {
                return view('page-parts.items',['products' => $products], compact('products'))->render();
            }

        }
        else {
            $products = Product::whereCategorySlug($request->slug)->paginate(3);
            if($request->ajax())
            {
                return view('page-parts.items',['products' => $products], compact('products'))->render();
            }

        }
    }

    public function getProduct($slug) {
        $product = Product::whereSlug($slug)->firstOrFail();
        $products = Product::all()->chunk(3);
        return view('single', compact('product', 'products'));
    }

    public function sendOrder(OrderRequest $request)
    {
        Mail::to('kiplinetradecompany@gmail.com')->send(new OrderMail($request->name, $request->email, $request->phone, $request->company, $request->message));
        return response()->json(['success' => 'Ваше письмо было успешно отправлено'], Response::HTTP_OK);
    }

    public function sendInterview(InterviewRequest $request)
    {
        Mail::to('kiplinetradecompany@gmail.com')->send(new FormMail($request->name, $request->phone, $request->email, $request->company,$request->product,$request->count,$request->environment,$request->concentrate,$request->viscosity,$request->dielectricConstant,
            $request->granuleSize,$request->weightDensity,$request->unitType,$request->insideTemperature, $request->outsideTemperature, $request->atmosphere,$request->pressure,$request->secure,$request->capacityType,$request->height,
            $request->diameter,$request->minimal,$request->maximum,$request->pipeHeight,$request->wallOffset,$request->capacity,$request->electricRequirement, $request->outputSignalType,$request->fillType,$request->specialities));

        return response()->json(['success' => 'Анкета была успешно отправлена'], Response::HTTP_OK);
    }

    public function sendMessage(MessageRequest $request)
    {
        Mail::to('kiplinetradecompany@gmail.com')->send(new MessageMail($request->name, $request->email, $request->phone, $request->company, $request->message));
        return response()->json(['success' => 'Ваше письмо было успешно отправлено'], Response::HTTP_OK);
    }
}
