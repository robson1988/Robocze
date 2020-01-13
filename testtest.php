

<?php
$data = array_map('str_getcsv', file('linki-test.csv'));

$doc = new DOMDocument('1.0');
$doc->formatIutput = true;

$root = $doc->createElement('urlset');

foreach($data as $link) {
$url = $doc ->createElement('url');
  $url = $root ->appendChild($url);
    $loc = $doc->createElement('loc');
    $loc = $url->appendChild($loc);
      $link = $doc->createTextNode($link[0]);
      $link = $loc->appendChild($link);
 $xhtml = $doc->createElement('xhtml');
    $xhtml = $loc->appendChild($xhtml);
$changefreq = $doc->createElement('changefreq');
  $changefreq = $loc->appendChild($changefreq);
  $priority = $doc->createElement('priority');
  $priority = $loc->appendChild($priority);
}
$root = $doc->appendChild($root); //na zakonczenie skryptu

//Save XML as a file
echo $doc->save('sitemap.xml');
