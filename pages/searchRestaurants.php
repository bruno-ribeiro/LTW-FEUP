<?php
session_start();
?>
    <!DOCTYPE html>
    <?php

    include_once "header.php";
    include_once "../dbActions/restaurantUtils.php";
    include_once "../dbActions/reviewsUtils.php";
    $name = "";
    $service = "";
    $priceMin = 0;
    $priceMax = 100000;
    $rating = "";
    $category = "";
    $location = "";
    if (preg_match("/[a-z A-Z]/", $_GET['service'])) {
        $service = $_GET['service'];
    }
    if (preg_match("/[a-z A-Z]/", $_GET['category'])) {
        $service = $_GET['service'];
    }
    if (preg_match("/[a-zA-Z]/", $_GET['restaurant'])) {
        $name = $_GET['restaurant'];
    }
    if (preg_match("/[a-zA-Z]/", $_GET['location'])) {
        $location = $_GET['location'];
    }
    if (preg_match("/[a-zA-Z0-9]/", $_GET['priceMin'])) {
        $priceMin = $_GET['priceMin'];
    }
    if (preg_match("/[a-zA-Z0-9]/", $_GET['priceMax'])) {
        $priceMax = $_GET['priceMax'];
    }
    if (preg_match("/[a-zA-Z0-9]/", $_GET['rating'])) {
        $rating = $_GET['rating'];
    }


    ?>
    <div class="searchBarContainer">
        <?php
        include "../dbActions/searchBar.php";
        ?>
    </div>
    <div class="restaurantSearchPage">
        <div class="advancedSearch">
            <div class="container">
                <section>
                    <h2>Services</h2>
                    <form action="get">
                        <input type="checkbox" name="vehicle" value="Bike">I have a bike<br>
                        <input type="checkbox" name="vehicle" value="Car">I have a car
                    </form>
                    <?php
                        echo "<a onclick=\"location.href='searchRestaurants.php?id=$id&name=$name&priceMin=$priceMin&priceMax=$priceMax&rating=$rating&category=$category&location=&location';\">SDad</a>";
                    ?>
                    </section>
            </div>
        </div>
        <div class="main">
            <?php
            $result = getRestaurant($name, $service, $priceMin, $priceMax, $rating, $category, $location);
            foreach ($result as $row) {
                echo "<div class=\"container\">";
                $restaurantName = $row['name'];
                $id = getIdRestaurantByName($restaurantName);
                echo "<h1 onclick=\"location.href='restaurant.php?id=$id';\">" . $restaurantName . "</h1>";
                echo "</div>";
            }
            ?>

        </div>
    </div>


<?php
include_once "footer.php";
?>