<script>
	$(function() {
		$('#bookings-by-shipto').DataTable();
		var pageurl = new URI('<?= $bookingspanel->pageurl->getUrl(); ?>').toString();
		var loadinto = '#bookings-panel';
		var xlabelformat = 'MM/DD/YYYY';
		
		<?php if ($bookingspanel->interval ==  'month') : ?>
			xlabelformat = 'MMM YYYY';
		<?php endif; ?>
		new Morris.Line({
			// ID of the element in which to draw the chart.
			element: 'bookings-chart',
			// Chart data records -- each entry in this array corresponds to a point on
			// the chart.
			data: <?= json_encode($bookingdata); ?>,
			// The name of the data record attribute that contains x-values.
			xkey: 'bookdate',
			dateFormat: function (d) {
				var ds = new Date(d);
				return moment(ds).format('MM/DD/YYYY');
			},
            // need to call for custID and shipto
			hoverCallback: function (index, options, content, row) {
				var bootstrap = new JsContento();
				var ajaxdata = 'data-loadinto='+loadinto+'|data-focus='+loadinto;
				var url = new URI(pageurl.toString()).addQuery('filter', 'filter');
				var date = moment(row.bookdate).format('MM/DD/YYYY');
				var link = '';
				<?php if ($bookingspanel->interval ==  'month') : ?>
					date = moment(row.bookdate).format('MMM YYYY');
					var firstofmonth = moment(row.bookdate).format('MM/DD/YYYY');
					var lastofmonth = moment(row.bookdate).endOf('month').format('MM/DD/YYYY');
					// add call for custID and shipto
                    href = URI(url).setQuery('filter', 'filter').removeQuery('bookdate[]').addQuery('bookdate', firstofmonth+"|"+lastofmonth).normalizeQuery().toString();
					link = "<a href='"+href+"' class='load-and-show' data-loadinto='"+loadinto+"' data-focus='"+loadinto+"'>"+
									'Click to view ' + date +
									'</a>';
				<?php else : ?>
					link = row.dayurl;
				<?php endif; ?>
				var hover = '<b>'+date+'</b><br>';
				hover += '<b>Amt Sold: </b> $' + row.amount.formatMoney() +'<br>';
				hover += link;
				return hover;
			},
			xLabels: '<?= $bookingspanel->interval; ?>',
			// A list of names of data record attributes that contain y-values.
			ykeys: ['amount'],
			// Labels for the ykeys -- will be displayed when you hover over the
			// chart.
			labels: ['Amount'],
			xLabelFormat: function (x) { return moment(x).format(xlabelformat); },
			yLabelFormat: function (y) { return "$ "+y.formatMoney() + ' dollars'; },
		});
	});
</script>
