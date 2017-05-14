<?php

namespace MultiWorld;

use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class MultiWorld extends PluginBase implements Listener{
  public $worlds = [];
  
  
  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    @mkdir($this->getDataFolder());
    if(!file_exists($this->getDataFolder() . "config.yml));
    $config = new Config($this->getDataFolder() . "config.yml", Config::YAML));
  }
  
  public function loadWorlds(){
  $worlds = $this->getConfig()->get("worlds");
  foreach($worlds as $world => $key){
  $this->getServer()->loadLevel($key);
  }
  }
  
  public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
  switch($cmd->getName()){
  case "multiworld";
  if($args[0] == "load"){
  if(!empty($args[1]){
     if($this->getServer()->isLevelGenerated($args[1]){
     $this->getServer()->loadLevel($args[1]);
  }else{
  //TODO
  }
  }
}
