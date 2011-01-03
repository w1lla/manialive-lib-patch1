<?php

namespace ManiaLive\Data;

class Event extends \ManiaLive\Event\Event
{
	const ON_PLAYER_NEW_BEST_TIME = 1;
	const ON_PLAYER_NEW_RANK = 2;
	const ON_PLAYER_NEW_BEST_SCORE = 3;
	
	protected $onWhat;
	protected $params;
	
	function __construct($source, $onWhat, $params = array())
	{
		parent::__construct($source);
		$this->onWhat = $onWhat;
		$this->params = $params;
	}
	
	function fireDo($listener)
	{
		$method = null;
		
		switch($this->onWhat)
		{
			case self::ON_PLAYER_NEW_BEST_TIME: $method = 'onPlayerNewBestTime'; break;
			case self::ON_PLAYER_NEW_RANK: $method = 'onPlayerNewRank'; break;
			case self::ON_PLAYER_NEW_BEST_SCORE: $method = 'onPlayerNewBestScore'; break;
		}
		
		if ($method != null)
			call_user_func_array(array($listener, $method), $this->params);
	}
}
?>