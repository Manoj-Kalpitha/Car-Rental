    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-6">
                <img src="./Assest/img/<?php echo $image ?>" class="rounded-start " alt="...">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $carName ?></h3>
                    <h3 class="card-title"><?php echo $year ?></h3>
                    <span class="badge text-bg-primary">Year - <?php echo $year ?></span>
                    <span class="badge text-bg-secondary">Registration No - <?php echo $regNo ?></span>
                    <span class="badge text-bg-success">Category - <?php echo $category ?></span>
                    <span class="badge text-bg-danger">Seat Capacity - <?php echo $seatCapacity ?></span>
                    <span class="badge text-bg-warning">Fuel Type - <?php echo $fuelType ?></span>
                    <span class="badge text-bg-info"><?php echo $availability ?></span> <br>
                    <button class="btn btn-outline-primary  mt-3">Reserve Now</button>
                </div>
            </div>
        </div>
    </div>