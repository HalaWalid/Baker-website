
<link rel="stylesheet" href="myStlye.css">
<div class="container text-center">
    <ul class="nav nav-pills justify-content-center bg-dark text-uppercase border-inner p-2 mb-5">
        <?php
        $conn = mysqli_connect("localhost","root","","baker");
        $results = mysqli_query($conn,"select CatName from categories");
        $items = "<li class=\"nav-item\"><a class=\"nav-link text-white active\" data-bs-toggle=\"pill\" href=\"#tab-1\">All Items</a></li>";
        $counter= 2;
        while($row = mysqli_fetch_array($results)){
            $items .= <<<DELIMETER
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-$counter">$row[0]</a>
            </li>
            DELIMETER;
            $counter++;
        }
        echo $items;
        ?>
    </ul>
</div>
