var g = g || {};

$(document).ready(function() {

	//cache selectors
	g.$blinkenbuilding = $('.bb');

	//load movie
	g.load_movie();

	//bind events
	var $mod = $('.mod');
	$mod.click(function() {
		var $this = $(this);
		$this.css('cursor', 'default');
		$('form', $this).slideDown('fast',
		function() {
			$('textarea', $this).select();
		});
	});

});

g.load_movie = function() {

	$.ajax({
		type: 'GET',
		url: g.$blinkenbuilding.attr('data-movie'),
		dataType: 'xml',
		error: function(data, textst, err) {
			console.debug(data);
			console.debug(textst);
		},
		success: function(data) {

			//variables
			g.table = [];
			g.frames_duration = [];
			g.frame = 0;
			g.bits = '';

			//arcade or classic?
			var width = $('blm', data).attr('width');
			var height = $('blm', data).attr('height');
			var imgwidth = 316;
			var imgheight = 325;
			if (width == 26 && height == 20) {
				g.type = 'arcade';
				g.bits = 'b4';
				g.$blinkenbuilding.attr('class', 'blinkenbuilding_arcade');
				imgwidth = 272;
				imgheight = 420;
			} else {
				g.type = 'classic';
				g.$blinkenbuilding.attr('class', 'blinkenbuilding');
			}

			//set w/h in embed
			var ta = $('textarea').text();
			ta = ta.replace(/width=""/, 'width="' + imgwidth + '"').replace(/height=""/, 'height="' + imgheight + '"');
			$('textarea').text(ta);

			//fill data
			$(data).find('frame').each(function() {
				var $frame = $(this);
				g.frames_duration.push($frame.attr('duration'));
				var rows = [];
				$frame.find('row').each(function() {
					var $row = $(this);
					var cols = [];
					cols = $row.text().split('');
					rows.push(cols);
				});
				g.table.push(rows);
			});

			//start the animation!
			g.render_table(g.frame);

			//loop
			g.render_next_frame();
		}
	});

}

g.render_next_frame = function() {
	setTimeout(function() {
		g.frame++;
		if (g.frame >= g.table.length) {
			g.frame = 0;
		}
		g.render_table(g.frame);
		g.render_next_frame();
	},
	parseInt(g.frames_duration[g.frame], 10));
}

g.render_table = function(frame) {

	var rows = [];
	var thisframe = g.table[frame];

	var rowcount = thisframe.length;
	for (var r = 0; r < rowcount; r++) {
		var cols = [];
		var colcount = thisframe[r].length;
		for (var c = 0; c < colcount; c++) {
			cols.push('<span class="' + g.bits + 'l' + thisframe[r][c] + '">&nbsp;</span>');
		}
		rows.push(cols.join(''));
	}

	var table = '<div>' + rows.join('</div><div>') + '</div>';

	g.$blinkenbuilding.html('<div class="bo"><div class="grid">' + table + '</div></div>');

}
