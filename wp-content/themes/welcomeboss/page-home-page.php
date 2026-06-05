<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package natalia
 */

get_header();
?>

		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'home' );
		endwhile; 
		?>

<section class="block2">
	<div class="menu2 content">
		<div class="done">
			<img src="<?php bloginfo('template_directory'); ?>/img/ic9.png">
			<img src="<?php bloginfo('template_directory'); ?>/img/time2.png">
			<a href="">скорость</a>
		</div>
		<div class="done">
			<img src="<?php bloginfo('template_directory'); ?>/img/ic10.png">
			<img src="<?php bloginfo('template_directory'); ?>/img/is10.png">
			<a href="">экономия</a>
		</div>
		<div class="done">
			<img id="white" src="<?php bloginfo('template_directory'); ?>/img/ic11.png">
			<img id="red" src="<?php bloginfo('template_directory'); ?>/img/is11.svg">
			<a href="">качество</a>
		</div>
		<div class="done">
			<img id="rod" src="<?php bloginfo('template_directory'); ?>/img/ic12.png">
			<img src="<?php bloginfo('template_directory'); ?>/img/is12.png">
			<a href="">надёжность</a>
		</div>
		<div class="done">
			<img src="<?php bloginfo('template_directory'); ?>/img/ic13.png">
			<img src="<?php bloginfo('template_directory'); ?>/img/is13.png">
			<a href="">скидки</a>
		</div>
	</div>
</section>

<section class="block3" >
	<div class="fit content" >
		<h2>Чем мы занимаемся </h2>
		 <div class="grid4" style="
    align-items: start;">
		 	<div class="pictures" id="pi1">
		 		<img src="<?php bloginfo('template_directory'); ?>/img/ic15.png">
		 		<a href="">Экскурсионное обслуживание</a>
		 			<a href="" class="set">Подробнее</a>
		 	</div>
		 	<div class="pictures" id="pi2">
		 		<img src="<?php bloginfo('template_directory'); ?>/img/ic16.png">
		 		<a href="">Транспортное<br> обслуживание</a>
		 		<a href="" class="set">Подробнее</a>
		 	</div>
		 	<div class="pictures" id="pi3">
		 		<img src="<?php bloginfo('template_directory'); ?>/img/ic17.png">
		 		<a href="">Визовая<br> поддержка</a>
		 		<a href="" class="set">Подробнее</a>
		 	</div>
		 	<div class="pictures" id="pi4">
		 		<img src="<?php bloginfo('template_directory'); ?>/img/ic18.png">
		 		<a href="">Организация<br> деловых мероприятий </a>
		 		<a href="" class="set">Подробнее</a>
		 	</div>
		</div>
	</div>
</section>


<section class="block4" >
	<div class="kart content">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon3.png" data-paroller-factor="0.5" data-paroller-type="foreground">
		<div class="text">
			<div class="text2">
			<h2>О компании</h2>
			<p>Welcome Boss – это успешная современная DMC-компания, основанная
 в 2015 году. Сегодня компания активно осуществляет свою деятельность 
в двух городах – Сочи и Екатеринбург.</p>
<p>Welcome Boss работает в сфере MICE и оказывает комплексные услуги 
по направлениям:</p>
<p>- Экскурсионное обслуживание на 7 языках (русский, английский, немецкий, французский, испанский, португальский, китайский).</p>
<p>- Транспортное обслуживание на всех видах автомобилей и автобусах.<br>
- Визовая поддержка для иностранных граждан.</p>
<p>- Организация деловых мероприятий: конференц-сервис, питание, гала-ужины.<br>
Основными принципами работы являются индивидуальный подход к каждому клиенту, ориентация на его задачи и достижение лучшего результата.</p>
<div class="aaa">
<a href="">Подробнее</a>
</div>
			</div>
		</div>
	</div>
</section>


<section class="block5" id="counts">
	<h2>Наши принципы</h2>
	<div class=" dov grid2 content">
		<div class="princ">
			<div class="nomer">
				<p>01.</p>
			</div>
			<p>Индивидуальный подход для каждого клиента.<br>
Наш главный приоритет - интересы и пожелания гостей</p>	
		</div>
		<div class="princ">
			<div class="nomer">
				<p>03.</p>
			</div>
			<p>Оперативность при выполнении работы по заказу</p>	
		</div>
		<div class="princ">
			<div class="nomer">
				<p>02.</p>
			</div>
			<p>Поддержка гостей 24/7 при подготовке и реализации заказа. 
Мобильная круглосуточная связь с нашими сотрудниками</p>	
		</div>
		<div class="princ">
			<div class="nomer">
				<p>04.</p>
			</div>
			<p>Единый договор на все виды услуг: размещение в отеле, 
экскурсионное и транспортное обслуживание, питание, 
круглосуточная поддержка менеджера во время выполнения заказа.</p>	
		</div>
	</div>
</section>



<section class="block6 content">
	<h2>Наши преимущества</h2>
	<div class="fine">
		<div class="fine2">
			<p>Организовано</p>
			<span class="spincrement">450</span>
			<p class="pix">экскурсий</p>
		</div>
		<div class="fine2">
			<p>опыт работы с</p>
			<span class="spincrement">2011</span>
			<p class="pix">года в сфере mice</p>
		</div>
		<div class="fine2">
			<p>для</p>
			<span class="spincrement">250</span>
			<p class="pix">клиентов</p>
		</div>
		<div class="fine2">
			<p>работают </p>
			<span class="spincrement">15</span>
			<p class="pix">сотрудников </p>
		</div>
	</div>
</section>

<section class="block7 content">
	<h2>Ваши выгоды</h2>
	<div class="vigod">
		<div class="vig">
			<p class="zero">01.</p>
			<img src="<?php bloginfo('template_directory'); ?>/img/ic19.png">
			<img src="<?php bloginfo('template_directory'); ?>/img/ic9.png">
			<p><strong>Скорость</strong><br>
		      Быстрая и качественная подготовка и реализация заказа.</p>
		</div>
		<div class="vig">
			<p class="zero">02.</p>
			<img src="<?php bloginfo('template_directory'); ?>/img/rub.png">
			<img src="<?php bloginfo('template_directory'); ?>/img/ic10.png">
			<p><strong>Экономия</strong><br>
		      Благодаря соглашениям и договорам с основными поставщиками услуг мы готовы предложить нашим клиентам самые привлекательные цены</p>
		</div>
		<div class="vig">
			<p class="zero">03.</p>
			<img class="size" src="<?php bloginfo('template_directory'); ?>/img/ic20.png">
			<img class="size" src="<?php bloginfo('template_directory'); ?>/img/ic11.png">
			<p><strong>Качество</strong><br>
		      Компания дорожит своей репутацией, поэтому более 3-х лет, наши зарубежные гости в 99% случаев получают визы в РФ по нашим приглашениям.</p>
		</div>
		<div class="vig">
			<p class="zero">04.</p>
			<img class="size" src="<?php bloginfo('template_directory'); ?>/img/ic21.png">
			<img class="size" src="<?php bloginfo('template_directory'); ?>/img/ic13.png">
			<p><strong>Скидки </strong><br>
		      Для постоянных клиентов мы готовы предложить гибкую систему скидок <br>
<span>до 10%</span></p>
		</div>
	</div>
	<div class="aa">
<a href="">Посмотреть презентацию</a>
    </div>
</section>


<section class="block8">
	<h2>Нам доверяют</h2>
	<div class="bank content">
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		<div class="bord">
		<img src="<?php bloginfo('template_directory'); ?>/img/fon6.png">
		</div>
		
	</div>
</section>



<section class="block9 content">
	<h2>Новости</h2>
	<div class="news">
		<div class="news2">
			<div class="fond">
			  <div class="draw">
				<a href="">20 августа 2018</a>
			  </div>
		    </div>
			<h3>Lorem ipsum dolor sit amet, consectetur adipisic</h3>
			<p>ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
			<div class="true">
				<img class="start" src="<?php bloginfo('template_directory'); ?>/img/ic22.png">
				<a href="">Подробнее</a>	
			</div>
		</div>	
		<div class="news2">
			<div class="fond2">
			  <div class="draw">
				<a href="">20 августа 2018</a>
			  </div>
		    </div>
			<h3>Lorem ipsum dolor sit amet, consectetur adipisic</h3>
			<p>ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
			<div class="true">
				<img class="start" src="<?php bloginfo('template_directory'); ?>/img/ic22.png">
				<a href="">Подробнее</a>	
			</div>
		</div>	
		<div class="news2">
			<div class="fond3">
			  <div class="draw">
				<a href="">20 августа 2018</a>
			  </div>
		    </div>
			<h3>Lorem ipsum dolor sit amet, consectetur adipisic</h3>
			<p>ing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
			<div class="true">
				<img class="start" src="<?php bloginfo('template_directory'); ?>/img/ic22.png">
				<a href="">Подробнее</a>	
			</div>
		</div>	
	</div>
</section>



<section class="block10 content">
	<div class="find">
		<div class="txt">
	<h2>мы находимся</h2>
	<p>Филиалы компании Welcome Boss находятся в Сочи
 и Екатеринбурге и организуют обзорные экскурсии 
на территории «Большого Сочи» и «Большого Урала». 
В Сочи и Екатеринбурге расположены не только одни 
из самых живописных уголков нашей страны, но 
и удобные транспортные развязки, развитые ЖД сети 
и международные аэропорты, что позволяет нашим 
гостям добираться быстро и с комфортом.</p>
<p>Регулярная правительственная поддержка в этих городах дает все необходимое для проведения деловых мероприятий на самом высоком уровне. Развитая ресурсная туристическая база, которую составляют отели, транспортная сеть, достопримечательности и заботливо сохраненное историческое наследие создают прекрасную почву для работы и отдыха одновременно. Компания 
Welcome Boss создаст все условия для комфортного пребывания Вас и Ваших гостей.</p>
	</div>
<div class="map">
	<div class="city">
		<div class="city2">
			<img src="<?php bloginfo('template_directory'); ?>/img/ic23.png">
			<p>Сочи</p>
		</div>
		<div class="city2">
			<img src="<?php bloginfo('template_directory'); ?>/img/ic23.png">
			<p>Екатеринбург</p>
		</div>
	</div>
</div>
</div>
</section>

<section class="block11">
	<img src="<?php bloginfo('template_directory'); ?>/img/fon5.png">
	<div class="answer content">
		<div class="two">
			<p>Остались вопросы?</p>
			<p>Закажите обратный звонок и получите подробную консультацию</p>
		</div>
		<div class="fam">
		<a href="">Заказать обратный звонок</a>
	</div>	
</div>
</section>




<?php
get_footer();