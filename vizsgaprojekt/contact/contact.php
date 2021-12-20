<div class="contact">
    <div class="urlap mx-auto">
        <h1 class="text-white">
            Contact us!
        </h1>
        <form class="row g-3 needs-validation text-white" method="POST" novalidate>
  <div class="col-md-4 text-white" >
    <label for="validationCustom01" class="form-label">First name</label>
    <input type="text" class="form-control" name="firstname" id="validationCustom01" value="" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Last name</label>
    <input type="text" class="form-control" name="lastname" id="validationCustom02" value="" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomemail" class="form-label">Email</label>
    <div class="input-group has-validation">
      <input type="email" name="email" class="form-control" id="validationCustomemail" aria-describedby="inputGroupPrepend" required>
      <div class="invalid-feedback">
        Please provide a valid email.
      </div>
    </div>
  </div>
  <div class="col-md-6 w-100 texttarea">  
    <label for="validationCustom03" class="form-label">Please tell us about your complication</label>
    <textarea type="textarea " style="height: 12vh;" class="form-control" name="textarea" id="validationCustom03" required></textarea>
    <div class="invalid-feedback">
      Please provide a valid city.
    </div>
  </div>

  <div class="col-12">
    <button class="btn btn-primary w-25" name="btn_send" type="submit">Send</button>
  </div>

</form>
<h1>ADATOK</h1>
<!-- <?php
echo ('<pre>');
 print_r($_POST);

 echo ('</pre>');
?> -->
    </div>
</div>
<script src="./contact/contact.js"></script>