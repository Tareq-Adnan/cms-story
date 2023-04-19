<?php
//select Category While Writing Story
function selectCat()
{
    global $connection;

    $query = "SELECT * FROM category";
    $run = mysqli_query($connection, $query);
    confirmation($run);
    while ($data = mysqli_fetch_assoc($run)) {

        echo "<option class='dropdown' value='" . "{$data['cat_id']}'>" . "{$data['cat_title']}" . "</option>";
    }

}

function pagination()
{
    global $connection;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = "";
    }

    if ($page == "" || $page == 1) {
        return $page_1 = 0;
    } else {
        return $page_1 = ($page * 6) - 6;
    }
}

function comment()
{
    global $connection;
    if (isset($_POST['comment_submit'])) {


        $comment = $_POST['comment'];
        $post_id = $_GET['view'];
        $comment_author = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
        $comment_user_id = $_SESSION['user_id'];

        $query = "INSERT INTO comments(comment_post_id,comment_user_id,comment_user_name,comment) Values ($post_id,'$comment_user_id','$comment_author','$comment')";
        $run = mysqli_query($connection, $query);
        confirmation($run);
    }
}

function notify()
{

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

    if (isset($_POST['addPost'])) {
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
    if (isset($_GET['p'])) {
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
        $username = trim($_POST['username']);
        $password = $_POST['password'];



        if (empty($username) && empty($password)) {
            return $msg = "ইউজারনেম বা পাসওয়ার্ড পাওয়া দিন!...";
        } else {

            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);

            if(!checkUsername($username)){
                return "ইউজারনেম পাওয়া যায়নি!";
            }

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

            if ($username === $uname && password_verify($password, $pass)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $uname;
                $_SESSION['password'] = $pass;
                $_SESSION['user_type'] = $uType;
                $_SESSION['first_name'] = $firstName;
                $_SESSION['last_name'] = $lastName;

                header("Location: index.php");
            } else {
               return "ইউজারনেম বা পাসওয়ার্ড সঠিক নয়!";
            }

        }
    }

}

//query Confirmation 
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
function updateProfile($user_id)
{
    global $connection;
    if (isset($_POST['updateProfile'])) {


        $username = $_POST['username'];
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($password)) {
            $query = "SELECT * FROM users WHERE user_id=$user_id";
            $e = mysqli_query($connection, $query);

            while ($data = mysqli_fetch_assoc($e)) {
                $password = $data['password'];
            }
        }

        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_temp, "./images/$image");


        if (empty($image)) {

            $query = "SELECT * FROM users WHERE user_id=$user_id";
            $e = mysqli_query($connection, $query);

            while ($data = mysqli_fetch_assoc($e)) {
                $image = $data['user_image'];
                $password = $data['password'];
            }
        }

        $query = "UPDATE users SET first_name='$firstName',last_name='$lastName',user_image='$image',user_email='$email',password='$password' WHERE user_id=$user_id";
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

//making post public after checking.
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

//reject User function 
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
//Approve User Registration function 
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

//Delete User profiles
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
    if ($_SESSION['username'] == null || !$_SESSION['user_type'] == 'admin') {
        header("Location: index.php");
    } else {
        if (isset($_GET['delete'])) {
            $id = $_GET['delete'];
            $query = "DELETE FROM posts WHERE post_id='{$id}'";
            $run = mysqli_query($connection, $query);
            confirmation($run);
        }
    }

}
function checkUsername($username)
{

    global $connection;

    $query = "SELECT username FROM users WHERE username='$username'";
    $run = mysqli_query($connection, $query);
    confirmation($run);
    if (mysqli_num_rows($run) > 0) {
        return true;
    } else {
        return false;
    }

}

function checkEmail($email)
{

    global $connection;

    $query = "SELECT user_email FROM users WHERE user_email='$email'";
    $run = mysqli_query($connection, $query);
    confirmation($run);
    if (mysqli_num_rows($run) > 0) {
        return true;
    } else {
        return false;
    }

}
//User Registration
function registration()
{
    global $connection;
    if (isset($_POST['registration'])) {
        $username = trim($_POST['username']);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];

        move_uploaded_file($image_temp, "./images/$image");

    if (checkUsername($username)) {
        return $message = 'username already exits!';

    } else if (checkEmail($email)) {
        return $message = 'already registered with this email!';
        ;

    } else if (strlen($username) < 4 || strlen($password) < 4) {
        return $message = "the input should be greater than 4 character!";}
        else{
            if (!empty($username) && !empty($password) && !empty($email)) {
                
                $query = "INSERT INTO users(username,user_type,user_email,user_image,first_name,last_name,password,date,status) VALUES('$username','user','$email','$image','$first_name','$last_name','$password',now(),'pending')";
                $run = mysqli_query($connection, $query);
                confirmation($run);
    
                return $message = "<p style='color:green;'>Regsitration Successful!</p>";
            } else {
                return $message = "<p style='color: red;'>Field can't be empty!</p>";
            }
        }

      


      


    }
}

// Program to display current page URL.
function share()
{
    $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']
        === 'on' ? "https" : "http") .
        "://" . $_SERVER['HTTP_HOST'] .
        $_SERVER['REQUEST_URI'];
    return $link;
}



?>