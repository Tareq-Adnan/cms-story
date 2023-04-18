<div class="container">

    <?php
    if ($_SESSION['username'] == NULL) {

    } else { ?>

        <div class="comment_box">


            <form action="" method="post">
                <textarea class="form-control" name="comment" placeholder="আপনার মন্তব্য এখানে লিখুন..."
                    required></textarea>
                <input class="btn btn-primary my-2" type="submit" name="comment_submit" value="Post Comment">
            </form>
        </div>

    <?php }

    ?>


    <div class="comment_view my-2">
        <?php
        $id = $_GET['view'];
        $query = "SELECT * FROM comments WHERE comment_post_id=$id";
        $run = mysqli_query($connection, $query);
        confirmation($run);

        while ($data = mysqli_fetch_assoc($run)) {
            $name = $data['comment_user_name'];
            $comment = $data['comment'];
            $date = $data['date'];
            ?>


            <div class="card p-3  mb-2">

                <div class="d-flex justify-content-between align-items-center">

                    <div class="user d-flex flex-row align-items-center">

                        <div class="user-img rounded-circle mr-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                            </svg>
                        </div>

                        <div class="font-weight-bold text-primary mx-2">
                            <?php echo $name ?>
                        </div>
                        <small class="font-weight-regular">
                            <?php echo $comment ?>
                        </small>

                    </div>


                    <small>
                        <?php
                        echo $date
                            ?>
                    </small>

                </div>


            </div>
        <?php } ?>
    </div>

</div>