<?php
    include("top.php");
    include("header.php");
?>
<main>
<?php
// define variables and set to empty values
 $emailErr = $genderErr = "";
 $email = $comment = $gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  }
  else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }


if (empty($_POST["comment"])) {
   $comment = "";
 } else {
   $comment = test_input($_POST["comment"]);
 }

 if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}








?>
<div class="section-2 bg-light" id="process">
  <div class="container">
<div class="section-5 text-left">
  <h1 class= "heading-1 text-left">We Care</h1>
  <h1 class="heading-2 text-left">About Your Thoughts!</h1>
  <p>
    <span class="error">* required field</span>
  </p>
  <div class="form-inline justify-content-left">

    <form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">




    <input type="text" class="form-control px-4 py-2" placeholder="Email" name="email" size="34" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>


    <div class="purple-border">
    <textarea placeholder="   Comments" name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    </div>
    <br><br>





    <input type="submit" id="sub_button" name="submit" value="Submit" class="btn btn-danger px-4 py-2">
</form>


</div>
</div>

</div>
</div>

<main>

<?php

echo $email;
echo "<br>";
include("footer.php");
?>
