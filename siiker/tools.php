<?php
class siiker_tools
{
	public static function getPermalink($command,$param,$needperma=false)
	{
		if (false) //($needperma==true)
		{
			$paramstr='';
			foreach($param['on'] as $parname => $parvalue)
			{
				$paramstr.='/'.$parvalue;
			}
			return '/'.$command.$paramstr;
		}
		else
		{
			$paramstr='';
			foreach($param['off'] as $parname => $parvalue)
			{
				$paramstr.='&'.$parname.'='.$parvalue;
			}
			return $_SERVER['PHP_SELF'].'?com='.$command.$paramstr;
		}
	}
}
?>