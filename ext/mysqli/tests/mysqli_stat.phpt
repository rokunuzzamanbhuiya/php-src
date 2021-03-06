--TEST--
mysqli_stat()
--SKIPIF--
<?php
require_once('skipif.inc');
require_once('skipifemb.inc');
require_once('skipifconnectfailure.inc');
?>
--FILE--
<?php
	require_once("connect.inc");

	require('table.inc');

	if ((!is_string($tmp = mysqli_stat($link))) || ('' === $tmp))
		printf("[004] Expecting non empty string, got %s/'%s', [%d] %s\n",
			gettype($tmp), $tmp, mysqli_errno($link), mysql_error($link));

	mysqli_close($link);

	if (false !== ($tmp = mysqli_stat($link)))
		printf("[005] Expecting false, got %s/%s\n", gettype($tmp), $tmp);

	print "done!";
?>
--EXPECTF--
Warning: mysqli_stat(): Couldn't fetch mysqli in %s on line %d
done!
