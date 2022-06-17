# SoundAPI
This is a plugin that allows you to send to any vanilla minecraft audio in an easy way.

# How to use

## Send to the coordinates of the player standing any sound

First, you have to register the plugin, you can do this during the `onEnable()` of your plugin main class.
```php
protected function onEnable(): void {
	$this->getServer()->getPluginManager()->registerEvents($this, $this);
	$this->SoundAPI = $this->getServer()->getPluginManager()->getPlugin("SoundAPI");
}
```
You can then send the player an sound track with the following code:

[Click here](https://github.com/nhanaz-pm-pl/SoundAPI/blob/master/README.md#sounds) to see the sound list
```php
$soundName = "sound.name";
$player = $event->getPlayer();
$this->SoundAPI->playSound($soundName, $player);
```
I will now send the player a thunderclap sound when they join the server using the code below:
```php
public function onJoin(PlayerJoinEvent $event): void {
	$soundName = "ambient.weather.lightning.impact";
	$player = $event->getPlayer();
	$this->SoundAPI->playSound($soundName, $player);
}
```

## How to stop the sound that is playing
```php
# Remember to register the plugin in `onEnable()`
```
To stop an sound, follow the steps below
```php
$soundName = "sound.name";
/**
 * $soundName = "";
 * This will stop all playing sound!
 */
$stopAll = true;
$player = $event->getPlayer();
$this->SoundAPI->stopSound($soundName, $stopAll, $player);
```
I will now stop any audio when a player joins the server
```php
public function onJoin(PlayerJoinEvent $event): void {
	$soundName = "ambient.cave";
	$stopAll = true;
	$player = $event->getPlayer();
	$this->SoundAPI->stopSound($soundName, $stopAll, $player);
}
```

## Still sending the player an sound track, but it allows for more customization
You should use playSound() to make it easier to send sounds to players
```php
# Remember to register the plugin in `onEnable()`
```
I'll send players a bell sound when they join the server
```php
public function onJoin(PlayerJoinEvent $event): void {
	$player = $event->getPlayer();
	$soundName = "block.bell.hit"
	$x = $player->getPosition()->getX();
	$y = $player->getPosition()->getY();
	$z = $player->getPosition()->getZ();
	$volume = 1.0;
	$pitch = 1.0;
	$this->SoundAPI->playSoundCustom($soundName, $x, $y, $z, $volume, $pitch, $player);
}
```

# Sounds
Click on the link below to see the sound list

https://www.digminecraft.com/lists/sound_list_pe.php

