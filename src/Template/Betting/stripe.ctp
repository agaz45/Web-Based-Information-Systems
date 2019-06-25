<div class="container" style="border-style:solid;">
  <h2>Add Money To Account</h2>
  <h4>Email: doesn't need to be valid...(ie. asd@asd.asd)</h4>
  <h4>Don't do verification code</h4>
  <h4>Card Number: 4242 4242 4242 4242</h4>
  <h4>MM/YY: any MM/YY past today's date (ie. 01/23)</h4>
  <h4>CVC: Any 3/4 Digit number (ie. 123)</h4>
  
  <?php
  // KIND OF A HACK TO MAKE THE FORM WORK, will break if u remove
  echo $this->Form->create(null, ['url' => ['controller' => 'Betting', 'action' => 'stripe']]);
  ?>
 <form>
    <input type="number" class="form-control" name="amount" id="custom-donation-amount" placeholder="0.00" min="0"/>
    <script
      src="https://checkout.stripe.com/checkout.js" class="stripe-button"
      data-key="pk_test_QGuAkjRrZMslLp3rlW1Glr7z"
      data-name="eSpot"
      data-description="Add money to account"
      data-locale="auto"
      data-label="Add Money"
      data-currency="cad">
    </script>
  </form>
</div>
</br>

