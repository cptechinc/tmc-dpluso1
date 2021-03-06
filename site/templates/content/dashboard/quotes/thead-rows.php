<tr>
	<th>Detail</th>
	<th>
		<a href="<?= $quotepanel->generate_sortbyURL("quotnbr") ; ?>" class="load-link" <?= $quotepanel->ajaxdata; ?>>
			Quote # <?= $quotepanel->tablesorter->generate_sortsymbol('quotnbr'); ?>
		</a>
	</th>
	<th>
		<a href="<?= $quotepanel->generate_sortbyURL("custid") ; ?>" class="load-link" <?= $quotepanel->ajaxdata; ?>>
			CustID <?= $quotepanel->tablesorter->generate_sortsymbol('custid'); ?>
		</a>
	</th>
	<th>
		Ship-to
	</th>
	<th>
		<a href="<?= $quotepanel->generate_sortbyURL("quotdate") ; ?>" class="load-link" <?= $quotepanel->ajaxdata; ?>>
			Quote Date <?= $quotepanel->tablesorter->generate_sortsymbol('quotdate'); ?>
		</a>
	</th>
	<th>
		<a href="<?= $quotepanel->generate_sortbyURL("revdate") ; ?>" class="load-link" <?= $quotepanel->ajaxdata; ?>>
			Review Date <?= $quotepanel->tablesorter->generate_sortsymbol('revdate'); ?>
		</a>
	</th>
	<th>
		<a href="<?= $quotepanel->generate_sortbyURL("expdate") ; ?>" class="load-link" <?= $quotepanel->ajaxdata; ?>>
			Expire Date <?= $quotepanel->tablesorter->generate_sortsymbol('expdate'); ?>
		</a>
	</th>
	<th>
		<a href="<?= $quotepanel->generate_sortbyURL("subtotal") ; ?>" class="load-link" <?= $quotepanel->ajaxdata; ?>>
			Quote Total <?= $quotepanel->tablesorter->generate_sortsymbol('subtotal'); ?>
		</a>
	</th>
	<th colspan="2">
		<?= $quotepanel->generate_iconlegend(); ?>
		<?php if (isset($input->get->orderby)) : ?>
			<a href="<?= $quotepanel->generate_clearsortURL(); ?>" class="btn btn-warning btn-sm load-link" data-loadinto="<?= $quotepanel->loadinto; ?>" data-focus="<?= $quotepanel->focus; ?>">
				Clear Sorting
			</a>
		<?php endif; ?>
	</th>
</tr>
