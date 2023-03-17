<?php
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Products;
use App\Models\PromoModel;
use App\Models\UsedPromo;
use App\Models\Category;
use App\Models\IP;
// global CDN link helper function




function ipcount()
{
    $country = IP::count();
    
    $webcount = (55000 + $country);
    
    return  $webcount;
}
function cdn( $asset ){

    // Verify if KeyCDN URLs are present in the config file
    if( !Config::get('app.cdn') )
        return asset( $asset );

    // Get file name incl extension and CDN URLs
    $cdns = Config::get('app.cdn');

    $assetName = basename( $asset );
    
    // Remove query string
    $assetName = explode("?", $assetName);
    $assetName = $assetName[0];

    // Select the CDN URL based on the extension
    foreach( $cdns as $cdn => $types ) {
        if( preg_match('/^.*\.(' . $types . ')$/i', $assetName) )
            return cdnPath($cdn, $asset);
    }

    // In case of no match use the last in the array
    end($cdns);
    return cdnPath( key( $cdns ) , $asset);

}

function cdnPath($cdn, $asset) {
    return  "//" . rtrim($cdn, "/") . "/" . ltrim( $asset, "/");
}

function getGst($totalprice)
{

    $percentage = config('makhazan.gst');
    $totalWidth = $totalprice;
    $totalAmount = ($percentage / 100) * $totalWidth;
    return number_format($totalAmount);
}

function getCountryName($id){
    $country = Country::where('id', $id)->first();
    if($country != null){
        return $country['name'];
    }
}

function getStateName($id){
    $country = State::where('id', $id)->first();
    if($country != null){
        return $country['name'];
    }
}

function getCityName($id){
    $country = City::where('id', $id)->first();
    if($country != null){
        return $country['name'];
    }
}

function stockDecrement($cartData, $productData){
    Products::where('id', $productData['id'])->decrement('total_stock', $cartData['quantity']);
}

function addPromoUser($promo_id){
    PromoModel::where('id', $promo_id)->increment('used_count', 1);
}
function subCategory($id)
{
    return Category::where('parent_id',$id)->get();
}
function attribute_value($id)
{
    return DB::table('attribute_value')->where('attribute_id',$id)->get();
}
?>