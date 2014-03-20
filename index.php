<?php
////////////////////////////////////////////////////////////////////////////
// SCHEDULE MAKER
//
// @author	Ben Russell (benrr101@csh.rit.edu)
//
// @file	index.php
// @descrip	Index page for schedule maker. Displays a static home page with
//			links to everything.
////////////////////////////////////////////////////////////////////////////

// If the link is to ?s=yadayada Redirect to the schedule page
if(isset($_GET['s'])) {
	require_once("./inc/config.php");
	header("Location: {$HTTPROOTADDRESS}schedule.php?mode=old&id={$_GET['s']}");
	die();
} 

require "./inc/header.inc";
?>
<div class="container">
	<?php if($SERVER_TYPE != 'production') { ?>
	<div class="alert alert-info alert-dismissable hidden-xs" ng-show="state.ui.alert_betaInfo">
		<button type="button" class="close" aria-hidden="true" ng-click="state.ui.alert_betaInfo = false"><i class="fa fa-times"></i></button>
		<strong>Thanks</strong> for testing the new beta of ScheduleMaker! <strong>Please report any bugs</strong> you find to our github page <a target="_blank" href="https://github.com/ComputerScienceHouse/schedulemaker/issues">here</a> or email <a target="_blank" href="mailto:schedule-issues@csh.rit.edu">schedule-issues@csh.rit.edu</a> (Please try to use github if you can, it makes everything easier for us). Your reports are greatly apreciated!
	</div>
	<? } ?>
	<div class="alert alert-success alert-dismissable hidden-xs" ng-show="state.ui.alert_newFeatures">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" ng-click="state.ui.alert_newFeatures = false"><i class="fa fa-times"></i></button>
		Welcome to the new ScheduleMaker! We've added lots of new functionality to the website, including full mobile support, a brand-new interface, a new course cart and search system, and RateMyProfessors integration. Check out the <a href="/help.php">help</a> page for more info. Enjoy!
	</div>
	<div id="mainMenu" class="row">
		<div class="col-xs-4">
			<div class="navItem">
				<a href="generate.php"><i class="fa fa-calendar"></i></a>
				<div><a href="generate.php">Make a Schedule</a></div>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="navItem">
				<a href="browse.php"><i class="fa fa-list"></i></a>
				<div><a href="browse.php">Browse Courses</a></div>
			</div>
		</div>
		<div class="col-xs-4">
			<div class="navItem">
				<a href="search.php"><i class="fa fa-search"></i></a>
				<div><a href="search.php">Search Courses</a></div>
			</div>
		</div>
	</div>
</div>
<? require "./inc/footer.inc"; ?>
