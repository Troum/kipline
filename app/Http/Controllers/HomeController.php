<?php

namespace App\Http\Controllers;

use App\Booklets;
use App\Documents;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductPhotos;
use ElForastero\Transliterate\TransliterationFacade;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function dash($string)
    {
        return str_replace(' ','_', TransliterationFacade::make($string));
    }

    public function index(Request $request)
    {
        $products = Product::paginate(5);
        if ($request->ajax()) {
            return view('page-parts.table',['products' => $products])->render();
        }
        return view('home', compact('products'));
    }

    public function addProduct(ProductRequest $request)
    {
        if(Product::create([
            'name' => $request->product,
            'description' => $request->description,
            'use' => $request->use,
            'characteristics' => $request->characteristics,
            'cover' => $this->dash($request->file('cover')->getClientOriginalName()),
            'category' => $request->category,
            'category_slug' => $request->categorySlug
        ]))
        {
            $product = DB::table('products')->latest()->limit(1)->first();
            foreach($request->file('photos') as $photo)
            {
                ProductPhotos::create([
                    'product_id' => $product->id,
                    'product_photo' => $this->dash($photo->getClientOriginalName())
                ]);

                $photo->move('images/related/'.$product->slug, $this->dash($photo->getClientOriginalName()));
                $img = Image::make(File::get(public_path('images/related/'.$product->slug.'/'.$this->dash($photo->getClientOriginalName()))));
                $img->resize(500,500);
                $img->save(public_path('images/related/'.$product->slug.'/'.$this->dash($photo->getClientOriginalName())));

            }

            if(!empty($request->file('booklets')))
            {
                foreach($request->file('booklets') as $booklet)
                {
                    Booklets::create([
                        'product_id' => $product->id,
                        'product_booklet' => $this->dash($booklet->getClientOriginalName())
                    ]);

                    $booklet->move('booklets/'.$product->slug, $this->dash($booklet->getClientOriginalName()));
                }
            }

            if(!empty($request->file('documents')))
            {
                foreach($request->file('documents') as $document)
                {
                    Documents::create([
                        'product_id' => $product->id,
                        'product_document' => $this->dash($document->getClientOriginalName())
                    ]);

                    $document->move('documents/'.$product->slug, $this->dash($document->getClientOriginalName()));

                }
            }


            $request->file('cover')->move('images/cover/'.$product->slug, $this->dash($request->file('cover')->getClientOriginalName()));

            $img = Image::make(File::get(public_path('images/cover/'.$product->slug.'/'.$this->dash($request->file('cover')->getClientOriginalName()))));
            $img->resize(500,500);
            $img->save(public_path('images/cover/'.$product->slug.'/'.$this->dash($request->file('cover')->getClientOriginalName())));

            return response()->json(['success' => 'Продукт был успешно добавлен'], Response::HTTP_OK);
        }

        return response()->json(['error' => 'Произошла непредвиденная ошибка'], Response::HTTP_UNPROCESSABLE_ENTITY);

    }

    public function refreshTable(Request $request)
    {
        $products = Product::paginate(5);
        if ($request->ajax()) {
            return view('page-parts.table', ['products' => $products])->render();
        }
        return view('home', compact('products'));
    }

    public function editProduct(Request $request)
    {
        $product = Product::whereId($request->id)->firstOrFail();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->characteristics = $request->characteristics;
        $product->use = $request->use;
        if($product->save())
        {
            return response()->json(['success' => 'Продукт был успешно отредактирован'], Response::HTTP_OK);
        }

        return response()->json(['error' => 'Произошла непредвиденная ошибка'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::whereId($request->id)->firstOrFail();
        $photos = ProductPhotos::whereProductId($product->id)->get();
        $documents = Documents::whereProductId($product->id)->get();
        $booklets = Booklets::whereProductId($product->id)->get();

        if(!empty($photos))
        {
            foreach ($photos as $photo) {
                File::delete(public_path().'/images/related/'.$product->slug.'/'.$photo->product_photo);
                $photo->delete();
            }
            File::deleteDirectory(public_path().'/images/related/'.$product->slug);
        }

        if(!empty($documents))
        {
            foreach ($documents as $document) {
                File::delete(public_path().'/documents/'.$product->slug.'/'.$document->product_document);
                $document->delete();
            }

            File::deleteDirectory(public_path('/documents/'.$product->slug));

        }

        if(!empty($booklets))
        {
            foreach ($booklets as $booklet) {
                File::delete(public_path().'/booklets/'.$product->slug.'/'.$booklet->product_booklet);
                $booklet->delete();
            }
            File::deleteDirectory(public_path('/booklets/'.$product->slug));
        }

        File::delete(public_path().'/images/cover/'.$product->slug.'/'.$product->cover);
        File::deleteDirectory(public_path('/images/cover/'.$product->slug));

        $product->delete();
        return response()->json(['success' => 'Продукт успешно удален'], Response::HTTP_OK);
    }
}
