<rss xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:wfw="http://wellformedweb.org/CommentAPI/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
  <channel>
    <title><?= \Kirby\Toolkit\Xml::encode($title) ?></title>
    <link><?= \Kirby\Toolkit\Xml::encode($link) ?></link>
    <lastBuildDate><?= $modified ?></lastBuildDate>
    <atom:link href="<?= \Kirby\Toolkit\Xml::encode($feedurl) ?>" rel="self" type="application/rss+xml" />
    <?php if ($description && is_string($description) && strlen(trim($description)) > 0): ?>
      <description><?= \Kirby\Toolkit\Xml::encode($description) ?></description>
    <?php endif; ?>
    <?php foreach ($items as $item): ?>
      <item>
        <title><?= \Kirby\Toolkit\Xml::encode($item->{$titlefield}()) ?></title>
        <link><?= \Kirby\Toolkit\Xml::encode($item->{$urlfield}()) ?></link>
        <guid><?= \Kirby\Toolkit\Xml::encode($item->url()) ?></guid>
        <pubDate><?= $datefield === 'modified' ? $item->modified('r', 'date') : date('r', $item->{$datefield}()->toTimestamp()) ?></pubDate>
        <?php $description = "<img alt='journal for " . $item->{$titlefield}() . "' src='" . $item->images()->first()->url() . "'>"; ?>
        <description><?= \Kirby\Toolkit\Xml::encode($description) ?></description>
      </item>
  <?php endforeach; ?>
  </channel>
</rss>
