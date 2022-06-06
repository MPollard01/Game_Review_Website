
<div class="container mt-4 mb-4">
    <div class="row">
        <?php

        if($result) {
        foreach ($result as $review_item)
        {
            $image = $review_item->ReviewImage;
            $blurb = $review_item->GameBlurb;

            echo "<div class='col-md-4 mb-4'>
              <div class='card' style='background: #dbd7d7; padding: 10px; height: 100%'>
                <img src='".base_url('application/images/'.$image)."' alt='game-image' class='card-img-top img-fluid' style='width: 100%; height: 300px;'>
                <div class='card-body pb-5' style='background: #f7f5f5; padding: 10px; position: relative'>
                  <h4 class='card-title'>".$review_item->GameName."</h4>
                  <p class='card-text'>".(strlen($blurb) > 250 ? substr($blurb, 0, 250)."..." : $blurb)."</p>
                  <a href='".base_url('reviews/'.$review_item->slug)."' class='btn btn-info' style='position: absolute; bottom: 10'>Read More</a>
                </div>
              </div>
            </div>"; 
        }
    }
        ?>
    </div>
</div> 
 
</body>
