<?php

function components($itemname, $itemnumber, $itemimage) {
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
                </div>
            </div>
        </form>
    </div>";
}

?>
<?php
function getData($conn){
    // SQL query
    $sql = "SELECT * FROM items;";
    $results = mysqli_query($conn, $sql);

    if(mysqli_num_rows($results) > 0){
        return $results;
    }
}
?>



