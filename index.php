<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>nestedSortable jQuery Plugin And PHP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script>
		(function(){
			if (!/*@cc_on!@*/0) return;
			var e = ("abbr article aside audio canvas command datalist details figure figcaption footer "+
				"header hgroup mark meter nav output progress section summary time video").split(' '),
			i=e.length;
			while (i--) {
			document.createElement(e[i])
			}
		})(document.documentElement,'className');
	</script>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script>
	<script type="text/javascript" src="js/jquery.mjs.nestedSortable.js"></script>
</head>
<body>

<section id="demo">
			<div>
				<h1>Nikola Bodro&#382;i&#263; Portfolio</h1>
				<h3>Unlimited nesting using <em>id</em> and <em>parent_id</em></h3>
                                <p>Change order of rectangles and submit to save changes</p>
				<p>Back to <a href="http://nikolabodr.com">API part</a> of portfolio</p>
			</div>	
	<ol class="sortable"> 
		<?php 
		include('global.php');	
		Nesting::fetch_menu(Nesting::query(0)); //call this function with 0 parent id
		?>
	</ol>

	
	<input type="submit" name="serialize" id="serialize" value="Submit" />
    
<div id="info_out"></div>
	
</section>
<div style="margin-top: 5px;">

    <p style="text-align: center">

        Copyrights © Nikola Bodrožić

    </p>

</div>

<script>
	$(document).ready(function(){

		$('ol.sortable').nestedSortable({
			forcePlaceholderSize: true,
			handle: 'div',
			helper:	'clone',
			items: 'li',
			opacity: .6,
			placeholder: 'placeholder',
			revert: 250,
			tabSize: 25,
			tolerance: 'pointer',
			toleranceElement: '> div'
		});

		$('#serialize').click(function(){
			var serialized = $('ol.sortable').nestedSortable('serialize');
                        serialized = serialized.replace(/null/g,"0"); 
                        ////////////////////////
                        $.get("ajax.php?"+serialized,function(data){
                               $("#info_out").html(data).hide().fadeIn('fast');
                       });                        

		});

	});
</script>
<!-- Start of StatCounter Code for Default Guide -->


<!-- End of StatCounter Code for Default Guide -->
</body>
</html>

