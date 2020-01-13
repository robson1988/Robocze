<?php

$data = array_map('str_getcsv', file('Linki-test.csv'));

if(count($data)> 0 ) {
print_r($data);
echo "<?xml version='1.0' encoding='UTF-8'?>
<urlset xmlns='http://www.sitemaps.org/schemas/sitemap/0.9'
  xmlns:xhtml='http://www.w3.org/1999/xhtml'>";

	foreach($data as $link) {
	?>
				<url>
				<loc><?php echo $link[0]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $link[0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $link[0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $link[1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $link[2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $link[3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $link[4]; ?>"/>
				<lastmod>2019-12-29</lastmod><changefreq>daily</changefreq><priority>0.5</priority>
				</url>
      </br>
				</br>
				<url>
				<loc><?php echo $link[1]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $link[1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $link[0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $link[1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $link[2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $link[3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $link[4]; ?>"/>
				<lastmod>2019-12-29</lastmod><changefreq>daily</changefreq><priority>0.5</priority>
				</url>
      </br>
				</br>
				<url>
				<loc><?php echo $link[2]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $link[2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $link[0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $link[1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $link[2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $link[3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $link[4]; ?>"/>
				<lastmod>2019-12-29</lastmod><changefreq>daily</changefreq><priority>0.5</priority>
				</url>
      </br>
				</br>
				<url>
				<loc><?php echo $link[3]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $link[3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $link[0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $link[1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $link[2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $link[3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $link[4]; ?>"/>
				<lastmod>2019-12-29</lastmod><changefreq>daily</changefreq><priority>0.5</priority>
				</url>
      </br>
				</br>
				<url>
				<loc><?php echo $link[4]; ?></loc>
				<xhtml:link rel="canonical" href="<?php echo $link[4]; ?>"/>
				<xhtml:link rel="alternate" hreflang="pl" href="<?php echo $link[0]; ?>"/>
				<xhtml:link rel="alternate" hreflang="en" href="<?php echo $link[1]; ?>"/>
				<xhtml:link rel="alternate" hreflang="de" href="<?php echo $link[2]; ?>"/>
				<xhtml:link rel="alternate" hreflang="it" href="<?php echo $link[3]; ?>"/>
				<xhtml:link rel="alternate" hreflang="ru" href="<?php echo $link[4]; ?>"/>
				<lastmod>2019-12-29</lastmod><changefreq>daily</changefreq><priority>0.5</priority>
				</url>
      </br>
    </br>

		<?php

		echo "</br></br>";
	}




echo "</urlset>";
 } else {} ?>
