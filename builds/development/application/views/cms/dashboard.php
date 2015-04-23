<section class="cmspg contentinner">

	<h1>Hello <?php echo $this->session->userdata('name') ?>, welcome to Edible.</h1>

	<p class="intro">This is your main dashboard. From the menu above you can choose the content you want to add or edit, and below you can see some Google Analytics data about your site traffic this month.</p>

	<div class="visits chartholder">
		<h2>New/Returning Visitors<br><br></h2>
		<div class="chart">
			<canvas id="chart-area"/>
		</div>
		<p>This chart represents the ratio of new users this month compared to returning visitors from previous months.</p>
	</div>
	<div class="sessions chartholder">
		<h2>Sessions, Page Views, and Bounce Rate</h2>
		<div class="chart">
			<canvas id="chart-area2"/>
		</div>
		<p>Here you can see aggregated data about user behavior on your site this month. Sessions are discreet periods of activity from a specific user, indicating a roughly 30min period of activity. Page views are the number of pages viewed by all users this month, and the bounce rate indicates the number of users who arrived at your site and left almost immediately. This number should be as low as possible.</p>
	</div>

	<div class="history chartholder">
		<h2>Monthly History</h2>
		<div class="4monthchart">
			<canvas id="4month"/>
		</div>
		<p>This represents traffic over the past 4 months. With this chart you can track your growth as you market the site. The white line indicates the number of page views over time, and the blue line indicates unique visitors per month over time.</p>
	</div>

</section>