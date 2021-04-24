<?php
    function component($name, $price, $size, $proimage){
        $item = '
            <div class="containerItems">
            <div class="card">
                    <img src="'.$proimage.'" alt="Items" class="item" color="black">
                </div>
                <div class="info">
                    <div class="itemName">
                        <h1 class="big" color="white">'.$name.'</h1>
                        <span class="new">new</span>
                    </div>
                    <div class="size-container">
                        <h3 class="title" color="white">size</h3>
                        <dev class="sizes">
                            <span class="size" color="white">'.$size.'</span>
                        </dev>
                    </div>
                    <div class="buy-price">
                        <a href="#" class="buy"><i class=" fas fa-shopping-cart"></i>Add to card</a>
                        <div class="price">
                            <i class="fas fa-nis-sign"></i>
                            <h3>$'.$price.'</h3>
                        </div>
                    </div>
                </div>
        </div>
        ';
        echo $item;
    }

?>