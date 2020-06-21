{!! '<'.'?'.'xml version="1.0" encoding="UTF-8" ?>' !!}
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:webfeeds="http://webfeeds.org/rss/1.0" xmlns:media="http://search.yahoo.com/mrss/">
  <channel>
    <title>Best of Laravel</title>
    <link>https://bestoflaravel.com</link>
    <description><![CDATA[Best of Laravel - One Place to Know All Thing Laravel]]></description>
    <copyright>Simplest Web © {{ date('Y') }} · All Rights reserved</copyright>
    <category domain="bestoflaravel.com">Computers/Software/Internet/Laravel/PHP/Web Development</category>
    <managingEditor>adi@simplestweb.in (Adi)</managingEditor>
    <webMaster>adi@simplestweb.in (Adi)</webMaster>
    <atom:link href="https://bestoflaravel.com/rss.xml" rel="self" type="application/rss+xml" />
    <webfeeds:accentColor>003E53</webfeeds:accentColor>
    <webfeeds:cover image="https://bestoflaravel.com/images/logo.jpg" />
    <webfeeds:icon>https://bestoflaravel.com/images/logo.png</webfeeds:icon>
    <webfeeds:logo>https://bestoflaravel.com/images/logo.png</webfeeds:logo>
    <image>
      <url>https://bestoflaravel.com/images/logo.png</url>
      <title>Best of Laravel</title>
      <link>https://bestoflaravel.com</link>
    </image>
    <webfeeds:related layout="card" target="browser" />
    <language>en-IN</language>
    <lastBuildDate>{{ $links[0]->created_at->format(DateTime::RSS) }}</lastBuildDate>

    @foreach($links as $link)
      <item>
        <title><![CDATA[{!! $link->title !!}]]></title>
        <link>{{ route('pages.go', $link) }}</link>
        <guid isPermaLink="true">{{ route('pages.go', $link) }}</guid>
        <description><![CDATA[{!! $link->description !!}]]></description>
        <pubDate>{{ $link->created_at->format(DateTime::RSS) }}</pubDate>
      </item>
    @endforeach
  </channel>
</rss>
