<?php

class GoogleHelper extends AppHelper
{
	//--------------------------------------------------------------------------
	public $helpers = array('Html');
	
	
	//--------------------------------------------------------------------------
	public function initTracker()
	{
	    if (Configure::read('debug') > 0) {
			return;
		}
		
		$trackCode = Configure::read('Google.tracking');
		
		$script  = "
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '{$trackCode}']);
		_gaq.push(['_trackPageview']);";
		
		return $this->Html->scriptBlock($script, array('inline' => true));
	}
	
	
	//--------------------------------------------------------------------------
	public function endTracker()
	{
		if (Configure::read('debug') > 0) {
			return;
		}
		
		$script = "
        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();";
		
		return $this->Html->scriptBlock($script, array('inline' => true));
	}
}

