<?php

declare(strict_types=1);

namespace NhanAZ\SoundAPI;

use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\network\mcpe\protocol\PlaySoundPacket;
use pocketmine\network\mcpe\protocol\StopSoundPacket;

class Main extends PluginBase implements Listener
{

	/** @var string */
	public $soundName;
	/** @var float */
	public $x, $y, $z, $volume, $pitch;
	/** @var bool */
	public $stopAll;

	/** An easy way to summon a sound at a player's location */
	public function playSound(string $soundName, Player $player)
	{
		$packet = new PlaySoundPacket();
		$packet->soundName = $soundName;
		$packet->x = $player->getX();
		$packet->y = $player->getY();
		$packet->z = $player->getZ();
		$packet->volume = 1;
		$packet->pitch = 1;
		$player->sendDataPacket($packet);
	}

	/** A more sophisticated way to summon sounds this way allows you to tweak more parameters */
	public function playSoundCustom(string $soundName, float $x, float $y, float $z, float $volume, float $pitch, Player $player)
	{
		$packet = new PlaySoundPacket();
		$packet->soundName = $soundName;
		$packet->x = $x;
		$packet->y = $y;
		$packet->z = $z;
		$packet->volume = $volume;
		$packet->pitch = $pitch;
		$player->sendDataPacket($packet);
	}

	/** Stop a certain sound */
	public function stopSound(string $soundName, bool $stopAll, Player $player)
	{
		$packet = new StopSoundPacket();
		$packet->soundName = $soundName;
		$packer->stopAll = $stopAll;
		$player->sendDataPacket($packet);
	}
}
