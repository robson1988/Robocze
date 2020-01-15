<?php

$data = array_map('str_getcsv', file('Linki-test.csv', FILE_SKIP_EMPTY_LINES));
$number_of_rows = count($data);
echo $number_of_rows;
$x=0;
$y=0;
$z=0;

$doc = new DOMDocument('1.0');
$doc->formatOutput=true;

$root = $doc->createElement('urlset');
$doc->appendChild($root); //na zakonczenie skryptu

while($x < $number_of_rows) {

while($y <= 4) {
  while($z <= 4) {
    $url = $doc->createElement('url');
    $root->appendChild($url);

    $loc = $doc->createElement('loc',$data[$y][$z]);
    $url->appendChild($loc);

    $changefreq = $doc->createElement('changefreq','daily');
    $url->appendChild($changefreq);

    $priority = $doc->createElement('priority');
    $url->appendChild($priority);

      $z++;
    }
  $y++;
}
$x++;
}




/*
for($record=0; $record<=1;$record++){

      for($x=0;$x<=4;$x++) {
      	?>
        <loc><?php echo $data[0][$x]; ?></loc>
        <xhtml:link rel="canonical" href="<?php echo $data[0][$x]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $data[0][$x]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $data[0][$x]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $data[0][$x]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $data[0][$x]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $data[0][$x]; ?>"/>
      <?php }
}




				<url>
				<loc><?php echo $data[0][0]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $data[0][0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $data[0][0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $data[0][1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $data[0][2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $data[0][3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $data[0][4]; ?>"/>
				<lastmod>2019-12-29</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.5</priority>
				</url>
      </br>
				</br>
				<url>
				<loc><?php echo $data[0][1]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $data[0][1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $data[0][0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $data[0][1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $data[0][2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $data[0][3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $data[0][4]; ?>"/>
				<lastmod>2019-12-29</lastmod><changefreq>daily</changefreq><priority>0.5</priority>
				</url>
      </br>
				</br>
				<url>
				<loc><?php echo $data[0][2]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $data[0][2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $data[0][0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $data[0][1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $data[0][2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $data[0][3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $data[0][4]; ?>"/>
				<lastmod>2019-12-29</lastmod><changefreq>daily</changefreq><priority>0.5</priority>
				</url>
      </br>
				</br>
				<url>
				<loc><?php echo $data[0][3]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $data[0][3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $data[0][0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $data[0][1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $data[0][2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $data[0][3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $data[0][4]; ?>"/>
				<lastmod>2019-12-29</lastmod><changefreq>daily</changefreq><priority>0.5</priority>
				</url>
      </br>
				</br>
				<url>
				<loc><?php echo $data[0][4]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $data[0][4]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $data[0][0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $data[0][1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $data[0][2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $data[0][3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $data[0][4]; ?>"/>
				<lastmod>2019-12-29</lastmod><changefreq>daily</changefreq><priority>0.5</priority>
				</url>
      </br>
    </br>

		<?php

		echo "</br></br>";
	}

*/

  //Save XML as a file
  echo $doc->save('sitemap.xml');
