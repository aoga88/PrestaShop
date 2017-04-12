	</div><!-- div id="sheet_step" -->
</div><!-- div id="sheets" -->

<div id="buttons">
	<?php if (!$this->isLastStep()): ?>
		<?php if ($this->next_button): ?>
			<input id="btNext" class="button little" type="submit" name="submitNext" value="<?php echo $this->translator->trans('Next', array(), 'Install'); ?>" />
		<?php else: ?>
			<input id="btNext" class="button little disabled" type="submit" name="submitNext" value="<?php echo $this->translator->trans('Next', array(), 'Install'); ?>" disabled="disabled" />
		<?php endif; ?>
	<?php endif; ?>

	<?php if (!$this->isFirstStep() && $this->previous_button): ?>
		<input id="btBack" class="button little" type="submit" name="submitPrevious" value="<?php echo $this->translator->trans('Back', array(), 'Install') ?>" />
	<?php endif; ?>
</div>
</form>
<div id="phone_help">
	<?php echo $this->translator->trans('If you need some assistance, you can <a href="%help%" onclick="return !window.open(this.href);">get tailored help</a> from our support team. <a href="%doc%" onclick="return !window.open(this.href);">The official documentation</a> is also here to guide you.', array('%help%' => $this->getTailoredHelp(), '%doc%' => $this->getDocumentationLink()), 'Install'); ?>
</div>
</div><!-- div id="container" -->

<ul id="footer">
	<li><a href="http://www.kadoo.mx" title="Kadoo.mx" target="_blank">Kadoo.mx</a> | </li>
	<li>&copy; 2017-<?php echo date('Y'); ?></li>
</ul>
<script type="text/javascript">
	if (typeof psuser_assistance != 'undefined')
	{
		var errors = new Array();
		$.each($('li.fail'), function(i, item){
			errors.push($(this).text().trim());
		});
		psuser_assistance.setStep('install_<?php echo addslashes($this->step) ?>', {'error': errors + ' || {"version": "' + ps_version + '"}'});
		if (errors.length)
			$('#iframe_help').attr('src', $('#iframe_help').attr('src') + '&errors=' + encodeURI(errors.join(', ')));
	}
</script>
</body>
</html>
