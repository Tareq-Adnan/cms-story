<?php include 'includes/header.php';
deletePost();
notify(); ?>
<!doctype html>
<html>
<?Php

if (isset($_GET['user'])) {
  $id = $_GET['user'];

  $query = "SELECT * FROM posts WHERE post_user_id=$id AND post_status='published'";
  $run = mysqli_query($connection, $query);
  $query2 = "SELECT * FROM posts WHERE post_user_id=$id";
  $run2 = mysqli_query($connection, $query2);
  confirmation($run);
  $num = mysqli_num_rows($run);
  $num2 = mysqli_num_rows($run2);

} else {
  $query = "SELECT * FROM posts WHERE post_user_id='{$_SESSION['user_id']}' AND post_status='published'";
  $run = mysqli_query($connection, $query);
  $query2 = "SELECT * FROM posts WHERE post_user_id='{$_SESSION['user_id']}'";
  $run2 = mysqli_query($connection, $query2);
  confirmation($run);
  $num = mysqli_num_rows($run);
  $num2 = mysqli_num_rows($run2);
}




?>




<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>Snippet - BBBootstrap</title>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
  <link href='#' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <style>
    ::-webkit-scrollbar {
      width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    .profile-head {
      transform: translateY(5rem)
    }

    .cover {
      background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
      background-size: cover;
      background-repeat: no-repeat
    }

    body {


      min-height: 100vh;
      overflow-x: hidden;
    }
  </style>
</head>

<body>
  <div class="">
    <div class="col-md-10 mx-auto"> <!-- Profile widget -->

      <div class="shadow rounded overflow-hidden">
        <div class="px-4 pt-0 pb-4 cover">
          <div class="media align-items-end profile-head">
            <?php

            if(isset($_GET['user'])){
              $query = "SELECT * FROM users WHERE user_id='{$_GET['user']}'";
            }else{
              $query = "SELECT * FROM users WHERE user_id='{$_SESSION['user_id']}'";
            }

           
            $run3 = mysqli_query($connection, $query);
            confirmation($run3);
            while ($data2 = mysqli_fetch_assoc($run3)) {
              $username = $data2['username'];
              $firstName = $data2['first_name'];
              $lastName = $data2['last_name'];
              $image = $data2['user_image'];
              $email = $data2['user_email'];
              $userType = $data2['user_type'];
            }

            ?>
            <div class="profile mr-3">
              <img src="images/<?php echo $image ?>" alt="..." width="130" class="rounded mb-2 img-thumbnail"><a
                href="edit_profile.php?editProfile=<?php echo $_SESSION['user_id'] ?>"
                class="btn btn-outline-dark btn-sm btn-block">Edit profile</a>
            </div>
            <div class="media-body mb-5 text-white">
              <h4 class="mt-0 mb-0">
                <?php echo $firstName . " " . $lastName ?>
              </h4>
              <p class="small mb-4">Rank:
                <?php echo $userType ?>
              </p>
            </div>
          </div>
        </div>
        <div class=" p-4 d-flex justify-content-end text-center">
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <h5 class="font-weight-bold mb-0 d-block">
                <?php echo $num2 ?>
              </h5><small class="text-muted"> <i class="fas fa-image mr-1"></i>Total Post</small>
            </li>
            <li class="list-inline-item">
              <h5 class="font-weight-bold mb-0 d-block">
                <?php echo $num ?>
              </h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Approved</small>
            </li>
            <li class="list-inline-item">

              <h5 class="font-weight-bold mb-0 d-block">
                <?php

                echo $num2 - $num
                  ?>
              </h5><small class="text-muted"> <i class="fas fa-user mr-1"></i>Pending</small>
            </li>
          </ul>
        </div>
        <div class="px-4 py-3">
          <h5 class="mb-0 py-2 px-2">অনুমোদিত গল্পসমূহ</h5>
          <div class="p-4 rounded shadow-sm ">

            <table class="table table-bordered table-hover text-center">
              <thead>
                <tr>
                  <th>গল্পের নাম</th>
                  <th>লেখকের নাম</th>
                  <th>গল্পের কিছু অংশ</th>
                  <th>ছবি</th>
                  <th>পরিবর্তন/পরিবর্ধন</th>
                </tr>
              </thead>
              <tbody>
                <?php

                while ($data = mysqli_fetch_assoc($run)) {
                  $post_id = $data['post_id'];
                  $title = $data['post_title'];
                  $author = $data['post_author'];
                  $content = $data['post_content'];
                  $postimage = $data['post_image']; ?>

                  <tr class="my-auto">
                    <td>
                      <?php echo $title ?>
                    </td>
                    <td>
                      <?php echo $author ?>
                    </td>
                    <td>
                      <?php echo substr($content, 0, 100) ?>
                    </td>
                    <td><img class="img-fluid" style="width:20vh" src="images/<?php echo $postimage ?>" alt=""></td>
                    <td><a class="btn btn-primary" href="edit-post.php?edit=<?php echo $post_id ?>">Edit</a> <a
                        class="btn btn-primary" href="profile.php?delete=<?php echo $post_id ?>&successDelete">Delete</a>
                    </td>
                  <?php } ?>


                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <script type='text/javascript'
          src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src='#'></script>
        <script type='text/javascript' src='#'></script>
        <script type='text/javascript' src='#'></script>
        <script type='text/javascript'></script>
        <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
          myLink.addEventListener('click', function (e) {
            e.preventDefault();
          });</script>

        <?php include "includes/footer.php" ?>

</body>

</html>