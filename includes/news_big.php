<?php
if(isset($version) && $version == "old"){
?>
<div class="habblet-container">
<div class="cbb clearfix orange ">
<h2 class="title">In primo piano
</h2>
<div id="hotcampaigns-habblet-list-container">
<ul id="hotcampaigns-habblet-list">
<ul class="habblet-list two-cols clearfix">
<ul id="hotcampaigns-habblet-list">
<?php
$sql = mysql_query("SELECT * FROM cms_news_slider ORDER BY id DESC LIMIT 5");
$i = 0;

while($news = mysql_fetch_assoc($sql)){
$i++;
$even = $input->IsEven($i) ? "odd" : "even";
?>
<li class="<?php echo $even; ?>">
<div class="hotcampaign-container">
<?php
	if($news['button_enable'] == "1")
		echo '<a href="'.$news['link_button'].'" target="_blank"><img src="'.$news['image'].'" align="left" width="160" height="62"/></a>';
	else
		echo '<img src="'.$news['image'].'" align="left" width="160" height="62"/>';

	echo '<h3>'.$news['title'].'</h3><p>'.$news['shortstory'].'</p>';

	if($news['button_enable'] == "1")
		echo '<p class="link"><a href="'.$news['link_button'].'" target="_blank">'.$news['button_title'].'</a></p>';
?>
</div>
</li>
<?php } ?>
</ul>
</div>
</div>
</div>
<script type="text/javascript">if (!$(document.body).hasClassName('process-template')) { Rounder.init(); }</script>
<?php } else { if($mestyle['type'] == 'old'){ ?>
<link rel="stylesheet" href="<?php echo PATH; ?>web-gallery/static/styles/lightweightmepage_old.css" type="text/css" />
<?php } else { ?>
<link rel="stylesheet" href="<?php echo PATH; ?>web-gallery/static/styles/lightweightmepage.css" type="text/css" />
<?php } ?>
<script src="<?php echo PATH; ?>web-gallery/static/js/lightweightmepage.js" type="text/javascript"></script>

<div id="promo-box">

    <div id="promo-bullets"></div>

<?php
$sql = mysql_query("SELECT * FROM cms_news_slider ORDER BY id DESC LIMIT 5");
$i = 0;

while($news = mysql_fetch_assoc($sql)){
$i++;
?>
    <div class="promo-container" style="background-image: url(<?php echo $news['image'].")".($i > 1 ? ";display: none" : ""); ?>">
        <div class="promo-content-container">
            <div class="promo-content">
                <div class="title"><?php echo $news['title']; ?></div>
                <div class="body"><?php echo $news['shortstory']; ?></div>
            </div>
        </div>

		<div class="promo-link-container">
			<div class="enter-hotel-btn">
				<div class="open enter-btn">
					<?php
					if($news['button_enable'] == "1")
						echo '<a style="padding: 0 8px 0 18px;" target="_blank" href="'.$news['link_button'].'">'.$news['button_title'].'</a><b></b>';
					?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</div>

<script type="text/javascript">document.observe("dom:loaded", function() { PromoSlideShow.init(); });</script>
<?php } ?>