<div class='nMain'>
<div class="newClass">
  <div id="form">
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>
    <h4>Current Token Number: <span id="tokenDisplay"><?php echo $token; ?></span></h4>
  </div>

  <div class="btn-container">
    <form method="POST" id="tokenForm" style="padding-left: 2px;">
      <button type="submit" name="button1" class="btn btn-primary">DIRBS (IMEI)</button>
      <button type="submit" name="button2" class="btn btn-secondary">SIM BLOCKAGE</button> <br>
      <button type="submit" name="button3" class="btn btn-success">MOBILE STOLEN</button>
      <button type="submit" name="button4" class="btn btn-danger">COMPLAINT STATUS</button>
    </form>
  </div>

  <!-- Printable Token Area -->
  <div id="printableArea">
    <h4>Your Token Number is:</h4>
    <h3 id="tokenToPrint"><?php echo $token; ?></h3>
    <button id="printButton" class="btn btn-info" onclick="printToken()">Print Token</button>
  </div>
</div>
</div>
