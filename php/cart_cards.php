<?php

function get_cards_cart($name, $price, $size, $proimage, $product_ID, $product_quantity=1){
    $item = '
    <div class="containerItemsCart">
        <div class="card">
            <img src="'.$proimage.'" alt="Items" class="item" color="black">
        </div>
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
                    <div class="price">
                        <i class="fas fa-nis-sign"></i>
                        <h3 id="price_id">$'.$price.'</h3>
                    </div>
                </div>
            </div>
        
        <div class="controls">
            <form action="../html/cart.php?action=remove&id='.$product_ID.'" method="post">
                <button class="bt1" name="remove">Remove</button>
                <input type="hidden" name="Item_ID" value="'.$product_ID.'">
            </form>
            <form action="../html/cart.php" method="post">
                <button  class="bt" name="increase_quantity">&#9650;</button>
                <span>Quantity: '.$product_quantity.'</span>
                <input type="hidden" name="product_quantity" value="'.$product_ID.'">
                <button class="bt" name="dicrease_quantity">&#9660;</button>
            </form>
        </div>
        </form>
    </div>
    ';
    echo $item;
}

?>