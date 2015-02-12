<?php

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

// Get the breadcrumbs
$list	= modTzGoogleMapHelper::getTzGoogleMap($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
require JModuleHelper::getLayoutPath('mod_tz_google_map', $params->get('layout', 'default'));