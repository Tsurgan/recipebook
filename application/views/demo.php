<html>
	<head>
		<title>Демонстрация API</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

	</head>
	<body>

		<h1><?php echo $title ?></h1>
		<h2>Запрос списка рецептов</h2>
		<button id='showlist'>Показать список рецептов</button>
		<button id='hidelist' hidden>Спрятать список рецептов</button>
		<div id='reclist'></div>

	<div hidden>
		<h2>Запрос отдельного рецепта с ингредиентами по ID</h2>
		<div>Введите ID рецепта:</div>
		<input type="number" id="rec_id">
		<button id='showrec'>Показать рецепт</button>
		<div id='fullrec'></div>
	</div>
	</body>
</html>


<script>
     $("#showlist").on( "click", function(){//element to be click to load the page in the div
			$("#showlist").hide();
			$("#hidelist").show();
            $("#reclist").load('index.php/demo/list_view');
       
       });

	$("#hidelist").on( "click", function(){//element to be click to load the page in the div
			$("#hidelist").hide();
			$("#showlist").show();
            $("#reclist").empty();
       
    });
	
	$("#showrec").on( "click", function(){//element to be click to load the page in the div
            $("#fullrec").load('index.php/demo/full_view');
       
       });
</script>