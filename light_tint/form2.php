<?php
    include("top.php");
    include("header.php");

// define variables and set to empty values
 $emailErr = "";
 $email = $comments = "";

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


if (empty($_POST["comments"])) {
   $comments = "";
 } else {
   $comments = test_input($_POST["comments"]);
 }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
<body>
  <div class ="container-fluid p-0 bg-light" id="top" >
    <div class = "site-content2">
      <div class="section-5 text-left">
        <h1 class= "heading-1 text-left text-black m-3">We Care</h1>
        <h1 class="heading-2 text-left text-black m-3">About Your Thoughts!</h1>
        <p>
          <span class="error text-black m-3">* required field</span>
        </p>
        <div class="form-inline justify-content-left p-3">

          <form method="post" action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">




            <input type="text" class="form-control px-4 py-2" placeholder="Email" name="email" size="34" value="<?php echo $email;?>">
            <span class="error">* <?php echo $emailErr;?></span>
            <br><br>


            <div class="purple-border">
              <textarea placeholder="   Comments" name="comments" rows="5" cols="40"><?php echo $comments;?></textarea>
            </div>
            <br><br>





            <input type="submit" id="sub_button" name="submit" value="Submit" class="btn btn-danger px-4 py-2">
          </form>


        </div>
      </div>

    </div>
  </div>


<?php


echo $email;
echo "<br>";
echo $comments;
echo "<br>";
include("footer.php");
?>
