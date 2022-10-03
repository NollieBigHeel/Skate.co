<?php include 'inc/header.php'; ?>


   <header class="container-head">
    <article class="title">   
    <h1>Welcome to Skate.co</h1>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
    </article> 
   </header>

   <article class="container-services">
        <h2>Our services</h2>
        <section class="service-list">
        <ul>
            <li>
                <h3>Skate School</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </li>
            <li>
                <h3>Skate School</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </li>
            <li>
                <h3>Skate School</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
            </li>
        </ul>
        </section>
   </article>

   <article class="container-whyus">
     <img src="img/skateboard1.jpg" alt="skateboard trick">
    <div class="whyus">
        <h2>Why choose us</h2>
        <p>We host some of the best services in the are. We host some of the best services in the are.We host some of the best services in the are.We host some of the best services in the are.We host some of the best services in the are.We host some of the best services in the are.</p>
            
            
    </div>



   </article>
   
  
   <?php
  $name = $email = $body = '';
  $nameErr = $emailErr = $bodyErr = '';

  // Form submit
  if(isset($_POST['submit']))
  // Validate Name
    if(empty($_POST['name'])) {
      $nameErr = 'Name is required';
    } else {
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

      // Validate email
      if(empty($_POST['email'])) {
        $emailErr = 'Email is required';
      } else {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      }

        // Validate body
    if(empty($_POST['body'])) {
      $bodyErr = 'Feedback is required';
    } else {
      $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
      
      // Add to database
      $sql = "INSERT INTO feedback (name, email, body) VALUES ('$name', '$email', '$body')";

      if(mysqli_query($conn, $sql)) {
        // Success
        header('Location: feedbackSub.php');
      } else {
        echo 'Error: ' . mysqli_error($conn);
      }
    }

   
?>
  <div class="container-form">
    <h2>Feedback</h2>
    <p >Leave feedback for us</p>
    
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="mt-4 w-75">
      <div class="enter" >
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo $nameErr ? 'is-invalid': null; ?>" id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback">
          <?php echo $nameErr; ?>
        </div>
      </div>
      <div class="enter">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo $emailErr ? 'is-invalid': null; ?>" id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback">
        <?php echo $emailErr; ?>
        </div>
      </div>
      <div class="enter">
        <label for="body" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo $bodyErr ? 'is-invalid': null; ?>" id="body" name="body" placeholder="Enter your feedback"></textarea>
        <div class="invalid-feedback">
        <?php echo $bodyErr; ?>
        </div>
      </div>
      <div>
        <input type="submit" name="submit" value="Send" >
      </div>
    </form>
 
    </div>
   




</main>


</body>
</html>