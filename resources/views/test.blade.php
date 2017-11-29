<?php
/**
 * Created by PhpStorm.
 * User: b6299
 * Date: 2017/11/01
 * Time: 14:29
 */
Route::get("/",function(){
    $items = DB::select("SELECT * FROM items");
    return view("toppage",[
        "items" => $items
    ]);
});

Route::get("/detail/{item_id}",function($itemId){
    $items = DB::select("SELECT * FROM items where id = ?",[$itemId]);
    if(count($items)){
        return view("toppage",[
            "items" => $items[0]
        ]);
    }else {
        return abort(404);
    }
});
// [GET] /cart カートの表示
Route::get("/cart",function(){
    $cartItems = request()->session()->get("CART",[]);
    return view("cart",[
        "cartItems" => $cartItems
    ]);
});

// [POST] /cart/{item_id} カートの追加
Route::post("/cart/{item_id}",function($itemId){
    $items = DB::select("SELECT * FROM items where id = ?",[$itemId]);
    if(count($items)){
        $cartItems = request()->session()->get("CART");
        $cartItems[] = $items[0];
        request()->session()->put("CART",$cartItems);
        return redirect("/cart");
    }else{
        return abort(404);
    }
});
