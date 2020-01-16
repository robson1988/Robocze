<?php

$data = array_map('str_getcsv', file('Linki.csv', FILE_SKIP_EMPTY_LINES));

$doc = new DOMDocument('1.0');
$doc->formatOutput=true;

$root = $doc->createElement('urlset');
$doc->appendChild($root); 

foreach($data as $z => $link) {

foreach ($link as $y => $value) {
	if($y == 5) { break;} else {
		
	if( !isset($link[$z]) ) $link[$z] = '' ;
	
	
    $url = $doc->createElement('url');
    $root->appendChild($url);

    $loc = $doc->createElement('loc',$link[$y]);
    $url->appendChild($loc);
	
	$xmlink = $doc->createElement('xhtml:link','rel="canonical" href="'.$link[$y].'"/>;');
	$url->appendChild($xmlink);
	$xmlink = $doc->createElement('xhtml:link','rel="alternate" hreflang="pl" href="'.$link[0].'"/>;');
	$url->appendChild($xmlink);
	$xmlink = $doc->createElement('xhtml:link','rel="alternate" hreflang="en" href="'.$link[1].'"/>;');
	$url->appendChild($xmlink);
	$xmlink = $doc->createElement('xhtml:link','rel="alternate" hreflang="de" href="'.$link[2].'"/>;');
	$url->appendChild($xmlink);
	$xmlink = $doc->createElement('xhtml:link','rel="alternate" hreflang="it" href="'.$link[3].'"/>;');
	$url->appendChild($xmlink);
	$xmlink = $doc->createElement('xhtml:link','rel="alternate" hreflang="ru" href="'.$link[4].'"/>;');
	$url->appendChild($xmlink);
	
    $changefreq = $doc->createElement('changefreq','daily');
    $url->appendChild($changefreq);

    $priority = $doc->createElement('priority',$link[5]);
    $url->appendChild($priority);

	}
  }
}

  //Save XML as a file
  echo $doc->save('sitemap.xml');
