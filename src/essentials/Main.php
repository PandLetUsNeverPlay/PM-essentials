<?php

//Copyright © 2021 LePandiLP
//YouTube: https://youtube.com/channel/UCiOrt51MGXG9L3I5QM3Bq9Q
//Github: https://github.com/LePandiLP
//Discord: LePandiLP#9036

namespace essentials;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\Config;

class Main extends PluginBase{

	public function onEnable(){
		$this->getLogger()->info("was enabled!");
		$this->getLogger()->info("This plugin is coded by LePandiLP \nhttps://youtube.com/channel/UCiOrt51MGXG9L3I5QM3Bq9Q");
		
		@mkdir($this->getDataFolder());
		
		$this->saveResource("config.yml");
		$this->saveDefaultConfig();
	}
	
	public function onDisable(){
		$this->getLogger()->info("was disabled");
	}
	
	public function onCommand(CommandSender $s, Command $cmd, string $label, array $args) : bool{
		switch($cmd->getName()){
		
		case "gm":
			if(!$s instanceof Player){
				$s->sendMessage("Use this command In-Game!");
			}
			
			if(!$s->hasPermission("gm.command")){
				$s->sendMessage($this->getConfig()->get("no-permission"));
			}
			
			if(empty($args[1])){
				if(!isset($args[0])){
					$s->sendMessage($this->getConfig()->get("gm-wrong-usage"));
				}
			}
			if(strtolower($args[0] === "0")){
				$s->sendMessage($this->getConfig()->get("gm0-message"));
				$s->setGamemode(0);
			}
			if(strtolower($args[0] === "1")){
				$s->sendMessage($this->getConfig()->get("gm1-message"));
				$s->setGamemode(1);
			}
			if(strtolower($args[0] === "2")){
				$s->sendMessage($this->getConfig()->get("gm2-message"));
				$s->setGamemode(2);
			}
			if(strtolower($args[0] === "3")){
				$s->sendMessage($this->getConfig()->get("gm3-message"));
				$s->setGamemode(3);
			}
		break;
		
		case "day":
			if($s instanceof Player){
				if($s->hasPermission("time.command")){
					$s->getLevel()->setTime(6000);
					$s->sendMessage($this->getConfig()->get("day-message"));
				}else{
					$s->sendMessage($this->getConfig()->get("no-permission"));
				}
			}else{
				$s->sendMessage("Use this command In-Game!");
			}
		break;
		
		case "night":
			if($s instanceof Player){
				if($s->hasPermission("time.command")){
					$s->getLevel()->setTime(16000);
					$s->sendMessage($this->getConfig()->get("night-message"));
				}else{
					$s->sendMessage($this->getConfig()->get("no-permission"));
				}
			}else{
				$s->sendMessage("Use this command In-Game!");
			}
		break;
		
		case "feed":
			if($s instanceof Player){
				if($s->hasPermission("feed.command")){
					$s->setFood(20);
					$s->sendMessage($this->getConfig()->get("feed-message"));
				}else{
					$s->sendMessage($this->getConfig()->get("no-permission"));
				}
			}else{
				$s->sendMessage("Use this command In-Game!");
			}
		break;
		
		case "heal":
			if($s instanceof Player){
				if($s->hasPermission("heal.command")){
					$s->setHealth(20);
					$s->sendMessage($this->getConfig()->get("heal-message"));
				}else{
					$s->sendMessage($this->getConfig()->get("no-permission"));
				}
			}else{
				$s->sendMessage("Use this command In-Game!");
			}
		break;
		
		case "chatclear":
			if($s instanceof Player){
				if($s->hasPermission("chatclear.command")){
					$this->getServer()->broadcastMessage("\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n");
					sleep(1);
					$this->getServer()->broadcastMessage("§cThe chat has been cleared!");
				}else{
					$s->sendMessage($this->getConfig()->get("no-permission"));
				}
			}else{
				$s->sendMessage("Use this command In-Game!");
			}
		break;
		}
	return true;
	}
}
