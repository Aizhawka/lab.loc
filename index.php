<?php $db = @mysqli_connect("127.0.0.1","root","","bd") or die("Ошибка соединения с БД") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <!DOCTYPE html>
  <html>
    <head>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
    font-family: Arial;
}

* {
    box-sizing: border-box;
}

.openBtn {
    background: #f1f1f1;
    border: none;
    padding: 10px 15px;
    font-size: 20px;
    cursor: pointer;
}

.openBtn:hover {
    background: #bbb;
}

.overlay {
    height: 100%;
    width: 100%;
    display: none;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0, 0.9);
}

.overlay-content {
    position: relative;
    top: 10%;
    width: 80%;
    text-align: center;
    margin-top: 30px;
    margin: auto;
}

.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
    cursor: pointer;
    color: white;
}

.overlay .closebtn:hover {
    color: #ccc;
}

.overlay input[type=text] {
    padding: 15px;
    font-size: 17px;
    border: none;
    float: left;
    width: 80%;
    background: white;
}

.overlay input[type=text]:hover {
    background: #f1f1f1;
}

.overlay button {
    float: left;
    width: 20%;
    padding: 15px;
    background: #ddd;
    font-size: 17px;
    border: none;
    cursor: pointer;
}

.overlay button:hover {
    background: #bbb;
}
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}


/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: left;
    padding: 16px;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}


</style>
</head>
<body>
<div id="myOverlay" class="overlay">
  <span class="closebtn" onclick="closeSearch()" title="Close Overlay">×</span>
  <div class="overlay-content">
  <div class="container">
  <form action="/action_page.php" method="post">
          <div class="row">
            <div class="col-25">
              <label for="firstname">First Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="firsname" name="firstname" placeholder="Your name..">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="lastname">Last Name</label>
            </div>
            <div class="col-75">
              <input type="text" id="lastname" name="lastname" placeholder="Your last name..">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="country">Country</label>
            </div>
            <div class="col-75">
              <select id="country" name="country">
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
                <option value="kysgyzstan">Kyrgyzstan</option>
                <option value="kazakstan">Kazakstan</option>
                <option value="uzbekistan">Uzbekistan</option>
                <option value="korea">Korea</option>
                <option value="japan">Japan</option>
                <option value="france">France</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="subject">Subject</label>
            </div>
            <div class="col-75">
              <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
            </div>
          </div>
          <div class="row">
            <input type="submit" value="Submit">
          </div>
  </form>
</div>
  </div>
</div>


<button class="openBtn" onclick="openSearch()">Подпишитесь на нашу рассылку</button>

<script>
function openSearch() {
    document.getElementById("myOverlay").style.display = "block";
}

function closeSearch() {
    document.getElementById("myOverlay").style.display = "none";
}
</script>

<hr>

<table>
  <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Country</th>
    <th>Subject</th>
  </tr>
  <?php 
    $res = mysqli_query($db, "SELECT * FROM myuser ");
   
    $row = mysqli_fetch_all($res, MYSQLI_ASSOC);
    echo "<pre>";
    print_r($row);
    echo "</pre>";
    /*$data2 = [];
   */
    foreach ($row as $item) {
        echo "
        <tr>
            <td>{$item['firstname']}</td>
            <td>{$item['lastname']}</td>
            <td>{$item['country']}</td>
            <td>{$item['subject1']}</td>
        </tr>";
       
    }
  
  ?>

</table>

</body>
  </html>
  
</body>
</html>