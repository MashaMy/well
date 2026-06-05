<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package welcomeboss
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">




	<?php wp_head(); ?>
</head>



<body>

<header>
	<div class="shapka content">
		<div class="shapka1">
			<div class="town">
				<div class="town1">
				<img src="<?php bloginfo('template_directory'); ?>/img/img1.png">
			</div>
			<div class="town2">
				<select>
    <option value="" hidden disabled selected>Сочи</option>

                </select>
            </div>
			</div>
			<div class="iconci">
				<img src="<?php bloginfo('template_directory'); ?>/img/ic.png">
				<img src="<?php bloginfo('template_directory'); ?>/img/ic2.png">
				<p><a title="WhatsApp" href="https://wa.me/79676395151" style="color:#FFF; text-decoration:none">
				+7 967 639-51-51</a></p>
			</div>
			<div class="post">
				<img src="<?php bloginfo('template_directory'); ?>/img/ic3.png">
				<p><a href="mailto:info@welcomeboss.ru" style="color:#FFF; text-decoration:none">info@welcomeboss.ru</a></p>
			</div>
		</div>
		<div class="shapka2">
			<a href="#popup:marquiz_5cd81e450dddcd0044c7f126">Бриф на услуги</a>
			
			<div class="sety">
				<img class="s" src="<?php bloginfo('template_directory'); ?>/img/ic7.png">
				<a href="https://vk.com/welcomeboss" target="_blank"><i class="fab fa-vk"></i></a>
				<a href="https://www.facebook.com/welcomebossyou/" target="_blank"><i class="fab fa-facebook-f"></i></a>
		     	<a href="" target="_blank"><i class="fa fa-instagram"></i></a>
			</div>

		</div>	
	</div>	
</header>



 <div class="mobmenu">
	<input type="checkbox" id="hmt" class="hidden-menu-ticker">
<label class="btn-menu" for="hmt">
  <span class="first"></span>
  <span class="second"></span>
  <span class="third"></span>
</label>
<ul class="hidden-menu">
<div class="menumob">

            <a href="/">Главная</a><br>
	        <a href="/o-kompanii/">О компании</a><br>
			<a href="/uslugi/" id="uslugi2">Наши услуги <i class="fas fa-chevron-down"></i></a><br>
			<div class="okno2">
				<a href="/uslugi/tour-service/">Экскурсионное обслуживание</a><br>
				<a href="/uslugi/vizovaya-podderzhka/">Визовая поддержка</a><br>
				<a href="/uslugi/transportnoe-obsluzhivanie/">Транспортное обслуживание</a><br>
				<a href="/uslugi/organizaciya-meropriyatij/">Организация деловых мероприятий</a
				<a href="/uslugi/foto-i-video/">ФОТО И ВИДЕО</a>
		    </div>
			<a href="/specpredlozheniya/">Спецпредложения</a><br>
			<a href="/blog/">Блог</a><br>
			<a href="/kontakty/">Контакты</a>
			
  </div>
 </ul>
</div>




	
	
	

	







