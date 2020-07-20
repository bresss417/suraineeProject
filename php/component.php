<?php

function component($b_name, $b_price, $b_photo, $productid){
    $element = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                <form action=\"index.php\" method=\"post\">
                    <div class=\"card shadow\">
                        <div>
                            <img src=\"img/$b_photo\" alt=\"Image1\" class=\"img-fluid card-img-top\" width=\"20%\">
                        </div>
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">$b_name</h5>
                            <h5><span class=\"price\">$b_price</span></h5>

                            <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">เพิ่มสินค้า <i class=\"fas fa-shopping-cart\"></i></button>
                            <a class=\"btn btn-warning my-3\" href=\"buy.php?id=$productid\"/>สั่งซื้อ <i class=\"fas fa-shopping-cart\"></i></a>
                             <input type='hidden' name='product_id' value='$productid'>
                        </div>
                    </div>
                </form>
    </div>
    ";
    echo $element;
}

function cartElement($b_photo, $b_name, $b_price, $productid){
    $element = "
    
    <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                    <div class=\"border rounded\">
                        <div class=\"row bg-white\">
                            <div class=\"col-md-3 pl-0\">
                                <img src=img/$b_photo alt=\"Image1\" class=\"img-fluid\">
                            </div>
                            <div class=\"col-md-6\">
                                <h5 class=\"pt-2\">$b_name</h5>
                                <h5 class=\"pt-2\">$$b_price</h5>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">ลบ</button>
                            </div>
                            <div class=\"col-md-3 py-5\">
                                <div>
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
                                    <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
    
    ";
    echo  $element;
}

















