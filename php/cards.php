<?php
    function component($name, $price, $size, $proimage, $product_ID,  $product_Total_quantity){
        $item = '
            <div class="containerItems">
                <div class="card">
                        <img src="'.$proimage.'" alt="Items" class="item" color="black">
                    </div>
                    <form action="cart.php" method="post">
                    <div class="info">
                        <div class="itemName">
                            <h1 id="name_id" class="big" color="white">'.$name.'</h1>
                            <span class="new">new</span>
                        </div>
                        <div class="size-container">
                            <h3 class="title" color="white">size</h3>
                            <dev class="sizes">
                                <span class="size" color="white">'.$size.'</span>
                            </dev>
                        </div>
                        <div class="buy-price">
                            <button name="Add_To_Cart" class="buy"><i class=" fas fa-shopping-cart"></i>Add to card</button>
                            <input type="hidden" name="Item_ID" value="'.$product_ID.'">
                            <input type="hidden" name="product_Total_quantity" value="'.$product_Total_quantity.'">
                            <div class="price">
                                <i class="fas fa-nis-sign"></i>
                                <h3 id="price_id">$'.$price.'</h3>
                            </div>
                        </div>
                        </div>
                        </form>
                    </div>
        ';
        echo $item;
    }

?>