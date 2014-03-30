<html>
<head>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<style>
	body, html, div{
		padding: 0;
		margin: 0;
		font-family: Segoe UI;
	}

	body
	{
		padding-bottom: 50px;
	}

	#m1 div
	{
		height: 150px;
		width: 100%;
		background: #7f7f7f;
		cursor: hand;
		text-align: center;
		font-size: 100px;
	}

	#m1 div:hover
	{
		background: #e5e5e5;
	}

	button
	{
		width: 100%;
		height: 100px;
		margin-top: 20px;
		margin-bottom: 20px;
		font-size: 70px;
	}

	</style>
</head>
<body>
	<div id="bar" style="min-height: 133px; height: 20%; background: #404040; width: 100%; font-size: 134px; text-align: center">
		<div style="display: none; cursor: hand; position: absolute; height: 133px;" id="bbox">
			<img src="http://upload.wikimedia.org/wikipedia/commons/1/16/TriangleArrow-Left.svg" style="height: 133px;"></img>
		</div>
		Orkestra
	</div>
	<div id="ohmygoddiv"></div>
	<div id="m1" style="width: 100%; height: 90%; background: #bfbfbf">
		<div target="car">Car</div>
		<div target="light">Light</div>
	</div >
	<div id="m2" style="width: 100%; height: 90%; background: blue; display: none">

	</div>
	<div style="display: none" id="targets">
		<div id="car" style="background: brown; height: 100%; width: 100%;">
						<button url="remote.php?v0=car">On</button>
		</div>
		<div id="light" style="background: aqua; height: 100%; width: 100%;">
			<button url="remote.php?v0=light&#38;v1=power&#38;v2=1">On</button>
			<button url="remote.php?v0=light&#38;v1=power&#38;v2=0">Off</button>
			<button url="remote.php?v0=light&#38;v1=togglePower&#38;v2=1">Toggle</button>
			<div id="slider"></div>
			<script type="text/javascript">
			function slidec()
			{
				$.get("remote.php?v0=light&v1=dim&v2=" + $("#slider").slider("value"));
				console.log($("#slider").slider("value"));
			}
			$(function(){
				var lightb = $("#slider").slider({max: 255, stop: slidec});

			})
			
			</script>
		</div>
	</div>
	
	<script>
	var he = $("#bar").height();
	$("#bbox").css("font-size", he + "px")
	$("#bbox").click(function()
	{
		$("#bbox").css("display", "none");
		$("#m1").css("display", "block");
		$("#m2").css("display", "none");
		$("#targets").append($("#m2").children());
	});
	$("#m1 > div").each(function(i, j){
		$(j).click(function (e) {
			$("#bbox").css("display", "block");
			$("#m1").css("display", "none");
			$("#m2").css("display", "block");
			$("#m2").append($("#" + $(e.target).attr("target")));
		})
	});
	$("#targets > div > button").each(function(i, j)
			{
				$(j).click(function(e)
				{
					var ur = $(e.target).attr("url");
					$.get(ur);
				})
			});
	</script>
</body>
</html>