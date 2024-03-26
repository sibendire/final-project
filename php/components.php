<?php

function components($itemname, $itemnumber, $itemimage, $itemid) {
    echo "
    <div class=\"col-md-3 small-cd-6 my-3 my-md-3\">
        <form action=\"index.php\" method=\"post\">
            <div class=\"card shadow\">
                <div>
                    <img src=\"$itemimage\" alt=\"$itemname\" class=\"img-fluid card-img-top\">
                </div>
                <div class=\"card-body\">
                    <h5 class=\"item-title\">$itemname</h5>
                    <h6>
                        <i class=\"fas fa-star\"></i>
                    </h6>
                    <p class=\"card-text\">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, ipsa dolor cumque dolores dolorem, eos soluta tempore aut quod laboriosam praesentium deleniti magni fugiat rem! Aspernatur rerum a perferendis fugiat.
                    </p>
                    <small><s class=\"text-secondary\">$43</s></small>
                    <h5 class=\"number\">$itemnumber</h5>
                    <button type=\"submit\" name=\"add\">Add</button>
                    <input type='hidden' name='item_id' value='$itemid'>
                </div>
            </div>
        </form>
    </div>";
}

function cardcomponent($itemimage, $itemname, $itemnumber){
    $element = "
    <form action='card.php' method='get' class='cart-items'>
        <div class='border rounded'>
            <div class='row bg-white'>
                <div class='col-md-3 pl-0'>
                    <img src='$itemimage' alt='image1' class='img-fluid'>
                </div>
                <div class='col-md-6'>
                    <h5 class='pt-2'>$itemname</h5>
                    <small class='text-secondary'>Donor: Joshua</small>
                    <h5 class='pt-2'>$itemnumber</h5>
                    <button type='submit' class='btn btn-warning'>Save</button>
                    <button type='submit' class='btn btn-danger mx-2' name='remove'>Remove</button>
                </div>
                <div class='col-md-3 py-5'>
                    <div>
                        <button type='button' class='btn bg-light border rounded-circle'><i class='fas fa-minus'></i></button>
                        <input type='text' value='1' class='form-control w-25 d-inline'>
                        <button type='button' class='btn bg-light border rounded-circle'><i class='fas fa-plus'></i></button>
                    </div>
                </div>
            </div>
        </div>
    </form>";
    echo $element;
}

function getData($conn){
    // SQL query
    $sql = "SELECT * FROM items;";
    $results = mysqli_query($conn, $sql);

    if(mysqli_num_rows($results) > 0){
        return $results;
    }
}

?>
