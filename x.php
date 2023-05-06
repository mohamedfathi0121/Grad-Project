<?php

$job_title = array();
foreach ($_POST as $key => $value)
{
	if ($value != "0" AND $value != "1" AND !empty($value))
	{
		$user_array = explode("-", $key);
		if (!empty($user_array[1]))
		{
			$job_title[$user_array[1]] = $value;
		}
	}
}

echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "<pre>";
print_r($job_title);
echo "</pre>";

$formation_users = array(2);
foreach ($_POST as $key => $value)
{
	if (in_array($key, $formation_users))
	{
		switch ($value)
		{
			# User should be in the formation
			case "1":
				$if1 = array($key => $value);
				break;

			case "0":
				$if0 = array($key=>$value);
				break;
		}
	}
	elseif ($value = 1)
	{
		$key = (int)$key;
		$elseif = array($key=>$value);

	}
}

echo "<pre>";
print_r($if1);
echo "</pre>";

echo "<pre>";
print_r($if0);
echo "</pre>";

echo "<pre>";
print_r($elseif);
echo "</pre>";