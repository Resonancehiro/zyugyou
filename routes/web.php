<?php

Route::get("/",function(){
    return view("toppage");
});

Route::get("/deatail",function(){
    return view("/deatail");
});

Route::get("/cart",function(){
    return view("/cart");
});

//購入画面
Route::get("buy",function(){
    return view("buy");
});

//購入処理
Route::post("buy",function(){
    return redirect("last");
});

//購入後画面
Route::get("thanks",function(){
    return view("thanks");
});

//購入確認画面
Route::get("last",function(){
    return view("last");
});



Route::get("/detail/",function(){
    $name = request("name");
    return view("detail",[
        "name" => $name
    ]);
});

Route::get("/detail/{item_id}",function($item_id){
    return view("detail",[
        "item_id" => $item_id
    ]);
});

//サンプルデータを画面に出力する
Route::get("/",function(){
    $items = DB::select("SELECT * FROM items");
    return view("toppage",[
        "items" => $items
    ]);
});


Route::get("/detail/{item_id}",function($itemId){
    $items = DB::select("SELECT * FROM items where id = ?",[$itemId]);
    if(count($items)){
        return view("detail",[
            "item" => $items[0]
        ]);
    }else{
        return abort(404);
    }
});

// [POST] /cart/{item_id} カートの追加
Route::post("/cart/{item_id}",function($itemId){
    $items = DB::select("SELECT * FROM items where id = ?",[$itemId]);
    if(count($items)){
        $cartItems = [];
        $cartItems[] = $items[0];
        request()->session()->put("CART",$cartItems);
        return redirect("/cart");
    }else{
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

// [GET] /last カートの表示
Route::get("/last",function(){
    $cartItems = request()->session()->get("CART",[]);
    return view("last",[
        "cartItems" => $cartItems
    ]);
});

// [POST] /cart/{item_id}
Route::post("/cart/{item_id}",function($itemId){
    $items = DB::select("SELECT * FROM items where id = ?",[$itemId]);
    if(count($items)){
        $cartItems = request()->session()->get("CART",[]);
        $cartItems[] = $items[0];
        request()->session()->put("CART",$cartItems);
        return redirect("/cart");
    }else{
        return abort(404);
    }
});

// [POST] /cart/delete/{index} カートの個別削除
Route::get("/cart/d/{index}",function($index){
    request()->session()->forget("name");
    return redirect("/cart");
});


//購入処理
Route::post("buy",function(){

    $validator = Validator::make(request()->all(), [
        'name' => ['required'],
        'email' => ['required','email'],
        'number' => ['required','max:7'],
        'address' => ['required'],
        'tel' => ['required','max:9'],
    ])->validate();
    return redirect("last");
});

// [POST] /cart/{item_id} 購入時のカートの消去
Route::get("/cart/de",function(){
    request()->session()->forget("CART");
    return redirect("/thanks");
});

