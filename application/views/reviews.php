

<div class="container mt-4">
    <div class="card">   
        <img src="<?php echo base_url('application/images/'.$review_item['ReviewImage2']);?>" alt="game-image" class="card-img-top img-fluid" style="width: 100%; height: 300px;">
        <div class="card-body" style="background: #f7f5f5; padding: 40px;">
            <h1 class="card-title" style="padding-bottom: 1em;"><?php echo $title?></h1>
            <p class="card-text" style="line-height: 27px;"><?php echo $review_item['GameReview']?></p>
        </div>
    </div>
</div>
    <div id="app">
        <div class="jumbotron mt-3" style="padding-top: 9em;">
            <h2>Comments</h2>
            <p>Add your comments here or make your own review...</p>
        </div>
            <div class="container mb-4">
                <div v-if="comments.length > 0" class="card">
                    <div v-for="user in comments" :key="user.UID">
                        <div class="card-body" style="border-top: .5px solid grey; margin: 0 10px">
                            <div class="col-md-10">
                                <strong class="text-primary">{{user.UserName}}</strong>
                                <p style="margin-top: 10px">{{user.UserComment}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="my-5">
                    <h4>There are currently no comments</h4>
                </div>
                <div v-if="<?php echo $userID ?>">
                    <div class="form-group">
                        <label for="userComment">Comment:</label>
                        <textarea class="form-control" name="userComment" id="userComment" rows="5" style="resize: none;" required></textarea>
                    </div>
                    
                    <button class="btn btn-success"  v-on:click="sendData('<?php echo $userID;?>','<?php echo $review_item["ID"];?>','<?php echo $userName;?>')">Send</button>
                </div>
                <div v-else class="my-3">
                    <span><a href="<?php echo base_url('login');?>">Sign in</a> to add your own review. Don't have an account? <a href="<?php echo base_url('register');?>">Register</a> now!</span>
                </div>
            </div>
    </div>
    <script src="<?php echo base_url('application/scripts/CustomVue.js');?>"></script>
</body>

</html>