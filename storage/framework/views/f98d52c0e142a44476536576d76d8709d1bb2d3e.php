<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo e(MetaTag::get('title')); ?></title>
    <?php echo MetaTag::tag('description'); ?>

    <?php echo MetaTag::tag('keywords'); ?>

    <?php echo MetaTag::get('image') ? MetaTag::tag('image') : ''; ?>

    <?php echo MetaTag::openGraph(); ?>

    <?php echo MetaTag::twitterCard(); ?>

    <style>
        body {
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<body class=" <?php if(Request::route('theme') == 'light'): ?> light-theme <?php endif; ?> ">
<script>
    var youtube_api_key = '<?php echo e(config('settings.youtube_api_key')); ?>';
    var youtube_search_endpoint = '<?php echo e(route('frontend.song.stream.youtube', ['id' => 'SONG_ID'])); ?>';
</script>
<?php if(Request::route('type') != 'station'): ?>
<script type="text/javascript" src="<?php echo e(asset('embed/embed.js?preload=true&type=' . Request::route('type') . '&icon_set=radius&id=' . Request::route('id') . '&skin=widget&visualizer=true&visualizerColor=' . (Request::route('theme') == 'light' ? '555' : 'fff'))); ?>"></script></body>
<?php else: ?>
    <script type="text/javascript" src="<?php echo e(asset('embed/embed.js?preload=true&type=' . Request::route('type') . '&icon_set=radius&id=' . Request::route('id') . '&skin=widget')); ?>"></script></body>
<?php endif; ?>
</html><?php /**PATH C:\laragon\www\live-streaming\resources\views\frontend\default/share/embed.blade.php ENDPATH**/ ?>