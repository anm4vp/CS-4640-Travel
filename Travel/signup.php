<!DOCTYPE HTML>

<html>
<head>
  <title>Map</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body>

  <?php

  alert("Congrats you have successfully signed up");

  function alert($msg){

    echo "<script type='text/javascript'>alert('$msg')</script>";
  }
  ?>

  <!-- Header -->
  <nav class="nav">
    <ul>
      <li><a class="active" href="index.html">Travel Website</a></li>
      <li style="float:right"><a href="#" class="icon fa-user-circle"> Logout</a></li>
      <div class="search">
        <li style="float:right">
          <span class="fa fa-search"></span>
          <input type="text" placeholder="Search...">
        </li>
      </div>
    </ul>
  </nav>

  <center><h1> Select a Region You Would Like to Visit </h1></center>

  <!-- Map Image-->
  <a href="discover.html"><img src="images/world_map.png" width=100% height=100%></img></a>



  <!-- Footer  -->
  <footer id="footer">

    <p class="right">Designed by <br> Adrienne & Karley</p>
    <div class="left">
      <table>
        <tr>
          <th>Contact Us</th>
        </tr>
        <tr>
          <td>Phone Number </td>
          <td>555-555-5555</td>
        </tr>
        <tr>
          <td>Address</td>
          <td>100 Engineering Way</td>
        </tr>
      </table>
    </div>
    <center>
      <a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a>
      <a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a>
      <a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a>
      <a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a>
      <a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a>
      <ul class="copyright">
        <li>&copy; Travel</li>
      </ul>
    </center>
  </footer>


  </body>
  </html>
