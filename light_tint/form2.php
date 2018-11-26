<?php
    include("top.php");
    include("header.php");

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

<div class="section-5 text-center">
  <h4 style="margin-top:5%;"> Join Our Email List...</h4>
  <h4 class="my-4">If You Want To</h4>
  <p>
    <span class="error">* required field</span>
  </p>
  <div class="form-inline justify-content-center">

    <form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">




    <input type="text" class="form-control px-4 py-2" placeholder="Email" name="email" size="40" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>

    Gender:



    <div class="btn-group btn-group-toggle" data-toggle="buttons">
      <label class="btn btn-secondary active">
      <input id="option1" autocomplete="off" type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
      </label>
      <label class="btn btn-secondary active">
      <input id="option2" autocomplete="off" type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
      </label>
      <label class="btn btn-secondary active">
      <input id="option3" autocomplete="off" type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
      </label>
      <span class="error">* <?php echo $genderErr;?></span>
      <br><br>
    </div>
    <br><br>

    <div class="form-group purple-border">
    Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    </div>
    <br><br>





    <input type="submit" id="sub_button" name="submit" value="Submit" class="btn btn-danger px-4 py-2">
</form>


</div>
</div>

<?php
echo $email;
echo "<br>";
?>
