<?php include("includes/header.php"); ?>

<section class="post_LatestStory">

    <div class="container login-form">

      <?php $msg= login();?>


        <form action="" method="post">
            <div class="login_title">
                <h2>সাইন ইন</h2>
            </div>
            <div class="login">
                    <p class='text-center' style="color: red;"><?php echo $msg; ?></p>
                <div class="field">
                    <input type="text" name="username" placeholder="ইউজারনেম..." class="">
                </div>

                <div class="field">
                    <input type="password" placeholder="পাসওয়ার্ড..." name="password" class="">
                </div>
                <div class="submit-btn">
                    <input type="submit" name="login" value="সাবমিট" class="">
                </div>

            </div>




        </form>
    </div>


    </div>
</section>
<?php include "includes/footer.php" ?>