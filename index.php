<?php
function scan_dir($dir) {
	$ignored = array('.', '..', '.svn', '.htaccess', '.php', '.html');

	$files = array();    
	foreach (scandir($dir) as $file) {
		if (in_array($file, $ignored)) continue;
		$files[$file] = filemtime($dir . '/' . $file);
	}

	arsort($files);
	$files = array_keys($files);

	return ($files) ? $files : false;
}

function compare_func($a, $b)
{
    // CONVERT $a AND $b to DATE AND TIME using strtotime() function
    $t1 = strtotime($a);
    $t2 = strtotime($b);

    return ($t2 - $t1);
}

//$dir = getcwd();
$dir = "bulletin/";


?>


<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="/style.css">
        <title>ARFNET</title>
		<style>
			.title {
				font-size: 36px;
			}
			
			header *{
				display: inline-block;
			}
			
			* {
				vertical-align: middle;
				max-width: 100%;
			}
			
			.container {
				margin-left: 20px;
				display: inline-block;
			}
			
			.elem {
				border: 1px solid;
				margin-top: 15px;
				padding-left: 15px;
				padding-right: 15px;
			}
			
			.row {
				display: flex;
			}

			.leftcol {
				flex: 30%;
			}
			
			.rightcol {
				flex: 70%;
			}
			
			.cost {
				font-size: 20px;
			}
			
			.accrow {
				font-size: 18px;
			}
		</style>
    </head>

    <body>
		<header>
			<img src="/arfnet_logo.png" width="64">
			<span class="title"><strong>ARFNET</strong></span>
		</header>
		<hr>
		<a class="home" href="/">Home</a><br>
		<h2>ARFNET Bulletin</h2>
		<hr>
		<div class="row">
			<div class="leftcol">
				<div class="container">
					<h3>TODO</h3>
					<table>
						<tr>
							<th>Thing</th>
							<th>Status</th>
						</tr>
						
						
					</table>
				</div>
			
				<div class="container">
					<?php 
						$files = scan_dir($dir);
						$filenames = array();
						for ($i = 0; $i < count($files); $i++) {
							if (strpos($files[$i], 'txt')) array_push($filenames, basename($files[$i], ".txt"));
						}
						
						rsort($filenames);
						//$files = array_reverse($filenames, true);
						
						//print_r($filenames);
						
						foreach ($filenames as $filename) {
							$f = fopen($dir.$filename.".txt", 'r') or die("Error reading file");
							echo '<div class="elem">'.fread($f, filesize($dir.$filename.".txt")).'</div>';
							fclose($f);
						}
					?>
				</div>
			</div>
			<div class="rightcol">
				<div class="container">
					<h2>Total spent so far</h2>
					<span class="cost">1311.18 €</span>
					<br>
					<h2>ARFNET Accounting Log</h2>
					<table class="acclog">
						<tr>
							<th>Item</th>
							<th>Supplier</th>
							<th>Date</th>
							<th>Price</th>
							<th>Shipment</th>
							<th>Total</th>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.ebay.de/itm/133567517392">Dell PowerEdge R720 Server 2U H710p mini 2x E5-2620 CPU 16GB RAM 8x3.5 Bay</a></td>
							<td class="accrow">eBay: piospartslap DE</td>
							<td class="accrow">23-07-21</td>
							<td class="accrow">252.86</td>
							<td class="accrow">40.00</td>
							<td class="accrow">292.86</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B07C2K3PZ2">EZDIY-FAB PCI Express M.2 SSD NGFF Tarjeta PCIe a PCIe 3.0 x4</a></td>
							<td class="accrow">Amazon: EZDIY-FAB EU</td>
							<td class="accrow">27-07-21</td>
							<td class="accrow">14.99</td>
							<td class="accrow"></td>
							<td class="accrow">14.99</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B07VYG5HQD">Kingston A2000 SSD NVMe PCIe M.2 2280 250 GB</a></td>
							<td class="accrow">Amazon: MemoCow</td>
							<td class="accrow">27-07-21</td>
							<td class="accrow">45.00</td>
							<td class="accrow"></td>
							<td class="accrow">45.00</td>
						</tr>
							
						<tr>
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B07H289S79">Seagate IronWolf 4 TB, NAS HDD, 3.5" SATA, 5900rpm, 64 MB</a></td>
							<td class="accrow">Amazon: Amazon EU S.a.r.L.</td>
							<td class="accrow">27-07-21</td>
							<td class="accrow">117.99</td>
							<td class="accrow"></td>
							<td class="accrow">117.99</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B078N2ZMGY">Heretom F238F 3.5" Caddy</a></td>
							<td class="accrow">Amazon: uk-sales2017</td>
							<td class="accrow">29-07-21</td>
							<td class="accrow">13.90</td>
							<td class="accrow"></td>
							<td class="accrow">13.90</td>
						</tr>
						
						<tr>
							<td class="accrow">Ethernet cable UTP Cat.6</td>
							<td class="accrow">CCA</td>
							<td class="accrow"></td>
							<td class="accrow">3.50</td>
							<td class="accrow"></td>
							<td class="accrow">3.50</td>
						</tr>
						
						<tr>
							<td class="accrow">UPS 850VA</td>
							<td class="accrow">CCA</td>
							<td class="accrow"></td>
							<td class="accrow">65.00</td>
							<td class="accrow"></td>
							<td class="accrow">65.00</td>
						</tr>
						
						<tr>
							<td class="accrow">Kingston A400 SATA 2.5"</td>
							<td class="accrow">CCA</td>
							<td class="accrow"></td>
							<td class="accrow">27.00</td>
							<td class="accrow"></td>
							<td class="accrow">27.00</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B07WZSBPP9">DELL G8TXP Power Cable</a></td>
							<td class="accrow">Amazon: GinTaiCompany</td>
							<td class="accrow">27-07-21</td>
							<td class="accrow">25.99</td>
							<td class="accrow"></td>
							<td class="accrow">25.99</td>
						</tr>
						
						<tr>
							<td class="accrow">D-Link Switch GO-SW-8G Gigabit 8x RJ45</td>
							<td class="accrow">CCA</td>
							<td class="accrow"></td>
							<td class="accrow">25.90</td>
							<td class="accrow"></td>
							<td class="accrow">25.90</td>
						</tr>
						
						<tr>
							<td class="accrow">D-Link 5 port GbE switch I randomly found</td>
							<td class="accrow">A cabinet in my house</td>
							<td class="accrow"></td>
							<td class="accrow"></td>
							<td class="accrow"></td>
							<td class="accrow">Free</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.ebay.de/itm/133567517392">Dell PowerEdge R720 Server [...] <strong><i>return</i></strong></a></td>
							<td class="accrow">eBay: piospartslap DE</td>
							<td class="accrow">03-08-21</td>
							<td class="accrow">-252.86</td>
							<td class="accrow">-40.00</td>
							<td class="accrow">-292.86</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.ebay.com/itm/114705035201">Dell PowerEdge R720 Server 2U H710p mini 2x E5-2670 CPU 16GB RAM 8x3.5 Bay</a></td>
							<td class="accrow">eBay: enterleszno PO/DE</td>
							<td class="accrow">06-08-21</td>
							<td class="accrow">260.00</td>
							<td class="accrow">40.00</td>
							<td class="accrow">300.00</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.ebay.com/itm/114705035201">Dell 2U ReadyRails II B6 H4X6X</a></td>
							<td class="accrow">eBay: colindalerabbit UK</td>
							<td class="accrow">02-10-21</td>
							<td class="accrow">68.09</td>
							<td class="accrow">35.01</td>
							<td class="accrow">103.10</td>
						</tr>
						
						<tr>
							<td class="accrow"><a>12U flightcase rack</a></td>
							<td class="accrow">[Donated] Telemag</td>
							<td class="accrow">12-11-21</td>
							<td class="accrow"></td>
							<td class="accrow"></td>
							<td class="accrow">Free</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B0016P0HY2">Keystone Patch Panel, Cat.6a, shielded, black</a></td>
							<td class="accrow">Amazon: Equip</td>
							<td class="accrow">27-12-21</td>
							<td class="accrow">20.51</td>
							<td class="accrow"></td>
							<td class="accrow">20.51</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B01E03R17C">Perel EBP08PDU-G, 8x PDU</a></td>
							<td class="accrow">Amazon: Perel</td>
							<td class="accrow">27-12-21</td>
							<td class="accrow">24.18</td>
							<td class="accrow"></td>
							<td class="accrow">24.18</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B07P4LMDP6">RJ45 Cat.6 Keystone Jack</a></td>
							<td class="accrow">Amazon: VCE</td>
							<td class="accrow">27-12-21</td>
							<td class="accrow">9.59 x3</td>
							<td class="accrow"></td>
							<td class="accrow">28.77</td>
						</tr>
						
						<tr>
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B084YXJ58W">Diyeeni Impact Punch Down Tool, 110/88</a></td>
							<td class="accrow">Amazon: Diyeeni</td>
							<td class="accrow">27-12-21</td>
							<td class="accrow">16.09</td>
							<td class="accrow"></td>
							<td class="accrow">16.09</td>
						</tr>
						
						<tr>
							<td class="accrow"><a>U/UTP Cat.6 twisted pair cable, 100m</a></td>
							<td class="accrow">[Donated] Telemag</td>
							<td class="accrow">01-01-22</td>
							<td class="accrow"></td>
							<td class="accrow"></td>
							<td class="accrow">Free</td>
						</tr>
						
						<tr>
							<td class="accrow"><a>U/UTP Cat.6 RJ45 male twisted pair patch cable, 15cm</a></td>
							<td class="accrow">Diotronic</td>
							<td class="accrow">04-01-22</td>
							<td class="accrow">1.13 x10</td>
							<td class="accrow"></td>
							<td class="accrow">11.25</td>
						</tr>
						
						<tr class="accrow">
							<td class="accrow"><a>U/UTP Cat.6 RJ45 male twisted pair patch cable, 25cm</a></td>
							<td class="accrow">Diotronic</td>
							<td class="accrow">04-01-22</td>
							<td class="accrow">1.66 x5</td>
							<td class="accrow">6.65</td>
							<td class="accrow">8.29 (14.94)</td>
						</tr>
						
						<tr class="accrow">
							<td class="accrow"><a href="https://www.ebay.es/itm/275334006633">10 x HITACHI/HGST 3TB 7.2K 6Gbps 64MB 3.5" SASHDD HUS723030ALS640 A10</a></td>
							<td class="accrow">eBay: systemsupplyindustries</td>
							<td class="accrow">10-06-22</td>
							<td class="accrow">77.45</td>
							<td class="accrow">42.87</td>
							<td class="accrow">120.21</td>
						</tr>
						
						<tr class="accrow">
							<td class="accrow"><a href="https://es.aliexpress.com/item/1005004075367273.html">Hard drive caddy F238F 0X968D 3.5 inch, for Dell 13th</a></td>
							<td class="accrow">aliexpress: Zenwin</td>
							<td class="accrow">16-06-22</td>
							<td class="accrow">25.00</td>
							<td class="accrow">31.40</td>
							<td class="accrow">56.39</td>
						</tr>
						
						<tr class="accrow">
							<td class="accrow"><a>2x DELL PowerConnect 5424 + 1x 2848</a></td>
							<td class="accrow">[Donated] A valencian friend</td>
							<td class="accrow">30-06-22</td>
							<td class="accrow">Free</td>
							<td class="accrow">10.00</td>
							<td class="accrow">10.00</td>
						</tr>
						
						<tr class="accrow">
							<td class="accrow"><a href="https://mikrotik.com/product/RB2011UiAS-RM">Mikrotik RB2011UiAS-RM</a></td>
							<td class="accrow">CCA</td>
							<td class="accrow">20-08-22</td>
							<td class="accrow">118.00</td>
							<td class="accrow"></td>
							<td class="accrow">118.00</td>
						</tr>
						
						<tr class="accrow">
							<td class="accrow"><a href="https://www.tp-link.com/us/business-networking/ceiling-mount-access-point/eap225/">TP-Link Omada AC1350 EAP225</a></td>
							<td class="accrow">CCA</td>
							<td class="accrow">20-08-22</td>
							<td class="accrow">83.00</td>
							<td class="accrow"></td>
							<td class="accrow">83.00</td>
						</tr>
						
						<tr class="accrow">
							<td class="accrow"><a href="https://www.amazon.es/gp/product/B077S9PHKR/ref=ppx_yo_dt_b_asin_title_o02_s00?ie=UTF8&psc=1">Keystone fiber passthrough jack SC-SC</a></td>
							<td class="accrow">Amazon</td>
							<td class="accrow">09-09-22</td>
							<td class="accrow">4.02</td>
							<td class="accrow"></td>
							<td class="accrow">4.02</td>
						</tr>
						
						<tr class="accrow">
							<td class="accrow"><a>Cisco 2951 ISR Router</a></td>
							<td class="accrow">[Donation] Paco</td>
							<td class="accrow">01-07-22</td>
							<td class="accrow"></td>
							<td class="accrow"></td>
							<td class="accrow">Free</td>
						</tr>

						<tr class="accrow">
							<td class="accrow"><a>Kingston A400 SATA SSD</a></td>
							<td class="accrow">CCA</td>
							<td class="accrow">04-01-23</td>
							<td class="accrow">20€</td>
							<td class="accrow"></td>
							<td class="accrow">20€</td>
						</tr>

						<tr class="accrow">
							<td class="accrow"><a>SATA Power cable splitter</a></td>
							<td class="accrow">CCA</td>
							<td class="accrow">04-01-23</td>
							<td class="accrow">4€</td>
							<td class="accrow"></td>
							<td class="accrow">4€</td>
						</tr>

						<tr class="accrow">
							<td class="accrow"><a>SATA Data cable</a></td>
							<td class="accrow">CCA</td>
							<td class="accrow">04-01-23</td>
							<td class="accrow"></td>
							<td class="accrow"></td>
							<td class="accrow">Free</td>
						</tr>

						<tr class="accrow">
							<td class="accrow"><a>nVIDIA GPU GT 710</a></td>
							<td class="accrow">My old PC</td>
							<td class="accrow">15-01-23</td>
							<td class="accrow"></td>
							<td class="accrow"></td>
							<td class="accrow">Free</td>
						</tr>

						<tr class="accrow">
							<td class="accrow"><a href="https://www.bargainhardware.co.uk/hp-672612-081-16gb-pc3-12800r-ddr3-1600-2rx4-ram">RAM sticks HP (672612-081) 16GB PC3-12800R</a></td>
							<td class="accrow">bargainhardware.co.uk</td>
							<td class="accrow">18-01-23</td>
							<td class="accrow">10.44€ x4</td>
							<td class="accrow">5.79€</td>
							<td class="accrow">47.55€</td>
						</tr>

						<tr class="accrow">
							<td class="accrow">Fibers OS2 SC-APC 9/125 simplex 60cm + 4m</a></td>
							<td class="accrow">[Donation] Yero</td>
							<td class="accrow">03-03-23</td>
							<td class="accrow"></td>
							<td class="accrow"></td>
							<td class="accrow">Free</td>
						</tr>

					</table>
					
					<h2>ARFNET Suppliers</h2>
					<table>
						<tr><th>Supplier</th><th>Country</th></tr>
						<tr><td><a href="https://www.amazon.es/">amazon.es</a></td><td>International</td></tr>
						<tr><td><a href="https://www.ebay.es/">ebay.es</a></td><td>International</td></tr>
						<tr><td><a href="https://www.ccainformatica.es/">CCA</a></td><td>Local</td></tr>
						<tr><td><a href="https://diotronic.com/">Diotronic</a></td><td>Local</td></tr>
						<tr><td><a href="https://www.bargainhardware.co.uk/">BargainHardware</a></td><td>International</td></tr>
					</table>
					
					<h2>Special thanks to</h2>
					<table>
						<tr><th>Entity</th><th>Note</th></tr>
						<tr><td><a href="https://telemag.es/">Telemag de Lorca, SL.</a></td><td>They don't know it, but they help me very much</td></tr>
						<tr><td>Valenciano</td><td>Dios te lo pague xd</td></tr>
						<tr><td>Paco</td><td>Paco. ca Cehegín</td></tr>
						<tr><td>Yero</td><td>Me metió toda la fibra</td></tr>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
