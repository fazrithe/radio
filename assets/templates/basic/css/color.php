<?php
header("Content-Type:text/css");
if (isset($_GET['color1']) && $_GET['color1'] != '') {
    $color1 = "#" . $_GET['color1'];
}
if (isset($_GET['color2']) && $_GET['color2'] != '') {
    $color2 = "#" . $_GET['color2'];
}

function checkhexcolor1($color1)
{
    return preg_match('/^#[a-f0-9]{6}$/i', $color1);
}

function checkhexcolor2($color2)
{
    return preg_match('/^#[a-f0-9]{6}$/i', $color2);
}

if (!$color1 || !checkhexcolor1($color1)) {
    $color1 = "#ea0117";
}

if (!$color2 || !checkhexcolor2($color2)) {
    $color2 = "#ea0117";
}

?>
.btn--base , .custom--tab .nav-item .nav-link.active , .btn--base:hover , .rj-single .thumb .social-links li a , .social-links-list li a , .scroll-to-top , .audio-player.style--two .play-container, .pagination .page-item.active .page-link , .date-select-form .date-select-btn,.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight{
background:<?php echo $color1; ?>
}
.text--base , .footer-short-list li a:hover , .preloader__inner .logo-area .logo-name{
color: <?php echo $color1 . ' !important'; ?>
}

.controls .right{
background-color : <?php echo $color1; ?>
}

.custom--tab .nav-item .nav-link.active,.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight{
border-color: <?php echo $color1; ?>
}

.header.menu-fixed .header__bottom , .header .site-logo, .footer::before{
background-color:<?php echo $color2 . ' !important'; ?>
}