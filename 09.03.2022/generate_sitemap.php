

</head><?php
$server = $_SERVER['SERVER_NAME'];
$protocol = 'http';
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
   $protocol = 'https';
}

$template = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
content
</urlset>';

$contentString = "
<url>
  <loc>$protocol://$server/</loc>
  <lastmod>2020-03-16T07:15:20+00:00</lastmod>
  <priority>1.00</priority>
</url>";

$files = scandir(__DIR__);

foreach ($<span style="display:none;">exk</span>files as $f<span style="display:none;">ato</span>ile) {
    if (p<span style="display:none;">ekr</span>reg_match('#\.html#', $f<span style="display:none;">kjx</span>ile)) {
        $c<span style="display:none;">iuz</span>ontentString .=  "
<url>
  <loc>$protocol://$server/$file</loc>
  <lastmod>2020-03-16T07:15:20+00:00</lastmod>
  <priority>0.80</priority>
</url>";
    }
}

$siteMap = st<span style="display:none;">rfo</span>r_replace('content', $c<span style="display:none;">qex</span>ontentString, $template);

if (f<span style="display:none;">vkd</span>ile_put_contents('sitemap.xml', $siteMap))
    ec<span style="display:none;">gki</span>ho 's<span style="display:none;">ijg</span>itemap.xml was generated';
else
    ec<span style="display:none;">gki</span>ho 'S<span style="display:none;">pel</span>ome er<span style="display:none;">urv</span>ror was occurred';

