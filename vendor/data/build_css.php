<?	header('Content-type: text/plain; charset=UTF-8');	include('catalog.php');	$lines = file('css.txt');	$map = array();	foreach($lines as $line){		if (preg_match('!\.(E[0-9A-F]{3}) \{ background-position\: 0px (-?\d+)px!', $line, $m)){			$map[hexdec($m[1])] = $m[2];		}	}	echo ".emoji { background: url(\"iphone_emoji.png\") top left no-repeat; width: 20px; height: 20px; display: -moz-inline-stack; display: inline-block; vertical-align: top; zoom: 1; *display: inline; }\n";	foreach ($catalog as $item){		$pos = $map[$item['softbank']['unicode'][0]];		$unilow = '';		foreach ($item['unicode'] as $cp) $unilow .= sprintf('%x', $cp);		if (isset($pos)){			echo ".emoji$unilow { background-position: 0px {$pos}px; }\n";		}else{			echo ".emoji$unilow { background-position: 0px -9200px; } /* placeholder */\n";		}	}?>