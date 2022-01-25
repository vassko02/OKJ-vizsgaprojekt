<div class="contact">
  <div class="urlap mx-auto">
    <h1 class="text-white">
      Contact us!
    </h1>
    <form class="row g-3 needs-validation text-white" method="POST" action="<?php echo $baseUrl?>/reportconfirmed" novalidate>
      <div class="col-md-4">
        <label for="validationCustomLastName" class="form-label">First Name</label>
        <div class="input-group has-validation">
          <input type="text" name="firstname" class="form-control" id="validationCustomFirstName" value="" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Please provide a valid name.
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustomLastName" class="form-label">Last Name</label>
        <div class="input-group has-validation">
          <input type="text" name="lastname" class="form-control" id="validationCustomLastName" value="" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Please provide a valid name.
          </div>
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
        <label for="validationCustom03" class="form-label">Please tell us about your problem!</label>
        <textarea type="textarea" style="height: 12vh;" class="form-control" name="textarea" id="validationCustom03" required></textarea>
      </div>
      <div class="col-12">
        <button class="btn btn-primary w-25" name="btn_send" type="submit">Send</button>
      </div>

    </form>
    <!-- <h1>ADATOK</h1>
    <?php
    echo ('<pre>');
    print_r($_POST);
    echo ('</pre>');
    ?> -->
  </div>
</div>
<script src="./contact/contact.js"></script>