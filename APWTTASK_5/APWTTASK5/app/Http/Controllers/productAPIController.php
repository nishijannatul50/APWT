<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class productAPIController extends Controller
{
    public function list(){

        $product = product::all();

        return $product;

    }

    public function create(Request $req){

        $pr = new product();

        $pr->ProductId = $req->ProductId;

        $pr->ProductName = $req->ProductName;

        $pr->ProductCode = $req->ProductCode;

        $pr->ProductDesc= $req->ProductDesc;

        $pr->Quantity= $req->Quantity;

        $pr->Category = $req->Category;

        $pr->Price = $req->Price;
        $pr->StockDate = $req->StockDate;
        $pr->Rating = $req->Rating;
        $pr-> PurchasedDate = $req-> PurchasedDate;
       
        if($pr->save()) return "Successful";

    }
}
