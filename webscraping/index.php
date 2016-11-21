<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="css/bootstrap.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/myjs.js"></script>

</head>


	<body>
		<div class="container">

			<div class="row">
				<button class="btn btn-info">Refresh</button>
			</br></br>
			</div>

			<div class="row">
			<div class="col-sm-8 col-lg-8">
			<?php 

			$start = microtime(true);
			
			
			$url = array(
				'http://steamcommunity.com/market/listings/570/Fiery%20Soul%20of%20the%20Slayer',
				'http://steamcommunity.com/market/listings/570/Inscribed%20Blades%20of%20Voth%20Domosh',				
			 	'http://steamcommunity.com/market/listings/570/Exalted%20Manifold%20Paradox',
			 	'http://steamcommunity.com/market/listings/570/Exalted%20Tempest%20Helm%20of%20the%20Thundergod',
				'http://steamcommunity.com/market/listings/570/Genuine%20Serrakura'			 	
			 	);

			echo "<table class=table table-striped>";

			foreach ($url as $key => $value) {
				$html = getHtml($value."/render?start=0&count=5&currency=10&language=english");

				libxml_use_internal_errors(TRUE);
				$json_a=json_decode($html,true);
				$getit = $json_a['results_html'];


				getValue($getit);

			}
			echo "</table>";

			$end = microtime(true);

			printf("Page was generated in %f seconds", $end - $start);


			function getHtml($url)
			{
				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				return curl_exec($ch);
			}

			function getValue($getit){

				$my_doc = new DOMDocument();

				if(!empty($getit)){

				$my_doc->loadHTML($getit);
				libxml_clear_errors();

				$my_xpath = new DOMXPath($my_doc);

				$name = $my_xpath->query('(//div[@class="market_listing_item_name_block"]/span[@class="market_listing_item_name"])[1]');
				$img = $my_xpath->query('(//div[@class="market_listing_item_img_container"]/img/@src)[1]');
				$price = $my_xpath->query('(//span[@class =  "market_listing_price market_listing_price_with_fee"])[1]');

					echo "<tr>";
					foreach ($name as $row) {
						echo "<td>".$row->nodeValue . "</td>";
					}
					

					foreach ($img as $row) {
						echo "<td><img src=".$row->nodeValue . " height=60px width=60px></td>";
					}
				
					foreach ($price as $row) {
						echo "<td>".$row->nodeValue . "</td>";
					}

					echo "<td><a href = 'www.google.com'>Get</a></td>";
					echo "</tr>";

			}else{
					echo "empty";
				}

			}

		?>
	</div>
	</div>
		</div>
	</body>
</html>