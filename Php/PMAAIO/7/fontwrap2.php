<?php
function fontWrap($txt,$fontsize = "12pt")
{
	echo "<span style=\"font-size:$fontsize\">".$txt."</span>";
}
fontWrap("A Heading<br/>","24pt");
fontWrap("some body text<br/>");
fontWrap("smaller body text<br/>");
fontWrap("even smaller body text<br/>");
?>
