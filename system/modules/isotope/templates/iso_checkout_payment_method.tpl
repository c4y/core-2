<div class="payment_method">
<h2><?php echo $this->headline; ?></h2>
<p><?php echo $this->message; ?></p>
<div class="radio_container">
<?php foreach($this->paymentMethods as $method): ?>
<span>
	<input id="ctrl_payment_module_<?php echo $method['id']; ?>" type="radio" class="radio payment_module" name="payment[module]" value="<?php echo $method['id']; ?>"<?php echo $method['checked']; ?> />
	<label for="ctrl_payment_module_<?php echo $method['id']; ?>"><?php echo $method['label'] . $method['price']; ?></label>
	<?php if ($method['note'] != ''): ?>
	<div class="payment_note"><?php echo $method['note']; ?></div>
	<?php endif; ?>
	<?php if ($method['form'] != ''): ?>
	<div class="payment_data" id="payment_data_<?php echo $method['id']; ?>"><?php echo $method['form']; ?></div>
	<?php endif; ?>
</span>
<?php endforeach; ?>
</div>
<?php if (strlen($this->error)): ?>
<p class="error"><?php echo $this->error; ?></p><?php endif; ?>
</div>

<script type="text/javascript">
<!--//--><![CDATA[//><!--
window.addEvent('domready', function() {
	$$('.payment_data').setStyle('display', 'none');
	$$('input.payment_module').each( function(el) {
		el.addEvent('click', function (event) {
			$$('.payment_data').setStyle('display', 'none');
			if ($(('payment_data_'+event.target.value)))
				$(('payment_data_'+event.target.value)).setStyle('display', 'block');
		});
		if (el.checked && $(('payment_data_'+el.value))) {
			$(('payment_data_'+el.value)).setStyle('display', 'block');
		}
	});
});
//--><!]]>
</script>
