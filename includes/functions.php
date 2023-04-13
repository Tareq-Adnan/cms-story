<?php

function notify(){

    if (isset($_GET['successUpdate']) || isset($_GET['successDelete']) || isset($_POST['addPost'])) { ?>
      <script>
        swal({
          title: "পরিবর্তন সংরক্ষিত",
          text: "আপনার পরিবর্তন সংরক্ষণ করা হয়েছে?",
          icon: "success",
          button: "ঠিক আছে",
        });
      </script>
    <?php }

    if(isset($_POST['addPost'])){
        ?>
        <script>
          swal({
            title: "গল্পটি সংরক্ষিত হয়েছে",
            text: "আপনার গল্পটি অনুমোদন এর অপেক্ষায়!",
            icon: "success",
            button: "ঠিক আছে",
          });
        </script>
      <?php }
      if(isset($_GET['p'])){
        ?>
        <script>
          swal({
            title: "অনুমোদন হয়েছে",
            text: "গল্পটি প্রকাশের অনুমোদন দেওয়া হয়েছে!",
            icon: "success",
            button: "ঠিক আছে",
          });
        </script>
      <?php }

}
function login()
{
    global $connection;
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];



        if (empty($username) && empty($password)) {
            return $msg = "ইউজারনেম বা পাসওয়ার্ড পাওয়া দিন!...";
        } else {

            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);

            $query = "SELECT * FROM users WHERE username='{$username}'";
            $run = mysqli_query($connection, $query);
            confirmation($run);

            while ($data = mysqli_fetch_array($run)) {

                $id = $data['user_id'];
                $uname = $data['username'];
                $pass = $data['password'];
                $uType = $data['user_type'];
                $firstName = $data['first_name'];
                $lastName = $data['last_name'];

            }

            if ($username === $uname && $password === $pass) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $uname;
                $_SESSION['password'] = $pass;
                $_SESSION['user_type'] = $uType;
                $_SESSION['first_name'] = $firstName;
                $_SESSION['last_name'] = $lastName;

                header("Location: index.php");
            } else {
                header("Location: index.php");
            }

        }
    }

}

function confirmation($up)
{
    global $connection;
    if (!$up) {
        die("failed!" . mysqli_error($connection));
    }
}


function EditPost($post_id)
{
    global $connection;
    if (isset($_POST['editPost'])) {


        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $tag = $_POST['tag'];
        $category = $_POST['category'];
        $content = mysqli_real_escape_string($connection, $content);

        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_temp, "./images/$image");


        if (empty($image)) {

            $query = "SELECT * FROM posts WHERE post_id=$post_id";
            $e = mysqli_query($connection, $query);

            while ($data = mysqli_fetch_assoc($e)) {
                $image = $data['post_image'];
            }
        }

        $query = "UPDATE posts SET post_tags='$tag',post_category_id='$category',post_title='$title',post_author='$author',post_date=now(),post_image='$image',post_content='$content' WHERE post_id=$post_id";
        $run = mysqli_query($connection, $query);
        confirmation($run);

        header("Location: profile.php?successUpdate");


    }
    
}
function addPost()
{
    global $connection;
    if (isset($_POST['addPost'])) {

        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $tag = $_POST['tag'];
        $category = $_POST['category'];

        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_temp, "./images/$image");
        $content = mysqli_real_escape_string($connection, $content);

        $query = "INSERT INTO posts(post_category_id,post_title,post_content,post_author,post_date,post_image,post_status,post_tags,post_user_id) VALUES($category,'$title','$content','$author',now(),'$image','pending','$tag','{$_SESSION['user_id']}')";
        $run = mysqli_query($connection, $query);
        confirmation($run);


    }
}



function publish()
{
    global $connection;
    if (isset($_GET['publish'])) {
        $id = $_GET['publish'];

        $query = "UPDATE posts SET post_status='published' WHERE post_id='{$id}'";
        $run = mysqli_query($connection, $query);
        confirmation($run);
    }
}
function reject()
{
    global $connection;
    if (isset($_GET['reject'])) {
        $id = $_GET['reject'];

        $query = "UPDATE users SET status='rejected' WHERE user_id='{$id}'";
        $run = mysqli_query($connection, $query);
        confirmation($run);
    }
}
function accept()
{
    global $connection;
    if (isset($_GET['accept'])) {
        $id = $_GET['accept'];

        $query = "UPDATE users SET status='active' WHERE user_id='{$id}'";
        $run = mysqli_query($connection, $query);
        confirmation($run);
    }
}
function delete()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id='{$id}'";
        $run = mysqli_query($connection, $query);
        confirmation($run);
    }
}
function deletePost()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query = "DELETE FROM posts WHERE post_id='{$id}'";
        $run = mysqli_query($connection, $query);
        confirmation($run);
    }
}


function registration()
{
    global $connection;
    if (isset($_POST['registration'])) {
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_temp, "./images/$image");


        $query = "INSERT INTO users(username,user_type,user_email,user_image,first_name,last_name,password,date,status) VALUES('$username','user','$email','$image','$first_name','$last_name','$password',now(),'pending')";
        $run = mysqli_query($connection, $query);
        confirmation($run);


    }
}

?>