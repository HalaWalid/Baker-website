<?
require_once('config.php');
?>

<div class="container-xxl bg-light my-6 py-6 pt-0">
        <div class="container">
            <div class="bg-primary text-light rounded-bottom p-5 my-6 mt-0 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <h1 class="display-4 text-light mb-0">The Best Bakery In Your City</h1>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="d-inline-flex align-items-center text-start">
                            <i class="fa fa-phone-alt fa-4x flex-shrink-0"></i>
                            <div class="ms-4">
                                <p class="fs-5 fw-bold mb-0">Call Us</p>
                                <p class="fs-1 fw-bold mb-0">+012 345 6789</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="text-primary text-uppercase mb-2">// Bakery Products</p>
                <h1 class="display-6 mb-4">Explore The Categories Of Our Bakery Products</h1>
            </div>
            <?php
                include('headMenu.php');
             ?>

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-3">
                        <?php
                            echo getAllItemsFromDB("select * from products where prodQty > 0");
                         ?>
                    </div>
                </div>
                <?php
                            echo getAllTabs();
                 ?>
                </div>
        </div>
    </div>
</div>
<!-- Products End -->
